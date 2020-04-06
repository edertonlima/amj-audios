<?php
	include 'config/config.php';
	include 'config/function.php';
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
					
					<form action="">
						<div class="header-admin">
							<div class="col-6">
								<button type="button" class="button cor1 inline off-cor ico-left"><i class="far fa-copy"></i>Duplicar</button>
							</div>
							<div class="col-6">
								<button type="button" class="button vermelho inline off-cor ico-left"><i class="far fa-trash-alt"></i>Excluir</button>
								<button type="button" class="button cor1">Publicar</button>
							</div>
						</div>
						
						<div class="body-admin">

							<fieldset class="data">
								<label for="">Data de publicação:</label>
								<div class="input-ico left">
									<i class="far fa-calendar-alt"></i>
									<input type="text" name="data" class="datepicker" value="03/04/2020">
								</div>
							</fieldset>

							<fieldset class="tit-form">
								<input type="text" name="titulo" class="" value="Ajudar, enriquece mais!" placeholder="Adicionar um título">
							</fieldset>

							<fieldset>
								<label for="">Tags de assuntos:</label>
								<input type="text" class="tag-assunto" value="" data-role="tagsinput" />
							</fieldset>

							<fieldset class="textarea">
								<textarea class="editor" name="editordata"></textarea>
							</fieldset>

							<fieldset>
								<label for="">Url do áudio soundcloud:</label>
								<div class="input-ico left">
									<i class="fas fa-link"></i>
									<input type="text" name="titulo" class="url-embed" placeholder="https://soundcloud..." >
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
	$(document).ready(function(){
		$('.url-embed').change(function(){
			url = $(this).val();

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
		});
	});

</script>