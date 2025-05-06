<?php

class Database
{

	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $db = "mybook_db";

	function connect()
	{

		$connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
		return $connection;
	}

	function read($query)
	{
		$conn = $this->connect();
		$result = mysqli_query($conn, $query);

		if (!$result) {
			return false;
		} else {
			$data = false;
			while ($row = mysqli_fetch_assoc($result)) {

				$data[] = $row;

			}

			return $data;
		}
	}

	function save($query)
	{
		$conn = $this->connect();
		$result = mysqli_query($conn, $query);

		if (!$result) {
			return false;
		} else {
			return true;
		}
	}

}



// class Database
// {
// 	private $host = "localhost";
// 	private $username = "root";
// 	private $password = "";
// 	private $db = "mybook_db";
// 	private $connection;

// 	public function __construct()
// 	{
// 		$this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);

// 		if ($this->connection->connect_error) {
// 			die("Connection failed: " . $this->connection->connect_error);
// 		}
// 	}

// 	public function read($query, $params = [])
// 	{
// 		$stmt = $this->connection->prepare($query);
// 		if ($stmt === false) {
// 			die("Prepare failed: " . $this->connection->error);
// 		}

// 		if ($params) {
// 			// Create a string of types based on the number of parameters
// 			$types = str_repeat('s', count($params)); // Assuming all parameters are strings
// 			$stmt->bind_param($types, ...$params);
// 		}

// 		$stmt->execute();
// 		$result = $stmt->get_result();

// 		$data = [];
// 		while ($row = $result->fetch_assoc()) {
// 			$data[] = $row;
// 		}

// 		return $data;
// 	}

// 	public function save($query, $params = [])
// 	{
// 		$stmt = $this->connection->prepare($query);
// 		if ($stmt === false) {
// 			die("Prepare failed: " . $this->connection->error);
// 		}

// 		if ($params) {
// 			$types = str_repeat('s', count($params)); // Assuming all parameters are strings
// 			$stmt->bind_param($types, ...$params);
// 		}

// 		return $stmt->execute();
// 	}

// 	public function __destruct()
// 	{
// 		$this->connection->close();
// 	}
// }