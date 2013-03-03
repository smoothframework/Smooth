<?php 

	namespace Smooth\Libraries;

	use Smooth\Database\Connector;
	use Smooth\Database\Database;


	/**
	 * @package    Smooth Database Library
	 */

	class Db
	{
		protected $dbh;

		public function __construct()
		{
			$this->_dbh = Connector::getConnection();
		}

		/**
		 * [query description]
		 * @param  string $query
		 * @return array
		 */
		public static function query($query)
		{
			try
			{
				$dbh = Connector::getConnection();
				$pdo = $dbh->prepare($query);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute();
				while($row = $pdo->fetchAll())
				{
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}		
		}

		/**
		 * [fetch description]
		 * @param  string $table
		 * @param  int $limit
		 * @return array
		 */
		public static function fetch($table, $limit = null)
		{
			try
			{
				$dbh = Connector::getConnection();
				if( $limit != null )
					$sql_limit = 'LIMIT ' . $limit;
				else
					$sql_limit = '';
				$pdo = $dbh->prepare('SELECT * FROM ' . $table . ' ' . $sql_limit);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute();
				while($row = $pdo->fetchAll())
				{
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		/**
		 * [fetch_where description]
		 * @param  string $table
		 * @param  array  $params
		 * @param  int $limit
		 * @return array
		 */
		public static function fetchWhere($table, array $params, $limit = null)
		{	
			try
			{
				if( $limit != null )
					$sql_limit = ' LIMIT ' . $limit;
				else
					$sql_limit = '';

				$sql = 'SELECT * FROM ' . $table . ' WHERE ';
				$first = true;
				foreach ($params as $key => $value) 
				{
					if( ! $first )
					{
						$first = true;
					}
					else
					{
						$first = false;
					}
					if( $first == true )
						$sql .= ' AND ' . $key . '= :' . $key;
					elseif ( $first == false ) {
						$sql .= $key . '= :' . $key;
					}
				}
				$sql .= $sql_limit;
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				while($row = $pdo->fetchAll())
				{
					//echo $row;
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchOrWhere($table, array $params, $limit=null)
		{	
			try
			{
				if( $limit != null )
					$sql_limit = ' LIMIT ' . $limit;
				else
					$sql_limit = '';

				$sql = 'SELECT * FROM ' . $table . ' WHERE ';
				$first = true;
				foreach ($params as $key => $value)
				{
					if( ! $first )
					{
						$first = true;
					}
					else
					{
						$first = false;
					}
					if( $first == true )
						$sql .= ' OR ' . $key . '= :' . $key;
					elseif ( $first == false ) {
						$sql .= $key . '= :' . $key;
					}
				}
				$sql .= $sql_limit;
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				while($row = $pdo->fetchAll())
				{
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchWhereIn($table, $field, array $params, $limit = null)
		{	
			try
			{
				if( $limit != null )
					$sql_limit = ' LIMIT ' . $limit;
				else
					$sql_limit = '';

				$sql = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' IN (';
				$last = end($params);
				$last = each($params);
				reset($params);
				foreach ($params as $key => $value) {
					if($value == $last['value'])
						$sql .= '"' . $value . '"';
					else
						$sql .= '"' . $value . '",';
				}
				$sql .= ')';
				$sql .= $sql_limit;
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				while($row = $pdo->fetchAll())
				{
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchWhereNotIn($table, $field, array $params, $limit = null)
		{	
			try
			{
				if( $limit != null )
					$sql_limit = ' LIMIT ' . $limit;
				else
					$sql_limit = '';

				$sql = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' NOT IN (';
				$last = end($params);
				$last = each($params);
				reset($params);
				foreach ($params as $key => $value) {
					if($value == $last['value'])
						$sql .= '"' . $value . '"';
					else
						$sql .= '"' . $value . '",';
				}
				$sql .= ')';
				$sql .= $sql_limit;
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				while($row = $pdo->fetchAll())
				{
					return $row;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}		

		public static function insert($table, array $params)
		{
			try
			{
				$last = end($params);
				$last = each($params);
				reset($params);				
				$sql = 'INSERT INTO ' . $table . ' (';
				foreach ($params as $key => $value) 
				{
					if($value == $last['value'])
						$sql .= '' . $key . '';
					else
						$sql .= '' . $key . ',';
				}
				$sql .= ') VALUES (';
				foreach ($params as $key => $value) 
				{
					if($value == $last['value'])
						$sql .= '' . $value . '';
					else
						$sql .= '' . $value . ',';
				}
				$sql .= ')';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute($params);
				if( count($dbh->lastInsertId()) > 0 )
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function truncate($table)
		{
			try
			{
				$sql = 'TRUNCATE ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function delete($table, array $params)
		{
			try
			{
				$sql = 'DELETE FROM ' . $table . ' WHERE ';
				$first = true;
				foreach ($params as $key => $value) 
				{
					if( ! $first )
					{
						$first = true;
					}
					else
					{
						$first = false;
					}
					if( $first == true )
						$sql .= ' AND ' . $key . '= :' . $key;
					elseif ( $first == false ) {
						$sql .= $key . '= :' . $key;
					}
				}
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function update($table, array $params, array $matches)
		{
			try
			{
				$sql = 'UPDATE ' . $table . ' SET ';
				$first = true;
				foreach ($params as $key => $value) 
				{
					if( ! $first )
					{
						$first = true;
					}
					else
					{
						$first = false;
					}
					if( $first == true )
						$sql .= ' ' . $key . '= :' . $key . ',';
					elseif ( $first == false ) {
						$sql .= $key . '= :' . $key;
					}
				}
				$sql .= ' WHERE ';
				foreach ($matches as $key => $value) {
					if( ! $i )
					{
						$i = true;
					}
					else
					{
						$i = false;
					}
					if( $i == true )
						$sql .= ' AND ' . $key . '= :' . $key;
					elseif ( $i == false ) {
						$sql .= $key . '= :' . $key;
					}
				}
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->setFetchMode(\PDO::FETCH_ASSOC);
				$pdo->execute($params);
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchMax($table, $field, $as=null)
		{
			try
			{
				$sql = 'SELECT MAX(' . $field . ')';
				if( $as !== null)
					$sql .= 'as ' . $as . ' ';
				$sql .= 'FROM ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchMin($table, $field, $as=null)
		{
			try
			{
				$sql = 'SELECT MIN(' . $field . ')';
				if( $as !== null )
					$sql .= 'as ' . $as . ' ';
				$sql .= 'FROM ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchAverage($table, $field, $as=null)
		{
			try
			{
				$sql = 'SELECT AVG(' . $field . ')';
				if( $as !== null )
					$sql .= 'as ' . $as . ' ';
				$sql .= 'FROM ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchSum($table, $field, $as=null)
		{
			try
			{
				$sql = 'SELECT SUM(' . $field . ')';
				if( $as !== null )
					$sql .= 'as ' . $as . ' ';
				$sql .= 'FROM ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

		public static function fetchCount($table, $field, $as = null)
		{
			try
			{
				$sql = 'SELECT COUNT(' . $field . ')';
				if( $as !== null )
					$sql .= 'as ' . $as . ' ';
				$sql .= 'FROM ' . $table . '';
				$dbh = Connector::connect();
				$pdo = $dbh->prepare($sql);
				$pdo->execute();
				if( $pdo->rowCount() > 0)
				{
					return true;
				}
				else
				{
					return false;
				}				
			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}
		}

	}