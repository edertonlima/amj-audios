
	<footer class="footer">
		<div class="container">

				<div class="col-9">
					<div class="list-txt">
						<span class="copy center">
							<h3 class="center">Altivo Martins Júnior</h3>
							<a href="mailto:audiosmotivacionais@gmail.com" title="audiosmotivacionais@gmail.com" target="_blank">audiosmotivacionais@gmail.com</a>
							
							<span class="whatsapp">
								<a href="https://api.whatsapp.com/send?phone=5514991024041&text=Ol%C3%A1%2C%20tudo%20bem%3F%20Gostaria%20de%20falar%20com%20voc%C3%AA!%20" class="tel" title="Iniciar conversa" target="_blank">
									<i class="fab fa-whatsapp"></i>
									14 99102 4041
								</a>
							</span>
						</span>
					</div>
				</div>

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

	<section class="box-section no-padding" id="solicitacao">
		<div class="container">

			<h2 class="titulo-form">Deseja solicitar um áudio motivacional?</h2>
			<form action="javascript:">
				
				<div class="row">
					<div class="scrollbar scrollbar-dynamic">
					<div class="col-12">
						<p>
							Preencha com os seus dados e, assim que o áudio for criado (criamos aos sábados), receberá um e-mail e o link do áudio, para ouvir e/ou baixar.
							<br>
							<strong>O áudio é grátis!</strong>
						</p>
					</div>

					<fieldset class="col-12 margin-top clear">
						<input type="text" name="nome" id="nome" placeholder="*Nome">
					</fieldset>

					<fieldset class="col-12 clear">
						<input type="text" name="telefone" id="telefone" class="telefone" placeholder="*Telefone">
					</fieldset>

					<fieldset class="col-12 clear">
						<input type="text" name="email" id="email" placeholder="*E-mail">
					</fieldset>

					<fieldset class="col-12 clear">
						<textarea name="mensagem" id="mensagem" placeholder="Sobre o quê é o áudio?"></textarea>
						<p class="legenda"><strong>Exemplo: ser corajoso, ser curado de ..., focar em ...</strong><br>No assunto do áudio, você precisa ser o mais claro(a), objetivo(a) e positivo(a) possível no que “quer”.</p>
						<p class="msg-form"></p>
					</fieldset>

					<fieldset class="col-12">
						<button type="button" class="mini transparente enviar">enviar solicitação</button>
					</fieldset>
					</div>
				</div>

			</form>

		</div>
	</section>

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

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
	<script type="text/javascript">
		jQuery("#telefone").mask("(99) 9999-9999?9");
	</script>

	<script type="text/javascript">

		jQuery(".enviar").click(function(){			
			jQuery('.enviar').html('enviando...').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var mensagem = jQuery('#mensagem').val();

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(telefone == ''){
				jQuery('#telefone').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').addClass('erro');
			}

			if((nome == '') || (email == '') || (telefone == '') || (mensagem == '')){
				jQuery('.msg-form').html('Todos os campos são obrigatórios.').addClass('erro');

				jQuery('.enviar').html('enviar solicitação').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem }, function(result){		
					if(result=='ok'){
						resultado = 'Sua solicitação foi enviada com sucesso!';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('enviar solicitação').prop( "disabled", false );

					setTimeout(function() {
						$.fancybox.close();
					}, 2000)
						
				});
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