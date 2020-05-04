<?php 

	class Database {
		private $host = "localhost";
		private $user = "root";
		private $pass = ""; 
		private $dbname = "sharedGallery";
		private $options = [
			PDO::ATTR_PERSISTENT => true
		];
		
		private $db;
		private $stmt;

		protected static $instance;

		protected function __construct() {
			try {
				$this->db = new PDO(
					'mysql:host='.$this->host.';dbname='.$this->dbname,
					$this->user,
					$this->pass,
					$this->options
				);
			} catch (PDOException $err) {
				die("Database Connection Error: " . $err->getMessage());
			}
		}

		public function query($sql_query) {
			$this->stmt = $this->db->prepare($sql_query);
		}
		
		public function execute() {
			return $this->stmt->execute();
		}
		
		public function resultSingle() {
			$this->stmt->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		public function resultAll() {
			$this->stmt->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}





		
	}