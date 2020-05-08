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
		private static $instances = [];

		public function __construct() {
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

		// singleton db class
		public static function getInstance() {
			$subClass = static::class; 
			if (!isset(self::$instances[$subClass])) {
				// instance db object
				self::$instances[$subClass] = new static;
			}
			return self::$instances[$subClass];
		}

		public function query($sql_query) {
			$this->stmt = $this->db->prepare($sql_query);
		}

		public function bindParam($string, $param) {
			$this->stmt->bindParam($string, $param);
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

		public function rowCount() {
			return $this->stmt->rowCount();
		}

	}