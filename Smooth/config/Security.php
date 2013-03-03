<?php

	class Security
	{

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