<?php get_header(); ?>

<section class="box-content"> 
	<div class="container">

		<div class="row">

			<div class="col-9">
				<div class="audios">

					<article class="audio item-det">
						<i class="fas fa-microphone-alt cor1"></i>
						<h1>
							<?php
								if($url[1] == 'use-a-merda-como-adubo'){
									echo 'Use a merda como adubo!';
								}

								if($url[1] == 'ajudar-enriquece-mais'){
									echo 'Ajudar, enriquece mais';
								}

								if($url[1] == 'alface-com-talo'){
									echo 'Alface com talo';
								}

								if($url[1] == 'qual-e-o-seu-sonho'){
									echo 'Qual e o seu sonho?';
								}
							?>
						</h1>
						<div class="data">30 de Março, 2020</div>

						<iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/671913383&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit ullam vitae libero in elit cursus tempus consectetur adipiscing elit ullam vitae libero in elit cursus tempus.</p>

						<div class="assuntos">
							<i class="fas fa-circle"></i>
							<a href="">cura</a>
							<a href="">auto ajuda</a>
						</div>

						<div class="compartilhar">
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

						<div class="col-6">		
							<article class="audio item-det">
								<i class="fas fa-microphone-alt cor1"></i>
								<a href="<?php echo get_home_url(); ?>/auto-ajuda/qual-e-o-seu-sonho">
									<h2>Qual é o seu sonho?</h2>
								</a>
								<div class="data">30 de Março, 2020</div>

								<div class="cont-list">
									<div class="assuntos">
										<i class="fas fa-circle"></i>
										<a href="">cura</a>
										<a href="">autoajuda</a>
									</div>
								</div>
							</article>
						</div>

						<div class="col-6">
							<article class="audio item-det">
								<i class="fas fa-microphone-alt cor1"></i>
								<a href="<?php echo get_home_url(); ?>/auto-ajuda/alface-com-talo">
									<h2>Alface com talo</h2>
								</a>
								<div class="data">30 de Março, 2020</div>

								<div class="cont-list">
									<div class="assuntos">
										<i class="fas fa-circle"></i>
										<a href="">cura</a>
										<a href="">autoajuda</a>
									</div>
								</div>
							</article>
						</div>
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