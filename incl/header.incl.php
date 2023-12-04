<?php
include_once __DIR__.'/config.incl.php';
$current_user = array();

function Page_Url() {
    echo PAGE_URL;
}

if (file_exists('auth/auth.php')) {
    include 'auth/auth.php';
} elseif (file_exists('../auth/auth.php')) {
    include '../auth/auth.php';
} elseif (file_exists('../../auth/auth.php')) {
    include '../../auth/auth.php';
}
$log = new logmein();
$log->encrypt = true;
if (!isset($_SESSION['loggedin']) || !$log->logincheck($_SESSION['loggedin'], "employees", "e_pass", "e_mail")) {
    $log->loginform("login", "loginform", PAGE_URL . "auth/login.php");
    exit();
} else {
    $current_user['email'] = $_SESSION['username'];
    $current_user['name'] = $_SESSION['full_name'];
    $current_user['role'] = $_SESSION['userlevel'];
    list($singlename) = explode(' ', $current_user['name'], 3);
}
?> 
<!DOCTYPE HTML> 
<html style="background: linear-gradient(90deg, #FFE000, #799F0C);"> 
    <head> 
        <meta charset="utf-8"/> 
        <!-- for faster page loads these should be on the footer, but careful on having jQuery code in your pages if you do -->         
        <script type="text/javascript" src="<?php Page_Url() ?>js/jquery-1.8.2.js"></script>         
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap.js"></script>         
        <script type="text/javascript" src="<?php Page_Url() ?>js/bootstrap-datetimepicker.min.js"></script>         
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap.css"/> 
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap-responsive.css"/> 
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/main.css"/> 
        <link type="text/css" rel="stylesheet" href="<?php Page_Url() ?>css/bootstrap-datetimepicker.min.css"/> 
        <title>Dairy Record Manager</title>         
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oxygen&display=swap">
    </head>     
    <body> 
        <!--    The top of the page visible on all pages in the system-->         
        <div id="top" class="page-header" style="background: -webkit-radial-gradient(center bottom, rgb(20, 136, 204) 0%, rgb(43, 50, 178) 100%);"> 
            <div id="user" class='pull-right'> 
                <?php echo "Welcome $singlename [" . $current_user['role'] . "]" ?> 
                <a class="" href="auth/logout.php" style="color: #f7f4f4;">logout</a> 
            </div>             
            <!--top logo-->             
            <a href="<?php Page_Url(); ?>"><img src="<?php Page_Url() ?>img/image.png" alt="logo" width="140" height="100" id="logo" style="position: sticky;"></a> 
            <div id="navigation" class="navbar pull-right"> 
                <center>
                    <h1 id="title" style="font-family: 'Alegreya SC', serif; color: #ffffff; font-style: normal; font-variant: small-caps;">Dairy&nbsp; Management System</h1> 
                </center>                 
                <ul class="nav navbar-inner" style="background: -webkit-repeating-radial-gradient(center bottom, rgb(236, 233, 230) 0%, rgb(255, 255, 255) 100%); color: #f2e7e7; font-family: 'Montserrat', sans-serif; background-image: url('../img/hd-dripping-milk-cream-white-liquid-png-31625513402qwcgcmosyr.png'); background-repeat: no-repeat; background-position: initial; background-size: cover;"> 
                    <li style="font-family: 'Merriweather', serif; color: #0a0909; font-variant: small-caps;"> 
                        <a href="<?php Page_Url() ?>" style="color: #f50909; text-transform: uppercase;"><strong style="color: #000000; font-family: 'Lato', sans-serif;">Home</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>farmers/index.php" style="font-family: 'Merriweather', serif; color: #f50909; font-variant: small-caps; text-transform: uppercase;"><strong style="color: #0a0404; font-family: 'Lato', sans-serif;">Farmers</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>employees/index.php" style="font-family: 'Merriweather', serif; font-variant: small-caps;color: #f50909; text-transform: uppercase;"><strong style="color: #000000; font-family: 'Lato', sans-serif;">Employees</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>delivery/index.php" style="font-family: 'Merriweather', serif;color: #f50909; font-variant: small-caps; text-transform: uppercase;"><strong style="color: #0a0505; font-family: 'Lato', sans-serif;">Deliveries</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>payment/index.php" style="font-family: 'Merriweather', serif; font-variant: small-caps;color: #f50909; text-transform: uppercase;"><strong style="color: #130909; font-family: 'Lato', sans-serif;">Payments</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>reports/index.php" style="font-variant: small-caps; color: #f50909; font-family: 'Merriweather', serif; text-transform: uppercase;"><strong style="color: #110505; font-family: 'Lato', sans-serif;">Reports</strong></a> 
                    </li>                     
                    <li> 
                        <a href="<?php Page_Url() ?>settings/index.php" style="font-family: 'Merriweather', serif; color: #f50909; font-variant: small-caps; text-transform: uppercase;"><strong style="color: #000000; font-family: 'Lato', sans-serif;">Settings</strong></a> 
                    </li>                     
                </ul>                 
            </div>             
            <!--end navigation-->             
        </div>         
        <!--beginning of the pages' body-->         
        <div id="main-content" class="modal-body">
