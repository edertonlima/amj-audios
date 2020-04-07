
	<footer class="footer"> 
		<div class="container">
			<div class="row">
				<div class="col-3">a</div>

				<div class="col-9">
					<div class="list-txt">
						<span class="copy">
							<!--©<?php echo '' . ' ' . date('Y'); ?> Copyright.-->
							© <?php echo date('Y') . ', áudios motivacionais.'; ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<button id="goTop" class="button go-item" rel="body">
		<span></span>
		<span></span>
	</button>

	<div id="alertinfo">Desulpe, não foi possível excluir o áudio.</div>

	<?php wp_footer(); ?>

	<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>-->
	<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>-->
	<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

	<script type="text/javascript">
		padding = jQuery('.header').height() + 20;
		audios = jQuery('.audios').height() - padding - 4;

		jQuery(window).scroll(function(){
			if (jQuery(this).scrollTop() > padding){

				if(jQuery(this).scrollTop() < audios){
					jQuery(".container-sidebar").css('top',(jQuery(this).scrollTop()) - padding);
				}else{

				}
				
			}else{
				jQuery(".container-sidebar").css('top',0);
			}
		});
	</script>


	<!-- include summernote css/js -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/summernote/summernote.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {

			$('.editor').summernote({
				placeholder: 'Digite aqui o seu texto...',
				tabsize: 2,
				height: 150,
				toolbar: [
					//['style', ['style']],
					['font', ['bold', 'italic', 'underline']],
					//['color', ['color']],
					//['para', ['ul', 'ol', 'paragraph']],
					//['table', ['table']],
					//['insert', ['link', 'picture', 'video']],
					//['view', ['fullscreen', 'codeview', 'help']]
				]
			});

		});

		function alertinfo($msg,$class){

			$('#alertinfo').html('').removeClass('on erro ok');
			$('#alertinfo').html($msg).addClass('on '+$class);

			setTimeout(function(){ 
				$('#alertinfo').html('').removeClass('on '+$class);
			}, 3000);
		};
		
	</script>

</body>
</html>