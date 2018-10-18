<?php
require_once "Database.php";
class Order extends Database
{
    //add to cart
    public function createOrder($id, $userid, $productid, $productprice, $productquantity, $quantity, $orderstatus, $deliverstatus)
    {
        if ($quantity < 1 || $quantity > $productquantity) {
            header("location:product-detail.php?id=$id");
        } else {
            $sql = "INSERT INTO orders(user_id,product_id,order_price,order_quantity,order_status,deliver_status) VALUES('$userid','$productid','$productprice','$quantity','$orderstatus','$deliverstatus')";
            $result = $this->conn->query($sql);
            if ($result) {
                $sum = $productquantity - $quantity;
                $sql = "UPDATE product SET product_quantity = '$sum' WHERE product_id = '$productid'";
                $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
                if ($result) {
                    header("location:cart.php");
                }
            } else {
                die("Conection error: " . $this->conn->error);
            }
        }
    }

    //get order inside cart
    public function getOrderCart($id)
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id WHERE order_status = 'yet' AND orders.user_id = '$id'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get user who ordered
    public function getOrderUser()
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id INNER JOIN users ON users.user_id = orders.user_id WHERE order_status = 'done' AND deliver_status = 'yet'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get all order
    public function getOrderAll()
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id INNER JOIN users ON users.user_id = orders.user_id";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get specific user who ordered
    public function getSpecificOrderUser($id)
    {
        $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id INNER JOIN users ON users.user_id = orders.user_id WHERE order_id = '$id'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
        $row = $result->fetch_assoc();
        return $row;
    }

    //confirm item
    public function confirmOrder($id)
    {
        $sql = "UPDATE orders SET deliver_status = 'done' WHERE order_id = '$id'";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if ($result) {
            header("location:deliverer/deliverer.php");
        }
    }

    //accept order
    public function acceptOrder($address, $userid)
    {
        $sql = "UPDATE orders SET order_status = 'done',address = '$address' WHERE order_status = 'yet'";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if ($result) {
            header("location:order-complete.php");
        }
    }

    //delete order from cart
    public function deleteOrder($id, $productid, $quantity, $productquantity)
    {
        $sum = $productquantity + $quantity;
        $sql = "UPDATE product SET product_quantity = '$sum' WHERE product_id = '$productid'";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if ($result) {
            $sql = "DELETE FROM orders WHERE order_id = $id";
            $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
            if ($result) {
                header("location:cart.php");
            }

        }
    }
}
