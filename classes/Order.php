<?php
require_once "Database.php";
class Order extends Database
{
    //add to cart
    public function createOrder($id, $userid, $productid, $productprice, $quantity, $orderstatus, $deliverstatus)
    {
        if ($quantity < 1) {
            header("location:product-detail.php?id=$id");
        } else {
            $sql = "INSERT INTO orders(user_id,product_id,order_price,order_quantity,order_status,deliver_status) VALUES('$userid','$productid','$productprice','$quantity','$orderstatus','$deliverstatus')";
            $result = $this->conn->query($sql);
            if ($result) {
                header("location:cart.php");
            }
            else{
                die("Conection error: " . $this->conn->error);
            }
        }
    }

    //get order inside cart
    public function getOrderCart()
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id WHERE order_status = 'yet'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get user who ordered 
    public function getOrderUser()
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id INNER JOIN profile ON orders.user_id = profile.user_id WHERE order_status = 'done'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get all items specific user ordered 
    public function getSpecificOrderUser($id)
    {
        $sql = "SELECT * FROM orders INNER JOIN users ON orders.user_id = users.user_id INNER JOIN product ON orders.product_id = product.product_id WHERE orders.user_id = $id";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //accept order
    public function acceptOrder($address,$userid)
    {
        $sql = "UPDATE orders SET order_status = 'done' WHERE order_status = 'yet'";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if ($result) {
            $sql = "INSERT INTO profile(user_id,address) VALUES('$userid','$address')";
            $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
            if($result){
                header("location:order-complete.php");
            }
        }
    }

    //delete order from cart
    public function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE order_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:cart.php");
        }

    }
}
