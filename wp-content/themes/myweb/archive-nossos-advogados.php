<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content nossos-advogados list-advogados">
	<div class="container">

		<h2 class="center">Nossos <strong>Advogados</strong></h2>
		<p class="subtitulo center">Reconhecida pela qualidade do trabalho dos advogados, nossa equipe oferece o melhor aconselhamento jurídico em termos competitivos.</p>

		<div class="content">
			<div class="row">
		
				<?php while ( have_posts() ) : the_post();					

					get_template_part( 'content-list-nossos-advogados', get_post_format() );
					
				endwhile; ?>

			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>