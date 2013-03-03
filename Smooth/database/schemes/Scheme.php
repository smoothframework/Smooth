<?php

	namespace Smooth\Database;

	class Scheme
	{

		// use Smooth\Database\Scheme;

		// Scheme::create('test', array(

		// 		'id' => 'int.a_i.primary',
		// 		'id' => 'type:int.length:255.default:null.collation:.index:primary.a_i:true.comments:',
		// 		'name' => 'varchar.255.null.index',
		// 		'collation' => ,
		// 		'engine' => 'InnoDB',
		// 		'comments' => ,
		// 		'charset' => 'utf8'

		// 	));

		public static function create($name, array $params)
		{
			$sql = 'CREATE TABLE IF NOT EXISTS ' . $name . '(';
			foreach ($params as $key => $value)
			{
				if( $key != 'engine' or $key != 'collation' or $key != 'comments' or $key != 'charset' )
				{
					$values = explode(".", $value);
					$t = self::val($values[0]);
					// print_r(explode(":", $values[0]));
					$sql .= '`' . $key . '`' . $t[1] . '';
				}
			}
			extract($params);
			$sql .= ') ENGINE=' . $engine . ' DEFAULT CHARSET=' . $charset . ' AUTO_INCREMENT=;';
			echo $sql;
		}

		public static function drop($name)
		{

		}

		public static function val($param)
		{
			$val = explode(":", $param);
			print_r($val);
			if( $val[0] != 'engine' or $val[0] != 'collation' or $val[0] != 'comments' or $val[0] != 'charset' )
			{
				return array( $val[0] , $val[1] );
				// print_r(array( $val[0] , $val[1] ));
			}
			else
			{
				return array( $val[0] );
			}
		}

	}	