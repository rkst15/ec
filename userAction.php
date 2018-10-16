<?php
require_once "classes/User.php";
$user = new User;
session_start();

//login user
if (isset($_POST['login'])) {
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $user->loginUser($useremail, $password, $status);
}

//create user
elseif (isset($_POST['create'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $status = $_POST['status'];
    $user->createUser($username, $password, $confirm, $email, $firstname, $lastname, $status);
}

//create user from admin
elseif (isset($_POST['createa'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $status = $_POST['status'];
    $user->createUserAdmin($username, $password, $confirm, $email, $firstname, $lastname, $status);
}

//edit user
elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $newuser = $_POST['newuser'];
    $newemail = $_POST['newemail'];
    $user->editUser($id, $newuser, $newemail);
}

//delete user
elseif ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $user->deleteUser($id);
}
