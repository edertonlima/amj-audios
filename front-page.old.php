<?php get_header(); ?>


<section class="box-content"> 
	<div class="container">

	</div>
</section>


<?php get_footer(); ?>

<script type="text/javascript">
	$('#slide-home').on('slide.bs.carousel', function (e) {
		$('.text-item').removeClass('active');
	});

	$('#slide-home').on('slid.bs.carousel', function (e) {
		$('#txt-'+e.to).addClass('active');
	});
</script>

<?php if(!$GLOBALS['mobile']){ ?>
		<!-- CAROUSEL -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

	<script type="text/javascript">
		$('.carousel-itens').owlCarousel({
			loop:false,
			margin:30,
			responsiveClass:true,
			nav:true,
			navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			//rtl:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:3,
					nav:false
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				}
			}
		})

		var qtddot = $('.owl-dots').children().length;
		qtddot = (((qtddot*22)/2)+10)+'px';
		$('.owl-prev').css('margin-right',qtddot);
		$('.owl-next').css('margin-left',qtddot);
	</script>
<?php } ?>