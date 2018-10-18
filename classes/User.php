<?php
require_once "Database.php";
class User extends Database
{
    //create users
    public function createUser($username, $password, $confirm, $email, $firstname, $lastname, $status)
    {
        if ($password != $confirm) {
            $msg = "<div class='alert alert-danger' role='alert'>Confirm password is different from Password !</div>";
            $_SESSION['msg'] = $msg;
            header("location:create.php");
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows >= 1) {
                $msg = "<div class='alert alert-danger' role='alert'>This username or email exists already!</div>";
                $_SESSION['msg'] = $msg;
                header("location:create.php");
            } else {
                $newpass = md5($password);
                $sql = "INSERT INTO users(username,email,firstname,lastname,password,status) VALUES('$username', '$email', '$firstname','$lastname','$newpass', '$status')";
                $result = $this->conn->query($sql);
                if ($result) {
                    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>New account is created successfully!</div>";
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    if ($status == "deliverer") {
                        header("location:deliverer/deliverer.php");
                    } else {
                        header("location:index.php");
                    }
                } else {
                    die("Conection error: " . $this->conn->connect_error);
                }
            }
        }
    }

    //create users from Admin
    public function createUserAdmin($username, $password, $confirm, $email, $firstname, $lastname, $status)
    {
        if ($password != $confirm) {
            $msg = "<div class='alert alert-danger' role='alert'>Confirm password is different from Password !</div>";
            $_SESSION['msg'] = $msg;
            header("location:create.php");
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows >= 1) {
                $msg = "<div class='alert alert-danger' role='alert'>This username or email exists already!</div>";
                $_SESSION['msg'] = $msg;
                header("location:create.php");
            } else {
                $newpass = md5($password);
                $sql = "INSERT INTO users(username,email,firstname,lastname,password,status) VALUES('$username', '$email', '$firstname','$lastname','$newpass', '$status')";
                $result = $this->conn->query($sql);
                if ($result) {
                    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>New account is created successfully!</div>";
                    header("location:admin/user.php");
                } else {
                    die("Conection error: " . $this->conn->connect_error);
                }
            }
        }
    }

    //get all users
    public function getUser()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //get specific user
    public function getSpecificUser($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql) or die("Conection error: " . $this->conn->connect_error);
        $row = $result->fetch_assoc();
        return $row;
    }

    //edit user
    public function editUser($id, $newuser, $newemail)
    {
        $sql = "UPDATE users SET username = '$newuser', email = '$newemail' WHERE user_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:admin/user.php");
        }
    }

    //delete user
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql) or die("conection error: " . $this->conn->connect_error);
        if ($result) {
            header("location:admin/user.php");
        }

    }

    //login user
    public function loginUser($useremail, $password, $status)
    {
        $newpass = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$useremail' AND password = '$newpass' AND status = '$status'";
        $result = $this->conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            if ($result->num_rows === 1) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                if ($status == "admin") {
                    header("location:admin/admin_home.php");
                } elseif ($status == "user") {
                    header("location:index.php");
                } else {
                    header("location:deliverer/deliverer.php");
                }
            } else {
                $sql = "SELECT * FROM users WHERE email = '$useremail' AND password = '$newpass' AND status = '$status'";
                $result = $this->conn->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    if ($result->num_rows === 1) {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        if ($status == "admin") {
                            header("location:admin/admin_home.php");
                        } elseif ($status == "user") {
                            header("location:index.php");
                        } else {
                            header("location:deliverer.php");
                        }
                    } else {
                        header("location:login.php");
                    }
                } else {
                    die("conection error: " . $this->conn->connect_error);
                }
            }
        } else {
            die("Conection error: " . $this->conn->connect_error);
        }
    }
    
}
