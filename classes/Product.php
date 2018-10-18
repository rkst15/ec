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
    public function createProduct($userid, $categoryid, $productname, $productprice, $productquantity,$image)
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
            $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->error);
            if($result){
                date_default_timezone_get();
                $data = date('Y_m_d',time());
                $directory = "../images/products/";
                $target_file = $directory . basename($data . "_" . $_FILES['image']['name']);
                $id = mysqli_insert_id($this->conn);
                $sql = "INSERT INTO images (product_id,image_1) VALUES('$id','$target_file')";
                $result = $this->conn->query($sql);
                if ($result) {
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                    header("location:product.php");
                } else {
                    die("Conection error: " . $this->conn->error);
                }
        }
    }
    }

    //edit product
    public function editProduct($id, $userid, $categoryid, $productname, $productprice, $productquantity)
    {
        $sql = "UPDATE product SET user_id = '$userid',category_id = '$categoryid', product_name = '$productname', product_price = '$productprice' , product_quantity = '$productquantity' WHERE product_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if($result){
            date_default_timezone_get();
            $data = date('Y_m_d',time());
            $directory = "../images/products/";
            $target_file = $directory . basename($data . "_" . $_FILES['image']['name']);
            $sql = "UPDATE images SET image_1 = '$target_file' WHERE product_id = '$id'";
            $result = $this->conn->query($sql);
            if ($result) {
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                header("location:product.php");
            }
        }
    }

    //delete product
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE product_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
        if ($result) {
            $sql = "DELETE FROM images WHERE product_id = $id";
            $result = $this->conn->query($sql) or die("conection error: " . $this->conn->error);
            if($result){
                header("location:product.php");
            }
        }
    }
}
