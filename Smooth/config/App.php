<?php

	namespace Smooth\Config;

	class App
	{

		/**
		 * [configure description]
		 * @param  array  $params [description]
		 * @return [type]         [description]
		 */
		public static function configure(array $params)
		{
			extract($params);

			/**
			 * Setting the default date timezone
			 */
			date_default_timezone_set( $timezone );

			/**
			 * Setting the default charset encoding
			 */
			mb_internal_encoding($charset);
			ini_set('default_charset', $charset);

			define('URL', $url);

			/**
			 * Determing that the $web_path is a real directory
			 * @var string $web_path
			 */
			if( is_dir( $web_path ) )
			{
				if( realpath( $web_path ) !== false )
				{
					define('WEBPATH', ( isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://' ) . getenv('HTTP_HOST') . '/' . $web_path. '/');
				}
			}
			else
			{
				if( ! is_dir( $web_path ) )
				{
					Handler::handler(E_USER_ERROR, 'The ' . $web_path . ' is not a valid directory', 'index.php', 146);
				}
			}

		}

	}