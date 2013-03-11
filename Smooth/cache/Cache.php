<?php 

	namespace Smooth\Cache;

	class Cache
	{

		private $cachePath;

		private $cacheExpire;

		public function Cache($expireTime = 3600, $cachePath = "cache/")
		{
			$this->cachePath = APPATH . $cachePath;
			$this->cacheExpire = $expireTime;
		}

		private function fileName($key)
		{
			echo $this->cachePath . md5($key) . 'txt';
			return $this->cachePath . md5($key);
		}

		public function write($key, $data)
		{
			$content = serialize($data);
			$fileName = $this->fileName($key);
			$cacheFile = fopen($fileName, 'w');
			if( $cacheFile )
			{
				fwrite($cacheFile, $content);
				fclose($cacheFile);
			}
		}

		public function get($key)
		{
			$fileName = $this->fileName($key);

			if( !file_exists($fileName) or !is_readable($fileName) )
			{
				return false;
			}
			if( time() < filemtime($fileName) + $this->cacheExpire )
			{
				$file = fopen($fileName, 'r');
				if( $file )
				{
					$fileData = fread($file, filesize($fileName));
					fclose($file);
					return unserialize($fileData);
 				}
 				else
 				{
 					return false;
 				}
			}
			else
			{
				return false;
			}
		}

	}