jQuery(document).ready(function($) {

	$('.load-more').click(function(){ 

		$(this).html('<i class="fas fa-circle-notch cor3 fa-spin"></i> Mais');

		post_type = $(this).attr('var-post-type');
		paged = parseInt($(this).attr('var-paged'));

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				'action': 'load_more' // Ação do Ajax
				//'post-type': post_type,
				//'paged': paged
			},
			success: function( response ){
				max_paged = response.split('max_paged').pop();
				loopHTML  = response.split('max_paged').shift();

				if(paged == max_paged){
					$('.load-more').hide();
				}else{

					paged = paged + 1;
					$('.load-more').attr('var-paged' , paged);
					$('.load-more').attr('var-max-paged' , max_paged);

				}

				$('.prensa-list .row:last-child').append(loopHTML);

				$('.load-more').html('Mais');
			},
			
			error: function(){

				$('.prensa-list .row:last-child').append('<div class="col-12 center"><p>Lo sentimos, no fue posible traer más contenido.</p></div>');
				$('.load-more').html('Mais');
				$('.load-more').hide();

			}
		});

	});

});	