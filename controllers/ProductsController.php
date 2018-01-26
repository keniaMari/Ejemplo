<?php
include_once("../models/Product.php");
include_once("../models/Cleaner.php");

if(isset($_POST["action"])){
	$name = Cleaner::cleanInput($_POST["name"]);
	$description = Cleaner::cleanInput($_POST["description"]);
	$price = (int)Cleaner::cleanInput($_POST["price"]);

	$product = new Product($name,$price,$description);

	$product->save();
} else {
	$products = Product::get();

	$products = json_encode($products);

	echo $products;
}