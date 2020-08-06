<?php 

include_once('../db/db-conection.php');

$user="Administrador";
$pass="39489979";

if($_POST){
	if($_POST["user"]==$user && $_POST["pass"]==$pass){
		session_start();
		$_SESSION["nombre"]=$user;
		header('Location: administrador1.php');
	}
	else {
		$error="Usuario o contraseña incorrectos";
	}
}


?>

<!DOCTYPE html>
<html>
    
<head>
	<title>Administracion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
    <br>
    <h2 style="text-align:center;">ADMINISTRACION</h2>
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
            <br>
            <br>
            <img src="../img/urquizalogo.jpg" style="display:block; margin: 0 auto; width: 250px; margin-bottom: 35px;">
			<br>
		
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="user" class="form-control input_user" value="" placeholder="username" style="width: 550px; height:75px;">
						</div>
                        <br>
                         
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control input_pass" value="" placeholder="password" style="width: 550px; height:75px;">
						</div>

                        <br>
                         
						

                        <br>
                         <br>
							<div class="d-flex justify-content-center mt-3 login_container">
                            
				 	<button type="submit" name="button" class="btn login_btn" style="width:200px; height:50px; font-size:20px;">Iniciar Sesión</button>
				   </div>
					</form>
					
				</div>
		
			</div>
		</div>
		<?php if (isset ($error)): ?>
			<br><h4 style="text-align: center; color:red;"><?php echo $error;?></h4>
			<?php endif; ?>
	</div>
</body>
</html>
