<?php
require_once "Database.php";
class Product extends Database
{

    //get all product
    public function getProduct()
    {
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get specific product
    public function getSpecificProduct($id)
    {
        $sql = "SELECT * FROM product WHERE product_id = $id";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $row = $result->fetch_assoc();
        return $row;
    }

    //create product from Admin
    public function createProduct($userid,$categoryid,$productname,$productprice,$productquantity)
    {
        $sql = "SELECT * FROM product WHERE product_name = '$productname' AND product_price = '$productprice'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows >= 1) {
            // $msg = "<div class='alert alert-danger' role='alert'>This category exists already!</div>";
            // $_SESSION['msg'] = $msg;
            header("location:product.php");
        } else {
            $sql = "INSERT INTO product (user_id,category_id,product_name,product_price,product_quantity) VALUES('$userid','$categoryid','$productname','$productprice','$productquantity')";
            $result = $this->conn->query($sql);
            echo $result;
            if ($result) {
                // $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>New account is created successfully!</div>";
                header("location:product.php");
            } else {
                die("Conection error: " . $this->conn->connect_error);
            }
        }

    }

    //edit product
    public function editProduct($id,$userid,$categoryid,$productname,$productprice,$productquantity)
    {
        $sql = "UPDATE product SET user_id = '$userid',category_id = '$categoryid', product_name = '$productname', product_price = '$productprice', product_quantity = '$productquantity' WHERE product_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:product.php");
        }
    }

    //delete product
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE product_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:product.php");
        }

    }
}
