<?php
require_once "classes/Order.php";
$order = new Order;
session_start();

//create order
if(isset($_POST['addcart'])){
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $productprice = $_POST['productprice'];
    $quantity = $_POST['quantity'];
    $orderstatus = $_POST['orderstatus'];
    $deliverstatus = $_POST['deliverstatus'];
    $order->createOrder($id,$userid,$productid,$productprice,$quantity,$orderstatus,$deliverstatus);
}

//accept order
if(isset($_POST['accept'])){
    $address = $_POST['address'];
    $userid = $_POST['userid'];
    $order->acceptOrder($address,$userid);
}

//delete order from cart
elseif ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $order->deleteOrder($id);
}