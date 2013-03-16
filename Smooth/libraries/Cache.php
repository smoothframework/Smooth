<?php 

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Cache Library
	 */

	class Cache
	{

		private $cacheDir;
		private $cacheExpire = 3600;

	    public function __construct($cacheDir, $cacheExpire = 3600)
	    {
	        $this->dir = $cacheDir;
	        $this->cacheExpire = $cacheExpire;
	    }

	    private function _name($key)
	    {
	        return sprintf("%s/%s", $this->dir, sha1($key));
	    }

	    public function checkDir()
	    {
	    	if( !is_dir($this->dir) or !is_writable($this->dir) )
	    		return FALSE;
	    }

	    public function cacheExists($cachePath)
	    {
	    	if( ! file_exists( $cachePath ) )
	    		return FALSE;
	    }

	    public function get($key)
	    {

	        $this->checkDir();

	        $cachePath = $this->_name($key);

	        $this->cacheExists();

	        if ( filemtime($cachePath) < (time() - $this->cacheExpire) )
	        {
	            $this->clear($key);
	            return FALSE;
	        }

	        if (!$fp = @fopen($cachePath, 'rb'))
	        {
	            return FALSE;
	        }

	        flock($fp, LOCK_SH);

	        $cache = '';

	        if (filesize($cachePath) > 0)
	        {
	            $cache = unserialize(fread($fp, filesize($cachePath)));
	        }
	        else
	        {
	            $cache = NULL;
	        }

	        flock($fp, LOCK_UN);
	        fclose($fp);

	        return $cache;
	    }

	    public function write($key, $data)
	    {

	        $this->checkDir();

	        $cachePath = $this->_name($key);

	        if ( ! $fp = fopen($cachePath, 'wb'))
	        {
	            return FALSE;
	        }

	        if (flock($fp, LOCK_EX))
	        {
	            fwrite($fp, serialize($data));
	            flock($fp, LOCK_UN);
	        }
	        else
	        {
	            return FALSE;
	        }
	        fclose($fp);
	        @chmod($cachePath, 0777);
	        return TRUE;
	    }

	    public function clear($key)
	    {
	        $cachePath = $this->_name($key);

	        if (file_exists($cachePath))
	        {
	            unlink($cachePath);
	            return TRUE;
	        }

	        return FALSE;
	    }
	}