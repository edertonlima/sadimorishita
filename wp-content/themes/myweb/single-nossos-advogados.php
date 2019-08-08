<?php get_header(); ?>
<?php $category = get_queried_object(); ?>

<section class="section-content post nossos-advogados">
	<div class="container">
		<div class="row">
			
			<div class="col-8">
				
				<?php while ( have_posts() ) : the_post();					

					get_template_part( 'content-nossos-advogados', get_post_format() );
					
				endwhile; ?>

			</div>

			<div class="col-4">
				<div class="area-atuacao">
					<h2>Nossos <strong class="cor2">Advogados</strong></h2>
					<ul class="list-area-atuacao">

						<?php
							$args_areasatuacao = array(
								'post_type' => 'nossos-advogados',
								'orderby'   => 'date',
								'order'     => 'DESC',
								'posts_per_page' => -1
							);

							$current_areasatuacao = $post->ID;
							query_posts( $args_areasatuacao );
							while ( have_posts() ) : the_post(); ?>

								<li>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="<?php if($post->ID == $current_areasatuacao): echo 'active'; endif; ?>">
										<i class="far fa-caret-square-right"></i>
										<i class="fas fa-caret-square-right"></i>
										<?php the_title(); ?>
									</a>
								</li>

							<?php endwhile;
							wp_reset_query();
						?>

					</ul>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- recentes Mídias/Insights -->
<section class="section-content recente-post border">
	<div class="container">
		<div class="row">

			<h2 class="tit-medio center">Recentes <strong>Mídias/Insights</strong></h2>

				<?php
					$args_noticias = array(
						'posts_per_page' => -1,
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