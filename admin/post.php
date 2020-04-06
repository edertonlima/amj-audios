<?php

	include 'config/config.php';
	include 'config/function.php';
	include 'config/head.php';

?>

<?php get_header(); ?>

<section class="box-content admin"> 
	<div class="container">

		<div class="row">

			<div class="col-3 sidebar">
				<div class="container-sidebar">
					<div class="box-sidebar bg-cor1">
						
						<?php include 'include/menu.php'; ?>

					</div>
				</div>
			</div>

			<div class="col-9">
				<div class="content-admin">

					<h1>Áudios</h1>
					
					<div class="table">
						<div class="item-table tit-table">
							<span>Título</span>
							<span class="assunto">Assunto</span>
							<span class="data">Data</span>
						</div>

<?php for ($i=0; $i < 10; $i++) { ?>
	
						<div class="item-table">
							<span>
								<a href="post-edit.php?post=1">Ajudar, enriquece mais!</a>
							</span>
							<span class="assunto">cura, auto ajuda</span>
							<span class="data">30/03/2020</span>
						</div>

<?php } ?>						
					</div>
				</div>
			</div>

		</div>

	</div>
</section>


<?php get_footer(); ?>