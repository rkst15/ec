<?php
require_once "../classes/Category.php";
$category = new Category;
session_start();

//create user
if (isset($_POST['create'])) {
    $userid = $_POST['userid'];
    $categoryname = $_POST['category_name'];
    $categorystatus = $_POST['category_status'];
    $category->createCategory($userid,$categoryname, $categorystatus);
}

//edit user
elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $categoryname = $_POST['categoryname'];
    $categorystatus = $_POST['categorystatus'];
    $category->editCategory($id,$userid, $categoryname, $categorystatus);
}

//delete user
elseif ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $category->deleteCategory($id);
}