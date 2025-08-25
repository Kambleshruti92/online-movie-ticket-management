<?php
session_start();
include("header.php");

$con = new connec();
$tbl = "food";
$result = $con->select_all($tbl);

$host = "localhost";
$username = "root";
$password = "";
$database = "movie_ticket_booking";

$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .cart-btn {
            text-align: center;
            margin-top: 20px;
        }

        .cart-btn a {
            display: inline-block;
            background-color: #8B008B;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .cart-btn a:hover {
            background-color: #6A0072;
        }

        .food-item {
            margin-bottom: 20px;
        }

        .food-item img {
            width: 100%;
            height: 350px;
        }

        .food-item h6 {
            text-align: center;
            height: 40px;
        }

        .food-item p {
            text-align: center;
        }

        .food-item input {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <section class="mt-5">
        <h3 class="text-center" style="color:#8B008B;">SNACKS & DRINKS</h3>
        <div class="container">
            <form action="cart.php" method="post">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-md-3 food-item">
                                <img src="<?php echo $row["img_path"]; ?>" alt="Food Image" />
                                <h6 class="text-center mt-2"><?php echo $row["name"]; ?></h6>
                                <p>₹ <?php echo $row["price"]; ?></p>
                                <label for="quantity_<?php echo $row["id"]; ?>">Quantity:</label>
                                <select name="selected[<?php echo $row["id"]; ?>]" id="quantity_<?php echo $row["id"]; ?>">
                                    <?php
                                    for ($i = 0; $i <= 10; $i++) {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                                </select>
                                <input type="checkbox" name="selected_items[<?php echo $row["id"]; ?>]" value="<?php echo $row["id"]; ?>" /> Select
                            
                            </div>
                            
                    <?php
                        }
                    }
                    ?>
                </div>
                <center>
                <input type="submit" name="submit" value="Add to Cart">
                <div class="cart-btn">
                <!-- <a href="cart.php">Add to Cart</a> -->
                </div>
                </center>
            </form>
        </div>
    </section>

    <?php
    include("footer.php");
    ?>

</body>

</html>
