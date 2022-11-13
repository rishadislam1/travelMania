<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>

<?php
if (!isset($_GET["rid"])) {

    header("location:index.php");
} else {
    $curdate = date("Y/m/d");
    include('db_connect.php');
    $id = $_GET['rid'];


    $sql = "Select * from rentvehicle where id = '$id'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {

        $fname = $row['FName'];
        $lname = $row['LName'];
        $email = $row['Email'];
        $nat = $row['National'];
        $country = $row['Country'];
        $Phone = $row['Phone'];



        $vehicle = $row['vehicle'];

        $cin = $row['cin'];
        $cout = $row['cout'];
        $sta = $row['stat'];
        $days = $row['nodays'];
        $price = $row['price'];
    }
}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>

                    <li>
                        <a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Car Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>

                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>




                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->




        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Car Booking<small> <?php echo  $curdate; ?> </small>
                        </h1>
                    </div>


                    <div class="col-md-8 col-sm-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Booking Conformation
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>

                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $fname . ' ' . $lname; ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Nationality </th>
                                            <th><?php echo $nat; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>

                                        </tr>
                                        <tr>
                                            <th>Phone No </th>
                                            <th><?php echo $Phone; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Vehicle </th>
                                            <th><?php echo $vehicle; ?></th>

                                        </tr>



                                        <tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $cin; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Check-out Date</th>
                                            <th><?php echo $cout; ?></th>

                                        </tr>
                                        <tr>
                                            <th>No of days</th>
                                            <th><?php echo $days; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <th><?php echo $price; ?></th>

                                        </tr>

                                        <tr>
                                            <th>Status Level</th>
                                            <th><?php echo $sta; ?></th>

                                        </tr>





                                    </table>
                                </div>



                            </div>
                            <div class="panel-footer">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Select the Confirmation</label>
                                        <select name="conf" class="form-control">
                                            <option value selected> </option>
                                            <option value="Conform">Confirm</option>


                                        </select>
                                    </div>
                                    <input type="submit" name="co" value="Conform" class="btn btn-success">

                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Available Vehicle Details
                            </div>
                            <div class="panel-body">






                            </div>
                            <div class="panel-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. ROW  -->




        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
if (isset($_POST['co'])) {
    $st = $_POST['conf'];



    if ($st == "Conform") {
        $urb = "UPDATE `rentvehicle` SET `stat`='$st' WHERE id = '$id'";



        // $psql = mysqli_query($conn,$urb);






        if (mysqli_query($conn, $urb)) {
            echo "<script type='text/javascript'> alert('Booking Conform')</script>";
            echo "<script type='text/javascript'> window.location='roombook.php'</script>";
        }
    }
}




?>