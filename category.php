<?php
	include 'sql/function.php';
?>

<?php get_header(); ?>

<section class="box-content"> 
	<div class="container">

		<div class="row">

			<div class="col-9">
				<h1><?php the_title_assunto_slug($slug); ?></h1>

				<div class="audios">

					<?php 
						$query = "SELECT `audio`.`id`, `audio`.`titulo`, `audio`.`texto`, `audio`.`data`, `audio`.`slug` FROM `audio` 
						INNER JOIN `audio_assunto` 
							ON `audio_assunto`.`audio` = `audio`.`id` 

						INNER JOIN `assunto` 
							ON `assunto`.`id` = `audio_assunto`.`assunto` 

						WHERE `assunto`.`slug` = '{$slug}' 
						ORDER BY `audio`.`data` DESC";
						
						//$query = "SELECT * FROM `audio` ORDER BY `data` DESC LIMIT 5";
						$posts = get_post($query);
						//var_dump($posts);

						if($posts){
							foreach ($posts as $row => $post) { ?>

								<article class="audio item-list">
									<div class="data"><?php the_data($post->data); ?></div>
									<i class="fas fa-microphone-alt cor1"></i>
									<a href="<?php the_link($post->id,$post->slug); ?>" title="<?php echo $post->titulo; ?> ">
										<h2><?php echo $post->titulo; ?></h2>
									</a>

									<div class="cont-list">
										<a href="<?php the_link($post->id,$post->slug); ?>">
											<p><?php the_resumo($post->texto); ?> </p>
										</a>
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
										<a href="<?php the_link($post->id,$post->slug); ?>" class="button ico-right cor1 transparent">ouvir áudio <i class="fas fa-chevron-right"></i></a>
									</div>
								</article>

							<?php }
						}else{ ?>

								<article class="audio item-list">
									<div class="cont-list">
										<p>Nenhum áudio encontrado.</p>

									</div>
								</article>

						<? }
					?>

				</div>

				<button class="button mais grande cor1" style="display: none;">mais</button>				
			</div>

			<div class="col-3 sidebar">
				<div class="container-sidebar scroll">
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


<?php get_footer(); ?>


<script type="text/javascript">
	new_item = '<article class="audio item-list"><i class="fas fa-microphone-alt cor1"></i><a href="<?php echo get_home_url(); ?>/auto-ajuda/use-a-merda-como-adubo"><h2>Use a merda como adubo!</h2></a><div class="data">30 de Março, 2020</div><div class="cont-list"><a href="<?php echo get_home_url(); ?>/auto-ajuda/use-a-merda-como-adubo"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p></a><div class="assuntos"><i class="fas fa-circle"></i><a href="">cura</a> <a href="">autoajuda</a></div><a href="<?php echo get_home_url(); ?>/auto-ajuda/use-a-merda-como-adubo" class="button ico-right cor1 transparent">ouvir áudio <i class="fas fa-chevron-right"></i></a></div></article>';

	$('.mais').click(function(){
		$(this).html('<i class="fas fa-circle-notch cor3 fa-spin"></i> Mais');
		$('.audios').append(new_item);
		$(this).html('Mais').hide();
	});
	
</script>
<?php /*
<script type="text/javascript">
	$('#slide-home').on('slide.bs.carousel', function (e) {
		$('.text-item').removeClass('active');
	});

	$('#slide-home').on('slid.bs.carousel', function (e) {
		$('#txt-'+e.to).addClass('active');
	});
</script>

<?php if(!$GLOBALS['mobile']){ ?>
		<!-- CAROUSEL -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

	<script type="text/javascript">
		$('.carousel-itens').owlCarousel({
			loop:false,
			margin:30,
			responsiveClass:true,
			nav:true,
			navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			//rtl:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
		})

		var qtddot = $('.owl-dots').children().length;
		qtddot = (((qtddot*22)/2)+10)+'px';
		$('.owl-prev').css('margin-right',qtddot);
		$('.owl-next').css('margin-left',qtddot);
	</script>
<?php } ?>
*/ ?>