<?php
require_once "../classes/Deliver.php";
$deliver = new Deliver;
session_start();

//create product
if (isset($_POST['create'])) {
    $userid = $_POST['userid'];
    $categoryid = $_POST['categoryid'];
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $deliver->createProduct($userid,$categoryid,$productname,$productprice);
}

//edit product
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $categoryid = $_POST['categoryid'];
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $deliver->editProduct($id,$userid,$categoryid,$productname,$productprice);
}

//delete product
elseif ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $deliver->deleteProduct($id);
}