
	<footer class="footer">
		<div class="container">

				<div class="col-12">
					<div class="list-txt">
						<span class="copy">
							<!--©<?php echo '' . ' ' . date('Y'); ?> Copyright.-->
							© <?php echo date('Y') . ', áudios motivacionais.'; ?>
						</span>
					</div>
				</div>

		</div>
	</footer>

	<button id="goTop" class="button go-item" rel="body">
		<span></span>
		<span></span>
	</button>

	

	<?php wp_footer(); ?>

	<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>-->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

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

<?php /*
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

	<script type="text/javascript">
		
		function go_item() {
			if (jQuery(this).scrollTop() > 400){
				$('.go-item').addClass('on');
			}else{
				$('.go-item').removeClass('on');
			}
		}

		$(document).ready(function(){	

			widthWindow = jQuery(window).width();

			if(widthWindow < 421){
				$('.menu-mobile').click(function(){
					$('.submenu').removeClass('ativo');

					$(this).toggleClass('open');
					$('.nav-principal').toggleClass('open');
				});

				$('.btn-menu-mobile').click(function(){
					$(this).parent().toggleClass('ativo');
				});
			}

			go_item();
	
		});
		

		$('.go-item').click(function(){
			item = $(this).attr('rel');
			$('html,body').animate({
				scrollTop: $(item).offset().top-20
			}, 1000);
		});

		jQuery(window).scroll(function(){
			go_item();
		});

		jQuery(window).resize(function(){
			$('.menu-mobile').removeClass('open');
			$('.nav-principal').removeClass('open');
			$('.submenu').removeClass('ativo');
		});

	</script>
*/ ?>
</body>
</html>