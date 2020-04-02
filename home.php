<?php get_header(); ?>

<section class="box-content"> 
	<div class="container">

		<div class="row">

			<div class="col-9">
				<form class="form-busca">
					<fieldset>
						<input type="text" name="" placeholder="O que você está procurando?">
						<button><i class="fas fa-search"></i></button>
					</fieldset>
				</form>

				<div class="audios">

					<article class="audio item-list">
						<i class="fas fa-microphone-alt cor1"></i>
						<a href="<?php echo get_home_url(); ?>/auto-ajuda/ajudar-enriquece-mais">
							<h2>Ajudar, enriquece mais!</h2>
						</a>
						<div class="data">30 de Março, 2020</div>

						<div class="cont-list">
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/ajudar-enriquece-mais">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>
							</a>
							<div class="assuntos">
								<i class="fas fa-circle"></i>
								<a href="">cura</a>
								<a href="">autoajuda</a>
							</div>
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/ajudar-enriquece-mais" class="button ico-right cor1 transparent">ouvir áudio <i class="fas fa-chevron-right"></i></a>
						</div>
					</article>

					<article class="audio item-list">
						<i class="fas fa-microphone-alt cor1"></i>
						<a href="<?php echo get_home_url(); ?>/auto-ajuda/alface-com-talo">
							<h2>Alface com talo</h2>
						</a>
						<div class="data">30 de Março, 2020</div>

						<div class="cont-list">
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/alface-com-talo">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>
							</a>
							<div class="assuntos">
								<i class="fas fa-circle"></i>
								<a href="">cura</a>
								<a href="">autoajuda</a>
							</div>
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/alface-com-talo" class="button ico-right cor1 transparent">ouvir áudio <i class="fas fa-chevron-right"></i></a>
						</div>
					</article>

					<article class="audio item-list">
						<i class="fas fa-microphone-alt cor1"></i>
						<a href="<?php echo get_home_url(); ?>/auto-ajuda/qual-e-o-seu-sonho">
							<h2>Qual é o seu sonho?</h2>
						</a>
						<div class="data">30 de Março, 2020</div>

						<div class="cont-list">
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/qual-e-o-seu-sonho">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>
							</a>
							<div class="assuntos">
								<i class="fas fa-circle"></i>
								<a href="">cura</a>
								<a href="">autoajuda</a>
							</div>
							<a href="<?php echo get_home_url(); ?>/auto-ajuda/qual-e-o-seu-sonho" class="button ico-right cor1 transparent">ouvir áudio <i class="fas fa-chevron-right"></i></a>
						</div>
					</article>

				</div>

				<button class="button mais grande cor1">mais</button>				
			</div>

			<div class="col-3 sidebar">
				<div class="container-sidebar">
					<div class="box-sidebar bg-branco">
						<h3>Assuntos</h3>

						<div class="assuntos">
							<a href="">cura</a>
							<a href="">autoajuda</a>
							<a href="">entretenimento</a>
							<a href="">financeiro</a>
							<a href="">felicidade</a>
							<a href="">cancer de fígado</a>
							<a href="">vida</a>
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