<?php 

	$args_areasatuacao = array(
		'post_type' => 'areas-atuacao',
		'orderby'   => 'title',
		'order'     => 'ASC',
		'posts_per_page' => 1
	);

	query_posts( $args_areasatuacao );
	while ( have_posts() ) : the_post();
		$url_atuacao = get_the_permalink();
	endwhile;
	wp_reset_query();
						

	header("Location: $url_atuacao");
	/*
?>

<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content post">
	<div class="container">

		<h2 class="center">adadad <strong>adadadadadad</strong></h2>
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
<?php get_footer(); */ ?>