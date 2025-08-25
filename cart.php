<?php
session_start();
include("header.php");

$host = "localhost";
$username = "root";
$password = "";
$database = "movie_ticket_booking";

$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST["selected_items"]) && !empty($_POST["selected_items"])) {
    foreach ($_POST["selected_items"] as $selected_item_id) {
        // Sanitize and validate input
        $selected_item_id = intval($selected_item_id);
        $q1 = 2;
        // Insert selected items into 'cart' table
        $insert_query = "INSERT INTO cart (food_id, quantity) VALUES ($selected_item_id, $q1)";
        $con->query($insert_query);
    }
}

// Initialize total price
$total_price = 0;

// Fetch selected items from the cart
$select_query = "SELECT food_id, quantity FROM cart";
$result = $con->query($select_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
        }

        h3 {
            color: #8B008B;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #8B008B;
            color: white;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

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
    </style>
</head>

<body>
    <section>
        <div class="container">
            <h3>Your Cart</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $food_id = $row["food_id"];
                            $quantity = $row["quantity"];

                            // Fetch food details from the database
                            $food_query = "SELECT id, name, price FROM food WHERE id = $food_id";
                            $food_result = $con->query($food_query);

                            if ($food_result && $food_result->num_rows > 0) {
                                $food_details = $food_result->fetch_assoc();

                                // Calculate total price for the item
                                $item_total_price = $food_details["price"] * $quantity;

                                // Add to the total price
                                $total_price += $item_total_price;

                                // Display the cart item
                                echo "<tr>";
                                echo "<td>" . $food_details["id"] . "</td>";
                                echo "<td>" . $food_details["name"] . "</td>";
                                echo "<td>₹" . $food_details["price"] . "</td>";
                                echo "<td>" . $quantity . "</td>";
                                echo "<td>₹" . $item_total_price . "</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>No items in the cart</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="cart-btn">
                <p>Total Price: ₹<?php echo $total_price; ?></p>
                <a href="payment1.php">Continue</a>
            </div>
        </div>
    </section>

</body>

</html>
