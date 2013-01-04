<?php 

	/* Defining the namespace */
	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Form Library
	 **/

	class Form
	{
		public static $errors = array();

		public static function filter($field, $rules = null)
		{
			self::$errors = array();
			if(count($_POST) == 0)
			{
				self::$errors[] = 'No valid fields';
			}

			if( empty($rules) or empty($field) )
			{
				exit('You must set your field name or rules');
			}

			if( !is_string($field) or !is_string($rules) )
			{
				exit('Strings only accepted for ' . $filed . ' and ' . $rules . ' arguments.');
			}

			$rule = explode('.', $rules);

				foreach($rule as $separate_rule)
				{
					if( method_exists(new Form, $separate_rule) && is_callable(array(new Form, $separate_rule)) )
					{
						if( ! self::$separate_rule($_POST[$field]))
							self::$errors[] = 'The <strong>' . $field . '</strong> is not a ' . $separate_rule . ' type';
					}
					else
					{
						exit('Not callable function');
					}
				}
		}

		public function length($field, $min_length, $max_length)
		{
			if( ! is_int($min_length) or ! is_int($max_length) )
			{
				exit('Not valid arguments');
			}
			if( strlen($_POST[$field]) < $min_length )
				exit('Does not meet the minimum legth');
			elseif ( strlen($_POST[$field]) > $max_length)
				exit('Does not meet hte maximum length');
		}

		public static function alpha($string)
		{
			return ( ! preg_match('/^[a-zA-Zа-яА-Я]+$/', $string) ) ? false : true;
		}

		public static function email($string)
		{
			return ( ! preg_match('/^[a-z0-9\.]+@[a-z0-9\-]+\.[a-z0-9]{2,4}$/', $string) ) ? false : true;
		}

		public static function numeric($string)
		{
			return ( ! preg_match('/^[0-9]+$/', $string) ) ? false : true;
		}

		public static function ip($address)
		{
			return ( filter_var($address, FILTER_VALIDATE_IP) );
		}

		public static function alpha_numeric($string)
		{
			return ( ! preg_match('/^[a-zA-Zа-яА-Я0-9]+$/', $string) ) ? false : true;
		}

		public static function alpha_dash_under($string)
		{
			return ( ! preg_match('/^[a-zA-Zа-яА-Я\-\_]+$/', $string) ) ? false : true;
		}

		public static function check()
		{
			if( count(self::$errors) > 0 )
			{
				exit(implode('', self::$errors));
			}
			else
			{
				return true;
			}
		}

		public static function post($field)
		{
			$input = $_POST[$field];
			if( is_string($input) or is_int($input) )
				return trim($input);
		}

		public static function get($field)
		{
			$input = $_GET[$field];
			if( is_string($input) or is_int($input) )
				return trim($input);
		}

		public static function open($action, $method, $id='', $class='')
		{
			return '<form method="' . $method . '" action="' . $action . '">';
		}
		public static function input($type, $name, $value='', $placeholder='', $pattern=null, $required=null, $title=null)
		{
			switch ($type) 
			{
				case 'hidden':
					$input = '<input type="hidden" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'text':
					$input = '<input type="text" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'password':
					$input = '<input type="password" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'email':
					$input = '<input type="email" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'password':
					$input = '<input type="password" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'radio':
					$input = '<input type="radio" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'checkbox':
					$input = '<input type="checkbox" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'submit':
					$input = '<input type="submit" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'date':
					$input = '<input type="date" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'color':
					$input = '<input type="color" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'datetime':
					$input = '<input type="datetime" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'datetime-local':
					$input = '<input type="datetime-local" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'month':
					$input = '<input type="month" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'number':
					$input = '<input type="number" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'range':
					$input = '<input type="range" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'search':
					$input = '<input type="search" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'tel':
					$input = '<input type="tel" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'time':
					$input = '<input type="time" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'url':
					$input = '<input type="url" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
				case 'week':
					$input = '<input type="week" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '">';
					break;
			}
			return $input;
		}
		public static function label($for, $content)
		{
			return '<label for="' . $for . '">' . $content . '</label>';
		}
		public static function fieldset_open()
		{
			return '<fieldset>';
		}
		public static function fieldset_close()
		{
			return '</fieldset>';
		}
		public static function legend($content)
		{
			return '<legend>' . $content . '</legend>';
		}
		public static function textarea($name, $id='', $class='', $content='')
		{
			return '<textarea id="' . $id . '" class="' . $class . '" name="' . $name . '">'. $content .'</textarea>';
		}
		public static function ul_open($name, $id='', $class='')
		{
			return '<ul id="' . $id . '" class="' . $class . '" name="' . $name . '">';
		}
		public static function li($id='', $class='', $value='', $content='')
		{
			return '<li id="' . $id . '" class="' . $class . '" value="' . $value . '">' . $content . '</li>';
		}
		public static function ul_close()
		{
			return '</ul>';
		}
		public static function ol_open($name, $id='', $class='')
		{
			return '<ol id="' . $id . '" class="' . $class . '" name="' . $name . '">';
		}
		public static function ol_close()
		{
			return '</ol>';
		}		
		public static function close()
		{
			return '</form>';
		}		

	}