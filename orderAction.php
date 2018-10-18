<?php
require_once "classes/Order.php";
$order = new Order;
session_start();

//create order
if (isset($_POST['addcart'])) {
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $productprice = $_POST['productprice'];
    $productquantity = $_POST['productquantity'];
    $quantity = $_POST['quantity'];
    $orderstatus = $_POST['orderstatus'];
    $deliverstatus = $_POST['deliverstatus'];
    $order->createOrder($id, $userid, $productid, $productprice, $productquantity, $quantity, $orderstatus, $deliverstatus);
}

//accept order
if (isset($_POST['accept'])) {
    $address = $_POST['address'];
    $userid = $_POST['userid'];
    $order->acceptOrder($address, $userid);
}

//confirm item
elseif ($_GET['action'] == 'confirm') {
    $id = $_GET['id'];
    $order->confirmOrder($id);
}

//delete order from cart
elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    $productquantity = $_POST['productquantity'];
    $order->deleteOrder($id, $productid, $quantity, $productquantity);
}
