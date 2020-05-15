<?php 

class Image {

	private $db;
	// private $db2;

	public function __construct() {
		$this->db = Database::getInstance();
	}

	public function insertImages($file_name) {
		$this->db->query("INSERT INTO images (file_name) VALUES (:file_name)");
		$this->db->bindParam(':file_name', $file_name);
		
		if($this->db->execute()) {
			return $this->db->lastInsertId();
		} else {
			return false;
		}
	}

	public function insertPost($title, $description) {
		$this->db->query("INSERT INTO posts (title, description) VALUES (:title, :description)");
		$this->db->bindParam(':title', $title);
		$this->db->bindParam(':description', $description);
		
		if($this->db->execute()) {
			return $this->db->lastInsertId();
		} else {
			return false;
		}
	}

	public function insertImagePostPivotTable($image_id, $user_id, $post_id) {
		$this->db->query("INSERT INTO images_post (image_id, user_id, post_id) VALUES (:image_id, :user_id, :post_id)");
		$this->db->bindParam(':image_id', $image_id);
		$this->db->bindParam(':user_id', $user_id);
		$this->db->bindParam(':post_id', $post_id);
		
		if($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getPostById($id) {
		$this->db->query("SELECT * FROM posts WHERE id = :id");
		$this->db->bindParam(':id', $id);

		$post = $this->db->resultSingle();

		if($this->db->rowCount() > 0) {
			return $post;
		} else {
			return false;
		}
	}

	public function getPivotTableByPostId($id) {
		$this->db->query("SELECT * FROM images_post WHERE post_id = :post_id");
		$this->db->bindParam(':post_id', $id);

		$images_post = $this->db->resultAll();

		if($this->db->rowCount() > 0) {
			return $images_post;
		} else {
			return false;
		}
	}
}