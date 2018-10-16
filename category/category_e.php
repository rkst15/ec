<?php
require_once "../classes/Category.php";
$id = $_GET['id'];
$category = new Category;
$row = $category->getSpecificCategory($id);
$userid = $row['user_id'];
$categoryname = $row['category_name'];
$categorystatus = $row['category_status']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Register Form</title>
    <link rel="stylesheet" href="../css/create.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <form class="form-horizontal" role="form" method="post" action="categoryAction.php">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Edit Category</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Category name</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input type="text" name="categoryname" class="form-control" id="name" value="<?php echo $categoryname; ?>"
                                required autofocus>
                            <input type="hidden" name="id" class="form-control" id="name" value="<?php echo $id; ?>"
                                required autofocus>
                            <input type="hidden" name="userid" class="form-control" id="name" value="<?php echo $userid; ?>"
                                required autofocus>
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
                    <label for="email">Category status</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <select name="categorystatus" id="" class="form-control">
                                <option value="men">Men</option>
                                <option value="wemen">Women</option>
                            </select>
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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-user-plus"></i>
                        Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>