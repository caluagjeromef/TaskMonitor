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

<body class="hold-transition login-page bg-image" style="background-image:url('/abpocTMS/assets/uploads/bg_login.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: Rockwell;">
<div class="login-box">
<div class="card py-3 px-2" style="border-radius:25px;">
	<div class="login-logo">
		<a href="#" class="">
			<img class="my-1" src="/abpocTMS/assets/uploads/aclan.png" style="height: 75px; width: 75px;"><br>
			<b><?php echo $_SESSION['system']['name']?><br> Login</b>
		</a>
	</div>
	<hr>
	<div class="card-body login-card-body my-3"  style="border-radius:25%;">
		<form action="" id="login-form">
			<div class="input-group mb-3">
				<input type="email" class="form-control" name="email" required placeholder="Email" autocomplete="off"></input>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-envelope"></span>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" class="form-control" name="password" required placeholder="Password"></input>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="icheck-success">
						<input type="checkbox" id="remember">
						<label for="remember">
							Remember Me
						</label>
					</div>
				</div>
				<div class="col-4">
					<button type="submit" class="btn btn-success btn-block">LOGIN</button>
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
				$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
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
        opacity: 0.8;">
<strong>Copyright &copy; 2023 <a href="#">Ashir BPO Corporation</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
	<b><?php echo $_SESSION['system']['name']?></b>
</div>      
</footer>
<?php include 'footer.php'; ?>

</body>
</html>