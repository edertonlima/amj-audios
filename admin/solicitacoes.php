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
						<div class="col-6"><h1>Solicitações</h1></div>
						<?php /*<div class="col-6 right">
							<a href="post-new.php" class="button cor1 ico-left"><i class="fas fa-plus"></i>Novo</a>
						</div>*/ ?>
					</div>

					
					<div class="table">
						<div class="item-table tit-table">
							<span class="check"><i class="far fa-check-square"></i></span>
							<span>Assunto</span>
							<span class="dados-user">Solicitante</span>
							<span class="data">Data</span>
						</div>

						<?php 
							$query = "SELECT * FROM `solicitacoes` ORDER BY `status` DESC, `data` ASC";
							$posts = get_post($query);
							//var_dump($posts);

							foreach ($posts as $row => $post) { 
								if($post->status){
									$classOff = '';
									$classCheck = 'far fa-square';
								}else{
									$classOff = 'off';
									$classCheck = 'fas fa-check-square';
								} ?>

								<div class="item-table <?php echo $classOff; ?>" id="post_<?php echo $post->id; ?>">
									<span class="check">
										<a href="javascript:" title="" data-id="<?php echo $post->id; ?>" class="check-row <?php echo $classOff; ?>">
											<i class="<?php echo $classCheck; ?>"></i>
										</a>
									</span>
									<span class="box-titulo">
										<span class="titulo">
											<?php echo $post->assunto; ?> 
										</span>

										<div class="links links-small">
											<a href="javascript:" title="excluir" class="excluir" data-id="<?php echo $post->id; ?>">excluir</a>
										</div>
									</span>
									<span class="dados-user">
										<span><strong><?php echo $post->nome; ?></strong></span>
										<span><?php echo $post->telefone; ?></span>
										<span><?php echo $post->email; ?></span>	
									</span>
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
					action:'excluir_solicitacao'						
				},

				success: function(result){
					if(result == 'ok'){

						alertinfo('Solicitação excluída com sucesso!','ok');
						$('#post_'+post_id).remove();

					}else{
						alertinfo(result,'erro');
					}
				}
			});
    	});

    	// check-row
    	$('.check-row').click(function(){
    		post_id = $(this).attr('data-id');

    		if($(this).hasClass('off')){
    			$(this).removeClass('off');
    			$(this).parents('.item-table').removeClass('off');
    			$('i',this).removeClass('fas fa-check-square').addClass('far fa-square');

				$.ajax({
					type: 'POST',
					url: 'sql/function.php',
					data: {
						id:post_id,
						status:status,
						action:'check_row_true'						
					},

					success: function(result){
						if(result == 'ok'){

							alertinfo('Solicitação alterada com sucesso!','ok');
							//$('#post_'+post_id).remove();

						}else{
							alertinfo(result,'erro');
						}
					}
				});

    		}else{
    			$(this).addClass('off');
    			$(this).parents('.item-table').addClass('off');
    			$('i',this).removeClass('far fa-square').addClass('fas fa-check-square');

				$.ajax({
					type: 'POST',
					url: 'sql/function.php',
					data: {
						id:post_id,
						status:status,
						action:'check_row_false'						
					},

					success: function(result){
						if(result == 'ok'){

							alertinfo('Solicitação alterada com sucesso!','ok');
							//$('#post_'+post_id).remove();

						}else{
							alertinfo(result,'erro');
						}
					}
				});
    		}
    	});

    });
</script>