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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" id="shape-left" style="font-family: Rockwell;">
<div class="wrapper">
	<?php //include 'topbar.php';?>
	<?php //include 'sidebar.php';?>
	<div class="row">
	<h1 class="col-2 text-center" >[SIDE <br>NAV<br> HERE]</h1>
	<h1 class="text-center col-10">[TOP NAVIGATION HERE]</h1>
	</div>
	<div class="content-wrapper">
		<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-body text-white">
			</div>
		</div>
		<div class="toast-top-right fixed" id="toastContainerTopRight"></div>
		
		<div class="content-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<h1 class="m-0 mb-5"><?php echo $title ?></h1>
					</div>
				</div>
				<h1 class="text-center mt-5 pt-5">[DASHBOARD HERE]</h1>
				<h1 class="text-center mt-5 pt-5">[DASHBOARD HERE]</h1>
				<h1 class="text-center mt-5 pt-5">[DASHBOARD HERE]</h1>
					
			</div>
		</div>
	</div>
	
</div>


</body>
<div class=""></div>