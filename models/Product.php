<?php
require_once 'Database.php';

class Product
{
	public $name;
	public $price;
	public $description;
	public function __construct($name, $price, $description)
	{
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
	}
	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				productos";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}
	public function save()
	{
		$sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES('$this->name', '$this->description', $this->price, 1)";
		$db = new Database();
		if ($db->query($sql)) {
			echo ":O";
			$db->close();
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
			$db->close();
		}
	}
}
