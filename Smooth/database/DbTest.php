<?php

	function getUserAge($pdo, $user_id)
	{
	    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = ?");
	    $stmt->execute(array($user_id));
	    $user = $stmt->fetch();
	 
	    if(false === $user) {
	        return false;
	    }
	 
	    return $user['age'];
	}

	require_once 'Phactory/lib/Phactory.php';
	class DbTest extends PHPUnit_Framework_TestCase
	{

	    public static function setUpBeforeClass()
	    {
	        // create a db connection and tell Phactory to use it
	        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'ciprop1');
	        Phactory::setConnection($pdo);
	 
	        /**
	          * Normally you would not need to create a table here, and would use
	          * an existing table in your test database instead.
	          * For the sake of creating a self-contained example, we create
	          * the 'users' table here.
	          */
	        $pdo->exec("CREATE TABLE `users` ( id INTEGER PRIMARY KEY, name TEXT, age INTEGER )");
	 
	        // reset any existing blueprints and empty any tables Phactory has used
	        Phactory::reset();
	 
	        // define default values for each user we will create
	        Phactory::define('user', array('name' => 'Test User $n', 'age' => 18));
	    }
	 
	    public static function tearDownAfterClass()
	    {
	        Phactory::reset();
	 
	        // since we created a table in this test, we must drop it as well
	        Phactory::getConnection()->exec("DROP TABLE `users`");
	    }

		public function testGetUserAge()
	    {
	        // test that getUserAge() returns false for a nonexistent user
	        $age = getUserAge(Phactory::getConnection(), 0);
	        $this->assertFalse($age);
	 
	        // create 20 users, with ages from 1-20
	        $users = array();
	        for($i = 1; $i <= 20; $i++) {
	            // create a row in the db with age = $i, and store a Phactory_Row object
	            $users[] = Phactory::create('user', array('age' => $i));
	        }
	 
	        // test that getUserAge() returns the correct age for each user
	        foreach($users as $user) {
	            // Phactory_Row provides getId() which returns the value of the PK column
	            $user_id = $user->getId();
	 
	            $age = getUserAge(Phactory::getConnection(), $user_id);
	 
	            $this->assertEquals($user->age, $age);
	        }
	    }


	}