<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content post">
	<div class="container">

		<?php while ( have_posts() ) : the_post();					

			get_template_part( 'content', get_post_format() );
			
		endwhile; ?>

	</div>
</section>

<!-- recentes Mídias/Insights -->
<section class="section-content recente-post border">
	<div class="container">
		<div class="row">

			<h2 class="tit-medio center">Recentes <strong>Mídias/Insights</strong></h2>

				<?php
					$args_noticias = array(
						'posts_per_page' => 5,
						'post_type' => 'post'
					);

					$current_prod = $post->ID;
					query_posts( $args_noticias );
					$i = 0;
					while ( have_posts() ) : the_post();
						if($current_prod != $post->ID){

							$i++;
							if($i <= 4){
							
								get_template_part( 'content-list', get_post_format() );
							
							}

						}
					endwhile;
					wp_reset_query();
				?>
			
		</div>
	</div>
</section>
<!-- recentes Mídias/Insights -->

<?php get_footer(); ?>