<?php

	/* Defining the namespace */
	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Math Library
	 */

	class Math
	{
		
		public static function multiply(array $values)
		{
			$result = 1;
			for ($i=0; $i < count($values); $i++) { 
				$result *= $values[$i];
			}
			return $result;	
		}
		
		public static function divide(array $values)
		{
			$result = $values[0];
			for ($i=0; $i < count($values); $i++) { 
				$result /= $values[$i];
			}
			return $result;
		}
		
		public static function degree($num, $gradiation)
		{
			// $result = $num;
			$result = 1;
			if( $gradiation === 0 )
				$result = 1;
			for ($i=0; $i < $gradiation; $i++) 
			{ 
				$result = $num * $result;
			}
			return $result;
		}

		public static function S(array $values)
		{
			$result = 1;
			for ($i=0; $i < count($values); $i++) { 
				$result *= $values[$i];
			}
			return $result;
		}

		public static function P(array $values)
		{
			$result = 0;
			for ($i=0; $i < count($values); $i++) { 
				$result += $values[$i];
			}
			return $result;			
		}

		public static function factorial($num)
		{
			return gmp_strval(gmp_fact($num));
		}

		public static function permutations($num)
		{
			return gmp_strval(gmp_fact($num));
		}

		public static function combinations($num, $repetitions)
		{
			if( $num >= $repetitions)
				return gmp_strval(gmp_fact($num))/(gmp_strval(gmp_fact($repetitions)) * gmp_strval(gmp_fact($num - $repetitions)));
			else
				exit('Error you could, not second parameter that is greater than the first one.');
		}

		public static function variations($num, $all)
		{
			$result = 1;
			$count = $all - $num + 1;
			for ($i=$count; $i <= $all; $i++) { 
				$result *= $i;
			}
			return $result;
		}

		public static function fibonacci($num)
		{
			$first = 1;
			$second = 2;

			for ($i=1; $i <= $num; $i++) 
			{
				$result = $first + $second;
				$first = $second;
				$second = $result;
			}

			return $result;
		}

	}