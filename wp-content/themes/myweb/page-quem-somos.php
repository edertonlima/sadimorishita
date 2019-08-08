<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content det-page">
	<div class="container">

		<?php while ( have_posts() ) : the_post();					

			get_template_part( 'content-page-quem-somos', get_post_format() );
			
		endwhile; ?>

	</div>
</section>

<!-- nossos advogados -->
<section class="section-content nossos-advogados list-advogados bg-cor3">
	<div class="container">
		<div class="">

			<h2 class="tit-medio center">Nosso <strong>Time</strong></h2>
			<p class="subtitulo center">Reconhecida pela qualidade do trabalho dos advogados, nossa equipe oferece o melhor aconselhamento jurídico em termos competitivos.</p>

			<div class="item-list-advogado" id="carousel-advogados">
				<?php
					$args = array(
						'post_type' => 'nossos-advogados',
						'orderby'   => 'date',
						'order'     => 'DESC',
						'posts_per_page' => -1
					);

					query_posts( $args );
					while ( have_posts() ) : the_post();

						get_template_part( 'content-list-nossos-advogados', get_post_format() );
							
					endwhile;
					wp_reset_query();
				?>
			</div>

			<div class="control">
				<a href="javascript:" class="left"><i class="fas fa-chevron-left"></i></a>
				<a href="javascript:" class="right"><i class="fas fa-chevron-right"></i></a>
			</div>
			
		</div>
	</div>
</section>
<!-- nossos advogados -->

<?php get_footer(); ?>