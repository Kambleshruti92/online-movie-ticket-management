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
        .movies-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .movie-card {
            width: calc(33.33% - 20px);
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
            height: 200px; /* Adjust height as needed */
        }

        .movie-card .card-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
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
    </style>
</head>
<body>

    <main>
            
        <section class="upcoming">
             
            <div class="container">
                <p class="section-subtitle">In Cinema</p>
                <h2 class="h2 section-title">UPCOMING MOVIES</h2>
            </div>
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
            <ul class="movies-list">
                <?php
                $result_upcoming = $con->select_all('movies');
                if ($result_upcoming->num_rows > 0) {
                    while ($row = $result_upcoming->fetch_assoc()) {
                ?>
                        <li>
                            <div class="movie-card">
                                <a href="movie-detail.php?movie_id=<?php echo $row['movie_id'] ?>">
                                    <figure class="card-banner">
                                        <img src="<?php echo $row['movie_image']; ?>">
                                    </figure>
                                </a>
                                <div class="title-wrapper">
                                    <h3 class="card-title"><?php echo $row['movie_title'] ?></h3>
                                    <time datetime="2022"><?php $release_date = $row['release_date'];
                                                            echo date('Y', strtotime($release_date))  ?></time>
                                </div>
                                <div class="card-meta">
                                    <div class="badge badge-outline">Up to IMAX</div>
                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>
                                        <time datetime="PT122M"><?php $du = $row['durations'];
                                                                echo $du ?></time>
                                    </div>
                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>
                                        <data><?php $rating = $row['rating'];
                                                if ($rating == "") {
                                                    echo "N/A";
                                                } else {
                                                    echo $rating;
                                                } ?></data>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </section>

        <!-- Additional sections if needed -->

    </main>
</body>

</html>
