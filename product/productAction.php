<?php
require_once "../classes/Product.php";
$product = new Product;
session_start();

//create product
if (isset($_POST['create'])) {
    $userid = $_POST['userid'];
    $categoryid = $_POST['categoryid'];
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productquantity = $_POST['productquantity'];
    $image = $_POST['image'];
    $product->createProduct($userid, $categoryid, $productname, $productprice, $productquantity,$image);
}

//edit product
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $categoryid = $_POST['categoryid'];
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productquantity = $_POST['productquantity'];
    $image = $_POST['image'];
    $product->editProduct($id, $userid, $categoryid, $productname, $productprice, $productquantity,$image);
}

//delete product
elseif ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $product->deleteProduct($id);
}
