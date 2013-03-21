<?php

	namespace Smooth\Template;

	class Engine
	{

		protected $file;
		protected $values = array();

		public function __construct($file)
		{
			$this->file = $file;
		}

		public function set($key, $value)
		{
			$this->values[$key] = $value;
		}

		public function output()
		{
			try
			{
				if( ! file_exists( $this->file ) )
				{
					// throw new Exception("Couldn't find the file.", 1);
				}

				$output = file_get_contents($this->file);

				foreach ($this->values as $key => $value) 
				{
					$templateTag = '{' . $key . '}';
					$output = str_replace($templateTag, $value, $output);
				}

				return $output;
			}
			catch(Exception $e)
			{
				exit('The following error occured:' . $e->getMessage());
			}
		}

	}