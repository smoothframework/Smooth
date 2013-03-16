<?php

	namespace Smooth\config;

	class Security
	{

		/**
		 * [__construct description]
		 */
		public function __construct()
		{
			if(ini_get('register_globals')) 
            { 
                if(isset($_REQUEST['GLOBALS'])) 
                { 
                    // No no no.. just kill the script here and now
                    exit('Illegal attack on global variable.'); 
                } 
                 
                // Get rid of REQUEST 
                $_REQUEST = array();
                $this->unregisterGlobals();
                $this->removeMagicQuotes();
       		}
       	}

       	/**
       	 * [unregisterGlobals description]
       	 * @return [type] [description]
       	 */
		public function unregisterGlobals()
		{
			if( ini_get( 'register_globals' ) == 1 )
			{

				$globals = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
				
				foreach ($globals as $value) 
				{
					foreach ($GLOBALS[$value] as $key => $val) 
					{
						if( $val == $GLOBALS[$value] )
							unset($GLOBAL[$value]);
					}
				}

			}
		}

		/**
		 * [removeMagicQuotes description]
		 * @return [type] [description]
		 */
		public function removeMagicQuotes()
		{
			if( get_magic_quotes_gpc() )
			{
				$_GET = stripslashes($_GET);
				$_POST = stripslashes($_POST);
				$_COOKIE = stripslashes($_COOKIE);
			}
		}
    }