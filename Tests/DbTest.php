<?php

	function getUserAge($pdo, $user_age)
	{
		$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = ?");
		$stmt->exec(array($user_age));
		$user = $stmt->fetch();

		return $user['age'];
	}

	require_once 'Phactory/lib/Phactory.php';

	class DbTest extends PHPUnit_Framework_TestCase
	{
		public static function setUpBeforeClass()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=test', '', '');
			Phactory::setConnection($pdo);

			$pdo->exec("CREATE TABLE `users` ( id INTEGER PRIMARY KEY, name TEXT, age INTEGER )");

			Phactory::reset();
			Phactory::define('user', array('name' => 'Test User $n', 'age' => 18));
		}

		public function testgetUserAge()
		{
			for ($i=1; $i <= 20; $i++) { 
				$users[] = Phactory::create('user', array('age' => $i));
			}

			foreach ($users as $user) {
				$user_id = $user->getId();
 
	            $age = getUserAge(Phactory::getConnection(), $user_id);
	 
	            $this->assertEquals($user->age, $age);
			}
		}

		public static function tearDownAfterClass()
	    {
	        Phactory::reset();
	        Phactory::getConnection()->exec("DROP TABLE `users`");
	    }
	}
