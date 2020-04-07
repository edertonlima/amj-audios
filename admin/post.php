<?php

	include 'config/config.php';
	include 'config/function.php';
	include 'config/head.php';

	include 'sql/function.php';
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
					
					<div class="header-admin">
						<div class="col-6"><h1>Áudios</h1></div>
						<div class="col-6 right">
							<a href="post-new.php" class="button cor1 ico-left"><i class="fas fa-plus"></i>Novo</a>
						</div>
					</div>

					
					<div class="table">
						<div class="item-table tit-table">
							<span>Título</span>
							<span class="assunto">Assunto</span>
							<span class="data">Data</span>
						</div>

						<?php 
							$query = "SELECT * FROM `audio` ORDER BY `data` DESC";
							$posts = get_post($query);
							//var_dump($posts);

							foreach ($posts as $row => $post) { 
								?>

								<div class="item-table" id="post_<?php echo $post->id; ?>">
									<span class="box-titulo">
										<a href="post-edit.php?post=<?php echo $post->id; ?>" class="titulo">
											<?php echo $post->titulo; ?> 
										</a>

										<div class="links">
											<a href="post-edit.php?post=<?php echo $post->id; ?>" title="editar">editar</a>
											<a href="post-new.php?post=<?php echo $post->id; ?>" title="duplicar">duplicar</a>
											<a href="javascript:" title="excluir" class="excluir" data-id="<?php echo $post->id; ?>">excluir</a>
										</div>
									</span>
									<span class="assunto"><?php the_assunto($post->id); ?></span>
									<span class="data"><?php the_data($post->data); ?></span>
								</div>

							<?php }
 						?>
	

					
					</div>
				</div>
			</div>

		</div>

	</div>
</section>


<?php get_footer(); ?>


<script type="text/javascript">
	$(document).ready(function() {

		// excluir assunto
		$('.excluir').click(function(){
			post_id = $(this).attr('data-id');

			$.ajax({
				type: 'POST',
				url: 'sql/function.php',
				data: {
					id:post_id,
					action:'excluir_post'						
				},

				success: function(result){
					if(result == 'ok'){

						alertinfo('Áudio excluído com sucesso!','ok');
						$('#post_'+post_id).remove();

					}else{
						alertinfo(result,'erro');
					}
				}
			});
    	});

    });
</script>