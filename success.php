<?php
include('header.php');

// Retrieve payment details
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
$expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
$upi_id = isset($_POST['upi_id']) ? $_POST['upi_id'] : '';
$total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : '';

// Establish database connection
$connection = mysqli_connect("localhost", "root", "", "movie_ticket_booking");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert payment details into the database
$sql = "INSERT INTO payment_details (payment_method, card_number, expiry_date, cvv, upi_id, total_amount)
        VALUES ('$payment_method', '$card_number', '$expiry_date', '$cvv', '$upi_id', '$total_amount')";

$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    // Display booking information
    $booking_query = "SELECT shows.id, shows.show_date, shows.no_seat, shows.movie_id, movies.movie_title AS 'movie_name', show_time.time, cinema.name 
    FROM shows, movies, show_time, cinema 
    WHERE shows.movie_id = movies.movie_id 
    AND shows.show_time_id = show_time.id 
    AND shows.cinema_id = cinema.id";

    $booking_result = mysqli_query($connection, $booking_query);

    if ($booking_result) {
        echo '<!DOCTYPE html>
              <html lang="en">
              <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Booking Information</title>
                  <style>
                      body {
                          font-family: Arial, sans-serif;
                          background-color: #f0f0f0;
                          text-align: center;
                      }

                      .ticket {
                          background-color: #fff;
                          max-width: 400px;
                          margin: 20px auto;
                          padding: 20px;
                          border: 1px solid #ccc;
                          border-radius: 8px;
                          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                          position: relative;
                          background: linear-gradient(to bottom, #fefefe, #e0e0e0);
                      }

                      .ticket:before,
                      .ticket:after {
                          content: "";
                          position: absolute;
                          height: 100%;
                          width: 100%;
                          background: repeating-linear-gradient(45deg, #f00, #f00 10px, #fff 10px, #fff 20px);
                          opacity: 0.1;
                      }

                      .ticket:before {
                          top: 0;
                          left: 0;
                          z-index: -1;
                      }

                      .ticket:after {
                          bottom: 0;
                          right: 0;
                          z-index: -1;
                      }

                      h2 {
                          color: #333;
                      }

                      p {
                          margin: 5px 0;
                          color: #555;
                      }

                      strong {
                          font-weight: bold;
                      }
                  </style>
              </head>
              <body>';
        
        echo '<h2>MOVIE TICKET</h2>';
        echo '<div class="ticket">';
        
        while ($row = mysqli_fetch_assoc($booking_result)) {
            echo '<p><strong>Show ID:</strong> ' . $row['id'] . '</p>';
            echo '<p><strong>Show Date:</strong> ' . $row['show_date'] . '</p>';
            echo '<p><strong>No. of Seats:</strong> ' . $row['no_seat'] . '</p>';
            echo '<p><strong>Movie ID:</strong> ' . $row['movie_id'] . '</p>';
            echo '<p><strong>Movie Name:</strong> ' . $row['movie_name'] . '</p>';
            echo '<p><strong>Show Time:</strong> ' . $row['time'] . '</p>';
            echo '<p><strong>Cinema Name:</strong> ' . $row['name'] . '</p>';
        }

        echo '</div>';
        echo '</body></html>';
    } else {
        echo 'Error retrieving booking information: ' . mysqli_error($connection);
    }

    echo '<script>
            alert("Payment successful! Your booking is confirmed.");
    
          </script>';
} else {
    echo '<script>
            alert("Payment failed. Please try again.");
            window.location.href = "payment.php"; // Redirect to your payment page
          </script>';
}

// Close the database connection
mysqli_close($connection);

include("footer.php");
?>
