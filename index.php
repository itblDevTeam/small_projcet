

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">



    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }


        .logo {
            height: 20%;
            border-bottom: 1px solid #fff;

        }

        .sidebar {
            height: 100vh;
            background: #2c3e50;
            opacity: .9;
        }

        .sidebar_item {
            padding: 0;
            list-style: none;
        }

        .sidebar_item li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar_item li a {
            display: block;
            text-decoration: none;
            color: #ddd;

        }

        .sidebar_item li a:hover {
            background: #16A085;
        }

        .tbl_btn {
            background: teal;
            border-radius: 100px;
        }
    </style>


    <title>Small Project</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <!-- sidebar starts  -->
            <div class="col-lg-2 col-md-2 col-sm-2 p-0">

                <div class="sidebar">

                    <div class="logo d-flex justify-content-center align-items-center">
                        <img src="./image/ITbl.png" alt="" height="90px" width="90px">
                    </div>
                    <div class="sidebar_item">
                        <h1 class="text-white p-3 logo" style="font-size:34px;">Dashboard</h1>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./prepaid_cust_entry.php">Prepaid Customer Entry</a></li>
                    </div>
                </div>
            </div>
            <!-- sidebar ends  -->

            <!-- page content starts  -->
            <div class="col-lg-10 col-md-10 col-sm-10 p-0">
                <div class="row m-0">
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0">
                        <h1 class="text-white text-center">Header</h1>
                    </div>
                </div>


                <div class="row m-0">
                    <div class="col-xl-6 col-lg-5">
                        <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">BUILDING TYPE</h6>
                        </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
                

                

                

            </div>
            <!-- page content ends  -->


        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>



    <?php include 'Connection.php';


  // bill cycle starts

//   $BILL_CYCLE = "[";
//   $sql = "select BILL_CYCLE_CODE from MIS_BILL_CYCLE_MASTER order by BILL_CYCLE_CODE desc"; 
//   $parseresults = ociparse($conn, $sql);
//   ociexecute($parseresults);
  
//   while ($row = oci_fetch_assoc($parseresults)) {
//     $BILL_CYCLE .= '"' . $row['BILL_CYCLE_CODE'] . '",';
//   }
  
//   $BILL_CYCLE = substr($BILL_CYCLE, 0, -1);
//   $BILL_CYCLE = $BILL_CYCLE . "]";

//   echo $BILL_CYCLE;

  // bill cycle ends


    // status pie chart starts
    
    $REC_STATUS = "[";
  $COUNT_REC_STATUS = "[";
  // $sql2 = "select SIZE_NAME,sum(amount) AMOUNT3 from v_bill group by SIZE_NAME";
  $sql = "SELECT REC_STATUS, COUNT(*) COUNT_REC_STATUS  FROM PCC.PC_CUSTOMERS_CORR GROUP BY REC_STATUS";
  $parseresults = ociparse($conn, $sql);
  ociexecute($parseresults);

  while ($row = oci_fetch_assoc($parseresults)) {
    $REC_STATUS .= '"' . $row['REC_STATUS'] . '",';
    $COUNT_REC_STATUS .= '"' . $row['COUNT_REC_STATUS'] . '",';
  }
  $REC_STATUS = substr($REC_STATUS, 0, -1);
  $COUNT_REC_STATUS = substr($COUNT_REC_STATUS, 0, -1);


  $REC_STATUS = $REC_STATUS . ']';
  $COUNT_REC_STATUS = $COUNT_REC_STATUS . ']';

  


    // status pie chart ends 
  
  oci_free_statement($parseresults);
  oci_close($conn); 
  ?>


    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';


        // Pie Chart 1
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo "$REC_STATUS"; ?>,
            datasets: [{
            
            data: <?php echo "$COUNT_REC_STATUS"; ?>,
            backgroundColor: ['#4e73df', '#1cc88a'],
            hoverBackgroundColor: ['#2e59d9', '#17a673'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: true
            },
            cutoutPercentage: 50,
        },
        });
    
    

    
    </script>


</body>

</html>