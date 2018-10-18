<?php
require_once "../classes/User.php";
require_once "../classes/Order.php";
$order = new Order;
$result = $order->getOrderAll();
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
    <?php
    require_once "navbar.php";
    ?>
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product name</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>Deliver Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($result as $key => $row) {
                            $id = $row['order_id'];
                            $name = $row['product_name'];
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $address = $row['address'];
                            $quantity = $row['order_quantity'];
                            $status = $row['deliver_status'];
                            echo "<tr>";
                            echo "<td>" . $id . "</td>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $firstname . " " .  $lastname . "</td>";
                            echo "<td>" . $address . "</td>";
                            echo "<td>" . $quantity . "</td>";
                            echo "<td>" . $status . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>