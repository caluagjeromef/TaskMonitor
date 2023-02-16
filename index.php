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

	<?php include 'sidebar.php';?>
	<?php //include 'topbar.php';?>
	
	
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
						<h1 class="m-0"><?php echo $title ?></h1>
					</div>
				</div>
				<hr class="border-primary">
					
			</div>
		</div>
		
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<?php 
				    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
				    if(!file_exists($page.".php")){
				        include '404.html';
				    }else{
				        include $page.'.php';
				    }
				?>
			</div>
		</section>
		
		<div class="modal fade" id="confirm_modal" role="dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmation</h5>
				</div>
				<div class="modal-body">
					<div id="delete_content"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="confirm" onclick="">Continue</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
		<div class="modal fade" id="uni_modal" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">title1</h5>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="submit" onclick="$('#uni_modal form').submit()">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="uni_modal_right" role="dialog">
			<div class="modal-dialog modal-full-height modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">title2</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span class="fa fa-arrow-right"></span>
						</button>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="viewer_modal" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<button  type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
					<img src="" alt="">
				</div>
			</div>
		</div>
		
	</div>
	
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Content here kung trip -->
	</aside>
	
	<!-- Footer -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2023 <a href="#">Ashir BPO Corporation</a>.</strong>
		All rights reserved.
		<div class="float-right d-none d-sm-inline-block">
			<b><?php echo $_SESSION['system']['name'] ?></b>
		</div>
	</footer>
	
</div>
<!-- EVERY required jQuery/Bootstrap -->
<?php include 'footer.php' ?>
</body>
