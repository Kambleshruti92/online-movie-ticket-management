<?php
include('header.php');

$con = new connec();
$result = $con->select_show_dt();

$checked_value = 0;

if (isset($_POST["btn_booking"])) {
   
    $cust_id = isset($_POST["cust_id"]) ? $_POST["cust_id"] : null;
    $show_id = $_POST["show_id"];
    $no_tikt = $_POST["no_ticket"];
    $bkng_date = $_POST["booking_date"];
    $screens = $_POST["screens"];

    // Initialize total amount with ticket price
    $total_amnt = (200 * $no_tikt);

    $seat_number = $_POST["seat_dt"];
    $seat_arr = explode(",", $seat_number);

    foreach ($seat_arr as $item) {
        $sql = "insert into seat_reserved(show_id,cust_id,seat_number,is_reserved) values ($show_id,$cust_id,'$item',1)";
        $abc = $con->insert_lastid($sql);
    }

    $sql = "insert into seat_details values(0,$cust_id,$show_id,$no_tikt)";
    $seat_dt_id = $con->insert_lastid($sql);

    $sql = "insert into booking values(0,$cust_id,$show_id,$screens,$no_tikt,$seat_dt_id,'$bkng_date',$total_amnt)";
    $con->insert($sql, "Your Ticket is Booked");

    // Redirect to payment page with updated total_amount
    echo '<script>
            window.location.href = "payment.php?total_amount=' . $total_amnt . '";
          </script>';
    exit();
}

?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    for (i = 1; i <= 4; i++) {
        for (j = 1; j <= 10; j++) {
            $('#seat_chart').append('<div class="col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:grey;color:white"><input type="checkbox" id="seat" value="R' + (i + 'S' + j) + '" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();">R' + (i + 'S' + j) + '</div>')
        }
    }
});

function change_option(mvalue) {
    sessionStorage.setItem("movie_id_of_option", mvalue.value);
    console.log(sessionStorage.getItem('movie_id_of_option'));
}

function checkboxtotal() {
    var seat = [];
    $('input[name="seat_chart[]"]:checked').each(function() {
        seat.push($(this).val());
    });

    var st = seat.length;
    document.getElementById('no_ticket').value = st;
    var total = "Rs. " + (st * 200);
    $('#price_details').text(total);
    $('#seat_dt').val(seat.join(", "));
}
</script>

<section class="mt-5">
    <h3 class="text-center" style="color:#8B008B;">Book Your Ticket Now</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="seat-map" id="seatCharts">
                    <h3 class="text-center mt-5" style="color:#8B008B;">Select Seat</h3>
                    <hr>
                    <label class="text-center" style="width:100%;background-color:#8B008B;color:white;padding:2%">
                        SCREEN
                    </label>

                    <div class="row" id="seat_chart">
                    </div>

                </div>
                <h6 class="mt-3" style="color:#8B008B;">Total Ticket Price</h6>
                <p class="mt-1" id="price_details"></p>

               
            </div>
            <div class="col-md-5">
                <form method="post" class="mt-5">
                    <div class="container" style="color:#8B008B;">
                        <center>
                            <p>Please fill this form to book your ticket.</p>
                        </center>
                        <hr>
                        <label for="username"><b>Customer Id</b></label>
                        <input type="number" style="border-radius:30px;" name="cust_id" required value="<?php echo isset($_SESSION['cust_id']) ? $_SESSION['cust_id'] : ''; ?>">

                        <label for="email"><b>Show Id</b></label>
                        <div class="form-group">
                            <select class="form-control" name="show_id" id="show_id" style="border-radius:30px;" onChange="change_option(this)">
                                <option>Select Show</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["movie_id"] . '">' . $row["movie_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                </div>

                        <label for="psw"><b>Screens</b></label>
                        <input type="number" style="border-radius:30px;" id="screens" name="screens" required>


                        <label for="psw"><b>No. of Tickets</b></label>
                        <input type="number" style="border-radius:30px;" id="no_ticket" name="no_ticket" required>

                        <label for="psw-repeat"><b>Seat Deatils</b></label>
                        <input type="text" style="border-radius:30px;" name="seat_dt" id="seat_dt" required>

                        <label for="number"><b>Booking Date</b></label>
                        <input type="date" style="border-radius:30px;" name="booking_date" required>
                        <br>
                        <button type="submit" name="btn_booking" class="btn" style="background-color:#8B008B;color:white;">Confirm Booking</button>

                        <hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
