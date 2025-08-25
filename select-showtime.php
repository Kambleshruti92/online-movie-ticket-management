<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/movie-detail.css">
    <title>Cinema Details</title>
</head>

<body>
    <div id="main">
        <div id="nav-seat">
            <ul>
                <li><a href="#">SELECT SHOWTIME</a></li>
                <li><a href="#">SELECT SEAT(S)</a></li>
                <li><a href="#">RESERVE | BUY</a></li>
            </ul>
        </div>
        <div id="select-showtime-details">
            <?php
            $id = $_REQUEST['movie_id'];
            $count = 1;

            // Query 1
            $sql_time = 'SELECT DISTINCT date(start_time) FROM scheduledetails sd JOIN branches_halls bh ON bh.hall_branch_id = sd.hall_branch_id JOIN branches b ON bh.branch_id = b.branch_id WHERE sd.movie_id =' . $id . ' AND end_time > NOW() LIMIT 3';
            $result_time = $connection->query($sql_time);

            if (!$result_time) {
                die("Error in SQL query (Query 1): " . $connection->error);
            }

            while ($time = $result_time->fetch_assoc()) {
                $s_time = $time['date(start_time)'];

                // Query 2
                $sql_branch = "SELECT DISTINCT branch_name,bh.branch_id FROM scheduledetails sd JOIN branches_halls bh ON bh.hall_branch_id = sd.hall_branch_id JOIN branches b ON bh.branch_id = b.branch_id
                            WHERE sd.movie_id =$id AND end_time > NOW() AND date(start_time) ='$s_time'";
                $result_branch = $connection->query($sql_branch);

                if (!$result_branch) {
                    die("Error in SQL query (Query 2): " . $connection->error);
                }

                while ($branch = $result_branch->fetch_assoc()) {
                    $branch_name = $branch['branch_name'];

                    // Query 3
                    $sql_hall = "SELECT DISTINCT hall_name FROM halls h JOIN branches_halls bh ON h.hall_id = bh.hall_id JOIN scheduledetails sd ON sd.hall_branch_id = bh.hall_branch_id JOIN branches b ON bh.branch_id = b.branch_id
                             WHERE sd.movie_id = $id AND end_time > NOW() AND b.branch_name = '$branch_name' AND date(start_time) ='$s_time'";
                    $result_hall = $connection->query($sql_hall);

                    if (!$result_hall) {
                        die("Error in SQL query (Query 3): " . $connection->error);
                    }

                    // Rest of your code
                    ?>
                    <div id="showtime-details">
                        <div class="widget">
                            <div class="all logo">
                                <div id="logo">
                                    <img src="../images/bird-logo.png" alt="">
                                </div>
                            </div>
                            <div class="schedule-list">
                                <div class="location"><?php echo $branch_name . " ( " . $s_time . ")" ?></div>
                                <div class="theatre-list">
                                    <?php
                                    while ($hall = $result_hall->fetch_assoc()) {
                                        $hall_name = $hall['hall_name'];
                                        ?>
                                        <div class="theatre"><?php echo $hall_name ?></div>
                                        <ul>
                                            <?php
                                            $sql_st = "SELECT start_time ,sd.scheduleDetail_id FROM scheduledetails sd JOIN branches_halls bh ON sd.hall_branch_id = bh.hall_branch_id JOIN branches b ON b.branch_id=bh.branch_id
                                            JOIN halls h ON h.hall_id=bh.hall_id  WHERE movie_id=$id AND start_time>NOW() AND branch_name='$branch_name' AND hall_name='$hall_name' AND date(start_time) ='$s_time'";
                                            $result_start_time = $connection->query($sql_st);

                                            if (!$result_start_time) {
                                                die("Error in SQL query (Query 4): " . $connection->error);
                                            }

                                            if ($result_start_time->num_rows > 0) {
                                                while ($st = $result_start_time->fetch_assoc()) {
                                                    ?>
                                                    <li><a id="<?php echo $count; ?>" <?php $sdBooked = $st['scheduleDetail_id']; ?> value="<?php echo $sdBooked; ?>" href="payment/public/index.php?scheduleID=<?php echo $sdBooked ?>"><?php $time = $st['start_time'];
                                                                                                                                                                                                                        $count += 1;
                                                                                                                                                                                                                        echo date('h:i a', strtotime($time)); ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
