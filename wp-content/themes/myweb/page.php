<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content det-page">
	<div class="container">

		<?php while ( have_posts() ) : the_post();					

			get_template_part( 'content-page', get_post_format() );
			
		endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>