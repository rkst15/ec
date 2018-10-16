<?php
require_once "classes/Order.php";
$id = $_GET['id'];
$order = new Order;
$result = $order->getSpecificOrderUser($id);
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
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($result as $key => $row) {
                            $id = $row['user_id'];
                            $name = $row['product_name'];
                            $quantity = $row['order_quantity']; 
                            echo "<tr>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $quantity . "</td>";
                            // echo "<td>";
                            // echo "<a href='ordereditem.php?id=$id' class='btn btn-info'>Show items</a>";
                            // echo "<a href='OrderAction.php?action=delete&id=$id' class='btn btn-danger'>Confirm</a>";
                            // echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <div class="">
                <a href="deliverer.php" class="btn btn-outline-info">Get back to user list</a>
            </div>
        </div>
    </div>
</body>

</html>