<?php

	namespace Smooth\Errors;

	class Handler
	{
		/**
		 * Error handling for catching and logging errors occured during development
		 * @param  int $errno
		 * @param  string $errstr
		 * @param  string $errfile
		 * @param  int $errline
		 * @param  array $errcontext
		 * @return void
		 */
		public static function handler($errno, $errstr, $errfile=null, $errline=null, $errcontext=null)
		{		
			switch ($errno)
			{
				case E_USER_ERROR:
					Handler::log(E_ERROR, $errno, $errstr, $errfile, $errline, $errcontext);
					break;
				case E_USER_WARNING:
					Handler::log(E_WARNING, $errno, $errstr, $errfile, $errline, $errcontext);
					break;
				case E_USER_NOTICE:
					Handler::log(E_NOTICE, $errno, $errstr, $errfile, $errline, $errcontext);
					break;
				case E_USER_DEPRECATED:
					Handler::log(E_DEPRECATED, $errno, $errstr, $errfile, $errline, $errcontext);
					break;
				default:
					Handler::log(0, $errno, $eno, $errfile, $errline, $errcontext);
					break;
			}
			return true;
			set_error_handler('handler');
		}

		/**
		 * Error displaying or writing to file
		 * @param  array $result
		 * @return array
		 */
		public static function respond(array $result)
		{
			extract($result);

			if( $log == 'display' )
			{
				throw new Exception("" . $error_message . " on level " . $error_level . " in " . $error_file . " on line " . $error_line, 1);
			}
			else
			{
				throw new Exception("Error processing the handler", 1);
			}
		}

		/**
		 * Error logging for errors occured during development
		 * @param  int $errno
		 * @param  string $errstr
		 * @param  string $errfile
		 * @param  int $errline
		 * @param  array $errcontext
		 * @return array
		 */
		public static function log($errno, $errstr, $errfile, $errline, $errcontext)
		{
			$result = array(
				'error_level' => $errno,
				'error_message' => $errstr,
				'error_file' => $errfile,
				'error_line' => $errline,
				'error_context' => $errcontext
				);

			Handler::respond( $result );
		}

	}