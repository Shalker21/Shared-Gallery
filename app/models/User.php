<?php

	class User {

		private $db;
		// private $db2;

		public function __construct() {
			$this->db = Database::getInstance();
			// $this->db2 = Database::getInstance();
			// var_dump($this->db);
			// var_dump($this->db2);
			// $this->db = new Database;
			// $this->db2 = new Database;
			// var_dump($this->db);
			// var_dump($this->db2);
		}

		public function register($data) {
			$name = $data['first_name'] . ' ' . $data['last_name'];

			$this->db->query('INSERT INTO user (name, username, email, password, role, code_number) VALUES (:name, :username, :email, :password, :role, :code_number)');
			$this->db->bindParam(':name', $name);
			$this->db->bindParam(':username', $data['username']);
			$this->db->bindParam(':email', $data['email']);
			$this->db->bindParam(':password', $data['password']);
			$this->db->bindParam(':role', false);
			$this->db->bindParam(':code_number', $data['code_number']);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function login($email, $password) {
			$this->db->query('SELECT * FROM user WHERE email = :email');     
     		$this->db->bindParam(':email', $email);

     		$row = $this->db->resultSingle();

			$hashed_password = $row->password;
			 
     		if(password_verify($password, $hashed_password)){
      			return $row;
     		} else{
       			return false;
     		}
		}

		public function getUserEmail($email) {
			$this->db->query('SELECT * FROM user WHERE email = :email');
			$this->db->bindParam(':email', $email);

			// execute
			$user = $this->db->resultSingle();
			
			// check if user exists
			if($this->db->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function getUserById($id) {
			$this->db->query('SELECT * FROM user WHERE id = :id');
			$this->db->bindParam(':id', $id);

			$user = $this->db->resultSingle();

			if($this->db->rowCount() > 0) {
				return $user;
			} else {
				return false;
			}
		}

		public function getCode($number) {
			$this->db->query('SELECT * FROM user WHERE code_number = :number');
			$this->db->bindParam(':number', $number);

			// execute
			$user = $this->db->resultSingle();
			
			// check if user exists
			if($this->db->rowCount() > 0) {
				return $user;
			} else {
				return false;
			}
		}

		public function updateFirstLogin($id) {
			$this->db->query('UPDATE user SET first_login = :number WHERE id = :id');
			$this->db->bindParam(':number', false);
			$this->db->bindParam(':id', $id);
			
			// check if user exists
			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}