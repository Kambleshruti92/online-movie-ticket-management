<?php
session_start();

class Connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "movie_ticket_booking";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select_all($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $result = $this->conn->query($sql);
        return $result;
    }
}

$con = new Connection();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT MOVIE</title>

    <link rel="stylesheet" href="css/stylee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center; /* Center content horizontally */
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .movies-heading {
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            background-color: #8B008B;
        }

        nav ul li {
            margin-right: 10px;
        }

        .filter-btn {
            background-color: #8B008B;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-btn:hover {
            background-color: grey;
        }

        .movies-list {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .movie-card {
            width: calc(25% - 20px); /* Adjust width as needed */
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .movie-card .card-banner {
            overflow: hidden;
        }

        .movie-card .card-banner img {
            width: 100%;
            height: auto;
            display: block;
        }

        .movie-card .title-wrapper {
            padding: 15px;
        }

        .movie-card .card-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .movie-card .card-meta {
            padding: 15px;
            background-color: #f5f5f5;
            border-top: 1px solid #eee;
        }

        .movie-card .badge {
            margin-right: 5px;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 500;
            color: #333;
            background-color: #f1f1f1;
            border-radius: 4px;
        }

        .movie-card .duration,
        .movie-card .rating {
            margin-top: 5px;
        }

        .movie-card .duration ion-icon,
        .movie-card .rating ion-icon {
            margin-right: 5px;
            font-size: 16px;
            color: #333;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <h1 class="movies-heading">Movies in Cinema</h1>
        </div>
    </header>
    <nav>
        <ul class="filter-list">
            <li>
                <button class="filter-btn">Action</button>
            </li>
            <li>
                <button class="filter-btn">Horror</button>
            </li>
            <li>
                <button class="filter-btn">Documentary</button>
            </li>
            <li>
                <button class="filter-btn">Science-Fiction</button>
            </li>
        </ul>
    </nav>

    <main>
        <section class="upcoming">
            <ul class="movies-list">
                <?php
                $result_upcoming = $con->select_all('movies');
                $count = 0; // Initialize count
                echo '<div class="row">'; // Start the first row
                while ($row = $result_upcoming->fetch_assoc()) {
                    echo '<li class="movie-card">';
                    echo '<a href="movie-detail.php?movie_id=' . $row['movie_id'] . '">';
                    echo '<figure class="card-banner">';
                    echo '<img src="' . $row['movie_image'] . '">';
                    echo '</figure>';
                    echo '</a>';
                    echo '<div class="title-wrapper">';
                    echo '<h3 class="card-title">' . $row['movie_title'] . '</h3>';
                    echo '<time datetime="2022">' . date('Y', strtotime($row['release_date'])) . '</time>';
                    echo '</div>';
                    echo '<div class="card-meta">';
                    echo '<div class="badge badge-outline">Up to IMAX</div>';
                    echo '<div class="duration">';
                    echo '<ion-icon name="time-outline"></ion-icon>';
                    echo '<time datetime="PT122M">' . $row['durations'] . '</time>';
                    echo '</div>';
                    echo '<div class="rating">';
                    echo '<ion-icon name="star"></ion-icon>';
                    echo '<data>' . ($row['rating'] == "" ? "N/A" : $row['rating']) . '</data>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                    $count++;
                    if ($count % 4 == 0) { // Close the current row and start a new row after every 4 items
                        echo '</div>'; // Close the current row
                        echo '<div class="row">'; // Start a new row
                    }
                }
                echo '</div>'; // Close the last row
                ?>
            </ul>
        </section>
    </main>
  <?php
    include("footer.php");
    ?>

</body>

</html>
