<?php
    require_once "../classes/User.php";
    $user = new User;
    $result = $user->getUser();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin_home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <?php require_once "navbar.php";?>
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email Adress</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Status</th>
                        <th>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">
                                Add users
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $key => $row){
                        $id = $row['user_id'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $status = $row['status'];
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $username . "</td>";
                        echo "<td>" . $email . "</td>";
                        echo "<td>" . $firstname . "</td>";
                        echo "<td>" . $lastname . "</td>";
                        echo "<td>" . $status . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=$id' class='btn btn-info'>Edit</a>";
                        echo "<a href='../userAction.php?action=delete&id=$id' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="post" action="../userAction.php">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <h4>Register New User</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="name">Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                                <input type="text" name="username" class="form-control" id="name"
                                                    placeholder="abcde012345" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <!-- Put name validation error messages here -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="name">Firstname</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                                <input type="text" name="firstname" class="form-control" id="name"
                                                    placeholder="John" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <!-- Put name validation error messages here -->

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="name">Lastname</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                                <input type="text" name="lastname" class="form-control" id="name"
                                                    placeholder="Doe" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <!-- Put name validation error messages here -->

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="name">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                                <select name="status" id="" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                    <option value="deliverer">deliverer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <!-- Put name validation error messages here -->

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="email">E-Mail Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="you@example.com" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <!-- Put e-mail validation error messages here -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-control-feedback">
                                            <span class="text-danger align-middle">
                                                <i class="fa fa-close"> </i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 field-label-responsive">
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-addon" style="width: 2.6rem">
                                                    <i class="fa fa-repeat"></i>
                                                </div>
                                                <input type="password" name="confirm" class="form-control" id="password-confirm"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <button type="submit" name="createa" class="btn btn-success"><i class="fa fa-user-plus"></i>
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>