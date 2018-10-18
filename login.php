<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>

<head>
    <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body id="LoginForm">
    <div class="container">
        <h1 class="form-heading">login Form</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>User Login</h2>
                    <p>Please enter username or your email and password</p>
                </div>
                <form action="userAction.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="useremail" placeholder="Username or Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select name="status" id="" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="deliverer">Deliverer</option>
                        </select>
                    </div>
                    <div class="forgot">
                        <a href="create.php">Don't you have your account?</a>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
            <p class="botto-text"> Designed by Sunil Rajput</p>
        </div>
    </div>
    </div>


</body>

</html>