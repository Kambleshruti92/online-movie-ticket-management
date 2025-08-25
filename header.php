<?php
include("conn.php");

if(!isset($_SESSION)) { 
    session_start(); 
  } 

$con=new connec();
if(isset($_GET["action"])) {
    if($_GET["action"]=="logout") {
        session_unset();
        session_destroy();
        header("Location: index.php"); 
    }
}


if(empty($_SESSION["username"]))
{
    $_SESSION["ul"]='<li class="nav-item"> <a class="nav-link"  data-toggle="modal" data-target="#modelId">Register</a></li><li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId1">Login</a></li>';
}

if(isset($_POST["btn_login"]))
{
    $email_id=$_POST["log_email"];
    $paswrd_log=$_POST["log_psw"];
   
    $result=$con->select_login("customer", $email_id);

    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();

        if($row["email"]==$email_id && $row["password"]==$paswrd_log)
        {
            $_SESSION["username"]=$row["fullname"];
            $_SESSION["cust_id"]=$row["id"];
            $_SESSION["ul"]='<li class="nav-item"> <a class="nav-link"> Hello '. $_SESSION["username"].'</a></li> <li class="nav-item"> <a class="nav-link" href="index.php?action=logout">Logout</a></li>';
        }
        else
        {
            echo '<script> alert("Invalid Password");</script>' ;
        }
    }
    else
    {
        echo '<script> alert("Invalid Email Id");</script>' ;
    }
}

if(isset($_POST["btn_reg"]))
{
    $fullname=$_POST["fullname"];
    $email=$_POST["email"];
    $cellno=$_POST["cellno"];
    $gender=$_POST["gender"];
    $password=$_POST["password"];
    $cnfrm_paswrd=$_POST["cnfrm_paswrd"];

    if($password==$cnfrm_paswrd)
    {
        $sql="insert into customer values(0,'$fullname','$email','$cellno','$gender','$password','$cnfrm_paswrd')";

        $con=new connec();
        $con->insert($sql,"Customer Registered Now You Can Login");
    }
    else
    {
        ?>
            <script> alert( "Confirm Password Not matched");</script> 
        <?php
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Online Movie Ticket Booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- jQuery and Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" href="images/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

    <style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
        padding: 16px;
        }

        /* Full-width input fields */
        textarea,input[type=text],  input[type=password], input[type=tel], input[type=number] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        textarea,input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
        background-color: maroon;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 50%;
        opacity: 0.9;
        
        }

        .registerbtn:hover {
        opacity:1;
        }

        /* Add a blue text color to links */
        a {
        color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
        background-color: #f1f1f1;
        text-align: center;
        }

        div.seatCharts-seat.available {
	    background-color: #949494;
        padding:20%;
	}
    
    .food-btn {
            text-align: center;
            margin-top: 20px;
        }

        .food-btn a {
            display: inline-block;
            background-color: #8B008B;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .food-btn a:hover {
            background-color: #6A0072;
        }
</style>


    </head> 
  <body>
   <nav class="navbar navbar-expand-md navbar-light" style="background-color:#8B008B">
    <a class="navbar-brand" href="#"><img src="images/logo.png" style="width:100px;"/></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="movies.php">Movies</a>
            </li>
           
            
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="food.php">food</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul> 
        
        <ul  class="navbar-nav ">
              <?php  echo  $_SESSION["ul"];  ?>
                <!-- <li class="nav-item">
                  <a class="nav-link"  data-toggle="modal" data-target="#modelId">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#modelId1">Login</a>
                </li> -->
          </ul>

    </div>
   </nav>




 
  <!--Register Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#8B008B;color:white;">
                  <!-- <h5 class="modal-title">Register</h5> -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                 
            <form method="post">
                <div class="container" style="color:#8B008B;">
                    <center>
                        <h1>Register</h1>
                        <p>Please fill in this form to create an account.</p>
                    </center>
 
                  <hr>

                    <label for="username"><b>Full Name</b></label>
                    <input type="text" style="border-radius:30px;" placeholder="Enter Your Name" name="fullname" id="username" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" style="border-radius:30px;" placeholder="Enter Email" name="email" id="email" required>

                    <label for="number"><b>Cell Number</b></label>
                    <input type="tel" style="border-radius:30px;" placeholder="Enter number" name="cellno" id="number" required>

                    <label for="number"><b>Select Gender</b></label>
                    <br>
                    <input type="radio" style="border-radius:30px;margin-right:2%" value="male" name="gender" id="gender" required>Male
                    <input type="radio" style="border-radius:30px;margin-left:5%;margin-right:2%;" value="female" name="gender" id="gender" required>Female

                    <br><br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" style="border-radius:30px;" placeholder="Enter Password" name="password" id="psw" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" style="border-radius:30px;" placeholder="Repeat Password" name="cnfrm_paswrd" id="psw_repeat" required>


                    <button type="Submit" name="btn_reg" class="btn" style="background-color:#8B008B;color:white;">Register</button>

                  <hr>
                </div>

                <div class="container">
                    <p>Already have an account? <a  style="color:gray" data-toggle="modal" data-target="#modelId1" data-dismiss="modal">Log in</a>.</p>
                </div>
            </form>
            </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div> -->
        </div>
    </div>
</div>
    

<!--Login Modal -->
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="background-color:#8B008B;color:white;">
                  <!-- <h5 class="modal-title">Login</h5> -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                 
                <form method="post">
                    <div class="container" style="color:#8B008B;">
                        <center>
                            <h1>Login</h1>
                        </center>
                     <hr>
                        <label for="email"><b>Email</b></label>
                        <input type="text" style="border-radius:30px;" placeholder="Enter Email" name="log_email" id="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" style="border-radius:30px;" placeholder="Enter Password" name="log_psw" id="psw" required>

                        <button type="submit" name="btn_login" class="btn" style="background-color:#8B008B;color:white;">Login</button>
                    </div>
                </form>
              </div>
          </div>
      </div>
</div>
    