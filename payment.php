<?php
include('header.php');

// Retrieve total amount and price from the URL
$total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : 0;
$price = isset($_GET['price']) ? $_GET['price'] : 0;
$total_price = isset($_GET['total_price']) ? $_GET['total_price'] : 0; // Fetch total_price from URL

?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .payment-container {
        margin-top: 50px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: #8B008B;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    button[name="btn_pay"] {
        background-color: #8B008B;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[name="btn_pay"]:hover {
        background-color: #6a0070;
    }

    /* Added styles for btn-pay */
    #btn-pay {
        margin-top: 20px;
        text-align: center;
    }

    #btn-pay a {
        display: inline-block;
        background-color: #8B008B;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    #btn-pay a:hover {
        background-color: #6a0070;
    }
</style>

<section class="payment-container">
    <h3 class="text-center" style="color: #8B008B;">Payment Details</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Booking Details</h5>
                        <p>Total Amount: Rs. <?php echo $total_amount + $price; ?></p>

                        <form method="post" id="paymentForm">
                            <h5 class="card-title mt-3">Payment Method</h5>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="payment_method" value="card" checked>
                                    Credit/Debit Card
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="payment_method" value="upi">
                                    UPI
                                </label>
                            </div>

                            <div id="cardFields">
                                <h5 class="card-title mt-3">Card Information</h5>
                                <div class="form-group">
                                    <label for="card_number">Card Number</label>
                                    <input type="text" class="form-control" id="card_number" name="card_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiry_date" name="expiry_date"
                                        placeholder="MM/YY" required>
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                                </div>
                            </div>

                            <div id="upiFields" style="display: none;">
                                <h5 class="card-title mt-3">UPI Information</h5>
                                <div class="form-group">
                                    <label for="upi_id">UPI ID</label>
                                    <input type="text" class="form-control" id="upi_id" name="upi_id" required>
                                </div>
                            </div>

                            <div id="btn-pay">
                                <a href="success.php">Pay</a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentForm = document.getElementById('paymentForm');
        const cardFields = document.getElementById('cardFields');
        const upiFields = document.getElementById('upiFields');

        paymentForm.addEventListener('change', function () {
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (selectedPaymentMethod === 'card') {
                cardFields.style.display = 'block';
                upiFields.style.display = 'none';
            } else if (selectedPaymentMethod === 'upi') {
                cardFields.style.display = 'none';
                upiFields.style.display = 'block';
            }
        });
    });
</script>

<?php
include("footer.php");
?>
