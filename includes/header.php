<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password);

// Database name to check
$dbname = "catafadb";

// Check if the database exists
$result = mysqli_query($con, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");

if (mysqli_num_rows($result) == 0) {
    header("Location: http://{$_SERVER['HTTP_HOST']}/catafa/setup");
}
mysqli_close($con);
?>

<?php 
    session_start();
    if (!isset($_SESSION['ADMIN_USER'])) {
        header("Location: http://{$_SERVER['HTTP_HOST']}/catafa/login.php");
    } 
?>

<?php
    // GET THE CURRENT GET VALUE OF PAGE IF SET
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATAFA -&nbsp<?php echo $page_title; ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/assets/images/logo/logo.php" class="d-block mx-auto"/ style="width: 20px; height:20px;">

    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/css/theme.css">

    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/css/bootstrap.min.css">


    <!--FONTS-->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fonts/lato.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fonts/roboto.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fonts/open-sans.css">


    <!--DATATABLE-->
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/css/datatables.min.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/css/style.css " rel="stylesheet">

    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fontawesome/js/all.min.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--JQUERY-->
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/jquery/jquery.print.js"></script>

    <!--CHART.JS-->
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/chart.js/Chart.min.js"></script>


    <!-------------CALLS THE SAVINGS CREDITING CODE---------------->
    <script>
        // Auto execute every 2 hours even if this page is not visited
      setInterval(function() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("GET", "<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/actions/savings_interest_creditor.php", true);
        xhttp.send();
      }, 2 * 60 * 60 * 1000); // 2 hours * 60 minutes/hour * 60 seconds/minute * 1000 milliseconds/second
    </script>


    <style>
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 13px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 20px;
            border: 3px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #999999;
        }

        .wrapper .sidebar{
            background: rgb(5, 68, 104);
            position: fixed;
            top: 0;
            left: 0;
            width: 242px;
            height: 100vh;
            transition: all 0.5s ease;
        }

        .wrapper .section{
            width: calc(100% - 242px);
            margin-left: 242px;
            transition: all 0.5s ease;
        }

        .wrapper .section .top_navbar{
            background: rgb(7, 105, 185);
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 30px;
         
        }

        .wrapper .section .top_navbar .hamburger a{
            font-size: 28px;
            color: #f4fbff;
        }

        .wrapper .section .top_navbar .hamburger a:hover{
            color: #a2ecff;
            cursor: pointer;
        }

        body.active .wrapper .sidebar{
            left: -242px;
        }

        body.active .wrapper .section{
            margin-left: 0;
            width: 100%;
        }

        body {
          font-family: 'Roboto', sans-serif !important;
        }


        form {
            padding: 0; 
            margin: 0;
        }
    </style>
</head>
<body style=" overflow: hidden; overflow-x: hidden;">  
    <div class="wrapper">
        <div class="sidebar" style="overflow-y: scroll; overflow-x: hidden;">
            <div class="profile">
                <div style="height: 28%;" class="d-flex flex-column">
                    <div class="w-100 h-75 ">
                        <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/assets/images/logo/logo.php" class="d-block mx-auto" style="height: 120px; width: 120px;">
                    </div>
                    <div class="w-100 h-25 d-flex align-items-center justify-content-center text-light font-weight-bold">
                        <?php
                            include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php"; 
                            $sql_name = "SELECT * FROM settings WHERE id = 1";
                            $query_name = mysqli_query($conn, $sql_name);
                            $row_name = mysqli_fetch_assoc($query_name);
                            $name = $row_name['name'];  
                         ?>
                        <h3 style="font-family: Arial, Helvetica, sans-serif;">
                            <?php echo $name; ?>
                        </h3>
                    </div>
                </div>
            </div >
            <hr class="text-light mx-2">
            <nav id="sidebar" class="mt-1 w-100 d-fex flex-column text-decoration-none" style="height: 72%;">
                <ul class="list-unstyled">
                    <li onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/index.php';" class="sidebar-link <?php if ($page_id == "dashboard") { echo "active-link"; } ?>" >
                        <span class="col-2">
                            <i class="mx-2 fas fa-dashboard fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">&nbspDashboard</span>
                    </li>

                    <li onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/members';" class="sidebar-link <?php if ($page_id == "members") { echo "active-link"; } ?>">
                        <span class="col-2">
                            <i class="mx-2 fas fa-user fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">&nbspMember list</span>
                    </li>
                    <li  data-bs-toggle="collapse" href="#loans-sub-nav" onclick="rotateArrow()" role="button" aria-expanded="false" aria-controls="ledger-sub-nav">
                        <span class="col-2">
                            <i class="mx-2 fas fa-credit-card fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">Loans</span>
                        <span class="col-1" style="position: absolute; right: 15px; margin-top: 6px;" id="arrow-icon-1"><i class="fas fa-angle-left"></i></span>
                    </li>
                            <!--LOANS SUB NAV-->
                    <div class="collapse sub-nav" id="loans-sub-nav">
                        <div class="sub-nav-item <?php if ($page_id == "loans" AND $page == "loans") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/loans/index.php?page=loans';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Loan List</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "loans" AND $page == "loan-bank") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/loans/index.php?page=loan-bank';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Funds</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "loans" AND ($page == "loan-history" OR $page == "loan-individual-history")) { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/loans/index.php?page=loan-history';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Loan History</span>
                        </div>

                        <!------JS to remain the sub-nav open-->
                        <script>

                            //Rotate the Arrow Icon
                            let a = 'left';
                            function rotateArrow() {
                                if (a == 'left') {
                                    document.getElementById('arrow-icon-1').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                                } else if (a == 'down') {
                                    document.getElementById('arrow-icon-1').innerHTML = '<i class="fas fa-angle-left"></i>';
                                    a = 'left';
                                }
                            }
                          // Get the value of the "alwaysOpen" GET parameter
                          const loanOpen = new URLSearchParams(window.location.search).get('page');
                          
                          // Check if the parameter is set and add the "show" class to the collapse element
                          if ( loanOpen === 'loans' || loanOpen === 'loan-bank' || loanOpen === 'loan-history' || loanOpen === 'loan-individual-history') {
                            document.getElementById('loans-sub-nav').classList.add('show');
                            document.getElementById('arrow-icon-1').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                          }
                        </script>
                    </div>
                    <li data-bs-toggle="collapse" onclick="rotateArrow2()" href="#savings-sub-nav" role="button" aria-expanded="false" aria-controls="savings-sub-nav">
                        <span class="col-2">
                            <i class="mx-2 fas fa-piggy-bank fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">Savings</span>
                        <span class="col-1" style="position: absolute; right: 15px; margin-top: 6px;" id="arrow-icon-2"><i class="fas fa-angle-left"></i></span>
                    </li>
                              <!--Savings SUB NAV-->
                    <div class="collapse sub-nav" id="savings-sub-nav">
                        <div class="sub-nav-item <?php if ($page_id == "savings" AND $page == "savings") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/savings/index.php?page=savings';" style="<?php if (mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM savings_plan')) == 0) echo 'display: none;' ?>">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Account List</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "savings" AND $page == "savings-wallet") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/savings/index.php?page=savings-wallet';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Savings Wallet</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "savings" AND ($page == "savings-history" OR $page == "savings-individual-ledger")) { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/savings/index.php?page=savings-history';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Savings History</span>
                        </div>

                        <!------JS to remain the sub-nav open-->
                        <script>
                            //Rotate the Arrow Icon
                            function rotateArrow2() {
                                if (a == 'left') {
                                    document.getElementById('arrow-icon-2').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                                } else if (a == 'down') {
                                    document.getElementById('arrow-icon-2').innerHTML = '<i class="fas fa-angle-left"></i>';
                                    a = 'left';
                                }
                            }

                          // Get the value of the "alwaysOpen" GET parameter
                          const savingsOpen = new URLSearchParams(window.location.search).get('page');
                          
                          // Check if the parameter is set and add the "show" class to the collapse element
                          if (savingsOpen === 'savings' || savingsOpen === 'savings-wallet' || savingsOpen === 'savings-history' || savingsOpen === 'savings-individual-ledger') {
                            document.getElementById('savings-sub-nav').classList.add('show');
                            document.getElementById('arrow-icon-2').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                          }
                        </script>
                    </div>
                    <li data-bs-toggle="collapse" onclick="rotateArrow3()" href="#analytics-sub-nav" role="button" aria-expanded="false" aria-controls="analytics-sub-nav">
                        <span class="col-2">
                            <i class="mx-2 fas fa-chart-pie fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">Analytics</span>
                        <span class="col-1" style="position: absolute; right: 15px; margin-top: 6px;" id="arrow-icon-3"><i class="fas fa-angle-left"></i></span>
                    </li>

                       <!--Analytics SUB NAV-->
                    <div class="collapse sub-nav" id="analytics-sub-nav">
                        <div class="sub-nav-item <?php if ($page_id == "analytics" AND $page == "loans-analytics") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/analytics/index.php?page=loans-analytics';">
                            <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Loans</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "analytics" AND $page == "savings-analytics") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/analytics/index.php?page=savings-analytics';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Savings</span>
                        </div>
                        <div class="sub-nav-item <?php if ($page_id == "analytics" AND $page == "members-analytics") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/analytics/index.php?page=members-analytics';">
                          <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Members</span>
                        </div>
                        <!------JS to remain the sub-nav open-->
                        <script>
                            //Rotate the Arrow Icon
                            function rotateArrow3() {
                                if (a == 'left') {
                                    document.getElementById('arrow-icon-3').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                                } else if (a == 'down') {
                                    document.getElementById('arrow-icon-3').innerHTML = '<i class="fas fa-angle-left"></i>';
                                    a = 'left';
                                }
                            }

                          // Get the value of the "alwaysOpen" GET parameter
                          const analyticsOpen = new URLSearchParams(window.location.search).get('page');
                          
                          // Check if the parameter is set and add the "show" class to the collapse element
                          if (analyticsOpen === 'loans-analytics' || analyticsOpen === 'savings-analytics' || analyticsOpen === 'members-analytics') {
                            document.getElementById('analytics-sub-nav').classList.add('show');
                            document.getElementById('arrow-icon-3').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                          }
                        </script>
                    </div>

                     <li data-bs-toggle="collapse" onclick="rotateArrow4()" href="#help-sub-nav" role="button" aria-expanded="false" aria-controls="help-sub-nav">
                        <span class="col-2">
                            <i class="mx-2 fas fa-question-circle fa-lg"></i>
                        </span>
                        <span class="col-9 nav-text">Help</span>
                        <span class="col-1" style="position: absolute; right: 15px; margin-top: 6px;" id="arrow-icon-4"><i class="fas fa-angle-left"></i></span>
                    </li>

                       <!--HELP SUB NAV-->
                    <div class="collapse sub-nav" id="help-sub-nav">
                        <!--
                        <div class="sub-nav-item <?php if ($page_id == "help" AND $page == "video-tutorial") { echo "active-sub-nav"; } ?>" onclick="window.location.href = '<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/help/index.php?page=video-tutorial';">
                            <span class="mx-2"><i class="fas fa-dot-circle"></i></span>
                            <span>Video Tutorials</span>
                        </div>
                        -->
                        <div class="sub-nav-item <?php if ($page_id == "help" AND $page == "user-manual") { echo "active-sub-nav"; } ?>" onclick="window.open('<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/help/User_Manual.pdf');">
                          <span class="mx-1"><i class="fas fa-file-pdf"></i></span>
                            <span>User_Manual.pdf</span>
                        </div>
                        <!------JS to remain the sub-nav open-->
                        <script>

                            //Rotate the Arrow Icon
                            function rotateArrow4() {
                                if (a == 'left') {
                                    document.getElementById('arrow-icon-4').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                                } else if (a == 'down') {
                                    document.getElementById('arrow-icon-4').innerHTML = '<i class="fas fa-angle-left"></i>';
                                    a = 'left';
                                }
                            }

                          // Get the value of the "alwaysOpen" GET parameter
                          const helpOpen = new URLSearchParams(window.location.search).get('page');
                          
                          // Check if the parameter is set and add the "show" class to the collapse element
                          if (helpOpen === 'video-tutorial' || helpOpen === 'user-manual') {
                            document.getElementById('help-sub-nav').classList.add('show');
                            document.getElementById('arrow-icon-4').innerHTML = '<i class="fas fa-angle-down"></i>';
                                    a = 'down';
                          }
                        </script>
                    </div>
                </ul>
            </nav>
            <div class="my-5">
                <!--Give space at the bottom of the Sidebar-->
            </div>
        </div>
        <div class="section">
            <!--Toolbars Container-->
                <div id="top-container" class="top_navbar w-100 p-1 d-flex flex-row border-end" style="background-color: #ededed; border-bottom: 1px solid #DCE1E7;">
                    <div class="w-25 d-flex flex-row">
                        <div class="hamburger w-25 d-flex align-items-center justify-content-center">
                            <a class="text-secondary">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-75 d-flex flex-row">
                        <div class="w-50">
                            
                        </div>
                        <div class="w-50 d-flex flex-row">
                            <div class="w-75">
                                
                            </div>
                            <div class="w-25 d-flex align-items-center mx-4">
                                <a class="nav-link text-secondary text-decoration-none dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/catafa/assets/images/icons/profile.png" style="width: 35px;"> Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light border-0 shadow-sm animate__fadeIn" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li style="height: 38px;">
                                        <button style="height: 100%; margin: 0;" class="dropdown-item text-secondary" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT']?>/catafa/settings/account.php'">
                                            <span>
                                                <i class="fas fa-user"></i> 
                                             </span>
                                            <span>
                                                &nbspAccount
                                            </span>
                                        </button>
                                    </li>
                                    <li style="height: 38px;">
                                        <button style="height: 100%; margin: 0;" class="dropdown-item text-secondary" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT']?>/catafa/settings/index.php?page=display'">
                                            <span>
                                                    <i class="fas fa-cog"></i> 
                                            </span>
                                            <span>
                                                &nbspSettings
                                            </span>
                                        </button>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li style="height: 38px;">
                                        <button style="height: 100%; margin: 0;" class="dropdown-item text-secondary" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT']?>/catafa/actions/logout.php'">
                                            <span>
                                                <i class="fas fa-sign-out-alt"></i>  
                                            </span>
                                            <span>
                                                &nbspLogout 
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Main content Container-->
                <div id="body-container" class="h-100 w-100 d-flex flex-row">
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>
