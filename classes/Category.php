<?php
require_once "Database.php";
class Category extends Database
{
    //get all category
    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get men category and product
    public function getMenCategory()
    {
        $sql = "SELECT * FROM category INNER JOIN product ON category.category_id = product.category_id WHERE category_status = 'men'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get wemen category and product
    public function getWemenCategory()
    {
        $sql = "SELECT * FROM category INNER JOIN product ON category.category_id = product.category_id WHERE category_status = 'wemen'";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get specific category
    public function getSpecificCategory($id)
    {
        $sql = "SELECT * FROM category WHERE category_id = $id";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $row = $result->fetch_assoc();
        return $row;
    }

    //create category from Admin
    public function createCategory($userid,$categoryname, $categorystatus)
    {
        $sql = "SELECT * FROM category WHERE category_name = '$categoryname' AND category_status = '$categorystatus'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows >= 1) {
            // $msg = "<div class='alert alert-danger' role='alert'>This category exists already!</div>";
            // $_SESSION['msg'] = $msg;
            header("location:category.php");
        } else {
            $sql = "INSERT INTO category (user_id,category_name,category_status) VALUES('$userid','$categoryname','$categorystatus')";
            $result = $this->conn->query($sql);
            echo $result;
            if ($result) {
                // $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>New account is created successfully!</div>";
                header("location:category.php");
            } else {
                die("Conection error: " . $this->conn->connect_error);
            }
        }

    }

    //edit category
    public function editCategory($id,$userid, $categoryname, $categorystatus)
    {
        $sql = "UPDATE category SET user_id = '$userid', category_name = '$categoryname', category_status = '$categorystatus' WHERE category_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:category.php");
        }
    }

    //delete category
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE category_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:category.php");
        }

    }
}
