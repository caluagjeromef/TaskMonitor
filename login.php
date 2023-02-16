<!DOCTYPE html>
<html>
<?php 
session_start();

include('./db_connect.php');
ob_start();

if (!isset($_SESSION['system'])) {
    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach ($system as $k => $v){
        $_SESSION['system'][$k] = $v;
        
    }
}
ob_end_flush();

?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=dashboard");
?>
<?php include 'header.php';?>
<body class="hold-transition login-page" style="background-image:url('/abpocTMS/assets/uploads/bg_login.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: Rockwell;">
<div class="login-box">
<div class="card py-3 px-2"  style="border-radius: 30px; background-color: rgba(223,238,243, 0.9);">
	<div class="login-logo">
		<a href="#" class="" style="line-height: 0;">
			<img class="my-1" src="/abpocTMS/assets/uploads/aclan.png" style="height: 75px; width: 75px;"><br>
			<b  style="color: #000000;"><?php echo $_SESSION['system']['name']?> Login </b>
		</a>
	</div>
	<hr>
	<div class="card-body my-3">
		<form action="" id="login-form">
			<div class="input-group mb-3">
				<input type="email" class="form-control" name="email" required placeholder="Email" autocomplete="off" style="border-right: none;"></input>
				<div class="input-group-append">
					<div class="input-group-text" style="background-color: white;">
						<span class="fas fa-envelope"></span>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" class="form-control" name="password" required placeholder="Password" style="border-right: none;"></input>
				<div class="input-group-append">
					<div class="input-group-text" style="background-color: white;">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="d-flex mt-2">
						<input class="mb-2 mr-1" type="checkbox" id="remember">
						<label for="remember" role="button">Remember Me</label>
					</div>
				</div>
				<div class="col-4">
					<button type="submit" class="btn btn-success btn-block">LOGIN</button>
				</div>
			</div>
			<div class="row">
				<div class="col-2">
					
				</div>
				<div class="col-8 mt-3 mb-0 px-3 text-center" style="line-height: 1;">
					<small>Not a member? <br>
					<strong>Contact your Admin</strong></small>
				</div>
			</div>
		</form>
	</div>
	<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

<script>
$(document).ready(function(){
	$('#login-form').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
			
	$.ajax({
		url:'ajax.php?action=login',
		method: 'POST',
		data:$(this).serialize(),
		errpr:err=>{
			console.log(err)
			end_load();
		},
		success:function(resp){
			if(resp == 1){
				location.href='index.php?page=dashboard';
			}else{
				$('#login-form').prepend('<div class="alert alert-danger text-center px-1 py-2">Invalid Username and/or Password</div>')
				end_load();
			}
		}
		})		
	})
})

</script>
<footer style="position: absolute;
        bottom: 0px;
        width: 100%;
        padding: 3px;
        color: #A9A9A9;
        opacity: 0.9;">
<strong>Copyright &copy; 2023 <a href="#">Ashir BPO Corporation</a>.</strong>
All rights reserved.
<div class="float-right d-none d-md-inline-block">
	<b><?php echo $_SESSION['system']['name']?></b>
</div>      
</footer>
<?php include 'footer.php'; ?>

</body>
</html>