<?php

	include 'config/config.php';
	include 'config/function.php';
	include 'config/head.php';

	include 'sql/function.php';

	if(isset($_GET['post'])){
		if(!empty($_GET['post'])){
			$query = "SELECT * FROM `audio` WHERE `id` = {$_GET['post']} ";
			$post = get_post($query)[0];
		}
	}
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
					
					<form action="post_update.php" method="post" id="publicar">
						<div class="header-admin">
							<div class="col-6">
								<?php /*<a href="post-new.php?post=<?php echo $post->id; ?>" type="button" class="button cor1 inline off-cor ico-left"><i class="far fa-copy"></i>Duplicar</a> */ ?>
							</div>
							<div class="col-6">
								<?php /*<button type="button" class="excluir button vermelho inline off-cor ico-left"><i class="far fa-trash-alt"></i>Excluir</button> */ ?>
								<button type="submit" class="button cor1">Publicar</button>
								<input type="hidden" name="id" value="">
							</div>
						</div>
						
						<div class="body-admin">

							<fieldset class="data">
								<label for="">Data de publicação:</label>
								<div class="input-ico left">
									<i class="far fa-calendar-alt"></i>
									<input type="text" name="data" class="datepicker" value="<?php echo date('d/m/Y'); ?>">
								</div>
							</fieldset>

							<fieldset class="tit-form">
								<input type="text" name="titulo" class="" value="<?php echo $post->titulo; ?>" placeholder="Adicionar um título">
							</fieldset>

							<fieldset class="tags-box">
								<label for="">Tags de assuntos:</label>
								<input type="text" name="assunto" class="tag-assunto" value="<?php if($post->id){ echo get_assunto($post->id); } ?>" data-role="tagsinput" />
								<div class="preview-assuntos"></div>
							</fieldset>

							<fieldset class="textarea">
								<textarea class="editor" name="editordata"><?php if($post->id){ echo $post->texto; } ?></textarea>
							</fieldset>

							<fieldset>
								<label for="">Url do áudio soundcloud:</label>
								<div class="input-ico left">
									<i class="fas fa-link"></i>
									<input type="text" name="url" class="url-embed" placeholder="https://soundcloud..." value="<?php //echo $post->url; ?>">
								</div>
							</fieldset>

							<fieldset class="preview-embed"></fieldset>
						</div>
					</form>
					
				</div>
			</div>

		</div>

	</div>
</section>


<?php get_footer(); ?>


<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/tagsinput/bootstrap-tagsinput.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">

	//trimValue: true,
	/*
	typeahead: {
		source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
	}
	*/
	

	$('.tag-assunto').tagsinput({
		trimValue: true
	});

	//$('.bootstrap-tagsinput input').keypress(function(){
	/*$('.bootstrap-tagsinput input').bind("keyup change", function(e) {
		$('.preview-assuntos').html('<span>'+$('.bootstrap-tagsinput input').val()+'</span>');
	});*/

	/*$('.preview-assuntos span').click(function(){
		tag = $(this).html();
		$('.tag-assunto').tagsinput('add', tag);
		$('.bootstrap-tagsinput input').attr('value','');

		$('.preview-assuntos').html();
	});*/

</script>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/datepicker/locales/bootstrap-datepicker.pt-BR.js"></script>
<script type="text/javascript">

	$('.datepicker').datepicker({
	    format: 'dd/mm/yyyy',
	    language: 'pt-BR'
	});

</script>


<script type="text/javascript">

	function url_embed(){
		url = $('.url-embed').val();

		if(url.length > 22){

			$('.preview-embed').html('<i class="fas cor1 fa-circle-notch fa-spin"></i>');
			$.ajax({
				url: 'ajax/embed_soundcloud.php',
				type: 'POST',
				data: {
					'url': url
				},
				success: function( response ){

					if(response == ''){
						$('.preview-embed').html('<p class"center">Url inválida.</p>');
					}else{
						$('.preview-embed').html(response);
					}
					
				},
				
				error: function(){
					alert('erro');
				}
			});

		}else{
			$('.preview-embed').html('<p class"center">Url inválida.</p>');
		}
	} 

	$(document).ready(function(){
		url_embed();

		$('.url-embed').change(function(){
			url_embed();
		});

	});

	$('#publicar').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});

</script>