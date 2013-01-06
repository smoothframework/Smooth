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
		 * @param  string $log null(default) | file (write the log into a file) | display (print the log)
		 * @return array | file(w)
		 */
		public static function respond(array $result, $log = 'display')
		{
			if( $log == 'display' )
			{
				exit('Date and time: ' . date('Y-m-d H:i:s')  
					. ';<br> Log: <br> --level:' . $result['error_level'] 
					. ';<br> --message: ' . $result['error_message'] 
					. ';<br> --file: ' . $result['error_file'] 
					. ';<br> --context: ' . $result['error_context'] . ';');
			}
			elseif ( $log == 'file' ) {
				$contents = file_get_contents(SYSPATH . 'errors/error-log.txt');
				$file = fopen(SYSPATH . 'errors/error-log.txt', 'r+');
				fwrite($file, $contents . "\n" . 
					'Date and time: ' . date('Y-m-d H:i:s')  
					. '; Log: <br>--level:' . $result['error_level'] 
					. '; --message: ' . $result['error_message'] 
					. '; --file: ' . $result['error_file'] 
					. '; --context: ' . $result['error_context'] . ';'
					);
				fclose($file);
				exit();
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

			Handler::respond($result);
		}

	}