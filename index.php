<?php session_start() ?>
<?php 
if(!isset($_SESSION['login_id']))
    header('location:login.php');
    include 'db_connect.php';
    ob_start();
    if(!isset($_SESSION['system'])){
        
        $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
        foreach($system as $k => $v){
            $_SESSION['system'][$k] = $v;
        }
    }
    ob_end_flush();

include 'header.php' 
?>
<body>
<?php include 'topbar.php' ?>
<?php include 'sidebar.php' ?>
</body>