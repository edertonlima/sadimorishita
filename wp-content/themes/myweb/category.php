<?php get_header(); ?>
<?php $category = get_queried_object(); //print_r($category); ?>

<section class="section-content post">
	<div class="container">

		<h2 class="center">Nossas <strong>Mídias/Insights</strong></h2>
		<p class="subtitulo center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>

		<div class="content no-padding">
			<div class="row">
		
				<?php while ( have_posts() ) : the_post();					

					get_template_part( 'content-list', get_post_format() );
					
				endwhile; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>