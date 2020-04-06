<?php

	$page = 'login';
	include 'sql/function.php';
	include 'config/config.php';
	include 'config/function.php';

	if($_SESSION['login']){
		//echo "<script>alert('login atio');</script>";
		$page = 'post';
		header("Location: {$page}.php"); 
		exit;
	}
	
	if( (!empty($_POST["email"])) and (!empty($_POST["senha"])) ){
		
		//echo "<script>alert('existe email e senha');</script>";
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		if(get_login($email,$senha)){
			$page = 'post';
			header("Location: {$page}.php"); 
		}
	}
?>

<?php get_header(); ?>

<section class="box-content admin"> 
	<div class="container">

		<div class="login">
				<div class="content-admin">

					<h1>Login</h1>
					<form action="" method="post">					
						<div class="body-admin">

							<fieldset>
								<input type="text" name="email" class="" value="" placeholder="E-mail">
							</fieldset>

							<fieldset>
								<input type="password" name="senha" class="" value="" placeholder="Senha">
							</fieldset>

							<fieldset>
								<p class="form-msg">
									<?php if( !empty($_SESSION['login-msg']) ){
										echo $_SESSION['login-msg'];
									} ?>
								</p>
								<button type="submit" class="button cor1">Publicar</button>
							</fieldset>

						</div>
					</form>

				</div>

		</div>

	</div>
</section>


<?php get_footer(); ?>

<script type="text/javascript">



</script>