<?php
	include 'sql/function.php';
	//global $slug;
?>

<?php get_header(); ?>

<?php 

	$query = "SELECT * FROM `audio` WHERE `slug` LIKE '{$slug}'";
	$posts = get_post($query);
	//var_dump($posts);

	if($posts){
		foreach ($posts as $row => $post) { 
			?>

			<section class="box-content"> 
				<div class="container">

					<div class="row">

						<div class="col-9">
							<div class="audios">

								<article class="audio item-det">
									<i class="fas fa-microphone-alt cor1"></i>
									<h1><?php echo $post->titulo; ?></h1>
									<div class="data"><?php the_data($post->data); ?></div>
		
		<?php
			$url = $post->url;

			$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
			$decodeiFrame=substr($getValues, 1, -2);
			$jsonObj = json_decode($decodeiFrame);

			echo str_replace('height="400"', 'height="166"', $jsonObj->html);
		?>

									<?php echo $post->texto; ?>

									<div class="assuntos">
										<i class="fas fa-circle"></i>
											<?php 
												$assuntos = get_assunto($post->id);
												//var_dump($assuntos);

												foreach ($assuntos as $key => $value) { //var_dump($value); ?>
													<a href="<?php the_link_assunto($value->slug); ?>">
														<?php echo $value->titulo; ?>
													</a>
												<?php }
											?>
									</div>

									<div class="compartilhar" style="display: none;">
										<span>compartilhar: </span>
										<a href=""><i class="fab fa-facebook-f"></i></a>
										<a href=""><i class="fab fa-twitter"></i></a>
										<a href=""><i class="fab fa-whatsapp"></i></a>
									</div>

								</article>

							</div>

							<div class="row">
								<div class="ultimos-audios">

									<div class="col-12">
										<h3>Últimos Áudios</h3>	
									</div>


									<?php
										$query = "SELECT * FROM `audio` WHERE `slug` NOT LIKE '{$slug}' ORDER BY 'data' DESC LIMIT 2";
										$posts = get_post($query);
										//var_dump($posts);

										foreach ($posts as $row => $post) { ?>

											<div class="col-6">		
												<article class="audio item-det">
													<i class="fas fa-microphone-alt cor1"></i>
													<a href="<?php the_link($post->id,$post->slug); ?>">
														<h2><?php echo $post->titulo; ?></h2>
													</a>
													<div class="data"><?php the_data($post->data); ?></div>

													<div class="cont-list">
														<div class="assuntos">
															<i class="fas fa-circle"></i>
															<?php 
																$assuntos = get_assunto($post->id);
																//var_dump($assuntos);

																foreach ($assuntos as $key => $value) { //var_dump($value); ?>
																	<a href="<?php the_link_assunto($value->slug); ?>">
																		<?php echo $value->titulo; ?>
																	</a>
																<?php }
															?>
														</div>
													</div>
												</article>
											</div>

										<?php }
									?>


								</div>
							</div>
						</div>

						<div class="col-3 sidebar">
							<div class="container-sidebar scroll">

								<?php /*
								<div class="box-sidebar bg-branco">
									<form class="form-busca">
										<fieldset>
											<input type="text" name="" placeholder="O que você está procurando?">
											<button><i class="fas fa-search"></i></button>
										</fieldset>
									</form>
								</div>
								*/ ?>

								<div class="box-sidebar bg-branco">
									<h3>Assuntos</h3>

									<div class="assuntos">
										<?php 
											$assuntos = get_assunto();
											//var_dump($assuntos);

											foreach ($assuntos as $key => $value) { //var_dump($value); ?>
												<a href="<?php the_link_assunto($value->slug); ?>">
													<?php echo $value->titulo; ?>
												</a>
											<?php }
										?>
									</div>
								</div>

								<div class="box-sidebar bg-cor1">
									<h3>Deseja pedir um áudio motivacional?</h3>
									<button class="button branco ico-right margin-top-20">Solicitar <i class="fas fa-chevron-right"></i></button>
								</div>
							</div>
						</div>

					</div>

				</div>
			</section>

		<?php }
	}else{

		$page = 'https://'. get_home_url();
		header("Location: {$page}"); 

	}
?>


<?php get_footer(); ?>