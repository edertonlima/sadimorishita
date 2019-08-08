<?php get_header(); ?>

<section class="section-content det-page detalhe-post-home">
	<div class="">

		<article class="detalhe-post">
			<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">
						<h2 class="tit-medio">Somos <strong>Excelência</strong> e <strong class="cor2">Inovação</strong></h2>
						<p class="subtitulo justify">
							<?php echo get_the_excerpt(get_page_by_path('quem-somos')); ?>
						</p>

						<a href="<?php the_permalink(get_page_by_path('quem-somos')); ?>" title="Veja mais" class="button cor1 transparent">
							VEJA MAIS <i class="fas fa-chevron-right"></i>
						</a>
					</div>
					<div class="content-vertical">
						<div class="image-home">
							<?php 
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('quem-somos')), 'detalhe-post' ); 
								if($imagem[0]){ ?>
									<img src="<?php echo $imagem[0]; ?>">
								<?php }
							?>
						</div>
					</div>
				</div>

			</div>
		</article>

	</div>
</section>

<section class="section-content no-padding area-atuacao area-atuacao-home">
	<div class="row">
		<div class="col-6 bg-left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/advogados-software.jpg')">
			<div class="vertical-center">
				<div class="content-vertical">
					<h2>Área de <strong class="cor2">Atuação</strong></h2>
					<p class="subtitulo">Conheça todos os serviços especializados que atendemos</p>
				</div>
			</div>
		</div>
		<div class="col-6 bg-right">
			<div class="vertical-center">
				<div class="content-vertical">
					<ul class="list-area-atuacao">

						<?php
							$args_areasatuacao = array(
								'post_type' => 'areas-atuacao',
								'orderby'   => 'title',
								'order'     => 'ASC',
								'posts_per_page' => -1
							);

							$current_areasatuacao = $post->ID;
							query_posts( $args_areasatuacao );
							while ( have_posts() ) : the_post(); ?>

								<li>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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


	<div class="" style="display: none;">

		<article class="detalhe-post">
			<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">
						<!--<h2 class="tit-medio">Somos <strong>Excelência</strong> e <strong class="cor2">Inovação</strong></h2>
						<p class="subtitulo justify">
							<?php echo get_the_excerpt(get_page_by_path('quem-somos')); ?>
						</p>

						<a href="<?php the_permalink(); ?>" title="Veja mais" class="button cor1 transparent">
							VEJA MAIS <i class="fas fa-chevron-right"></i>
						</a>-->
					</div>
					<div class="content-vertical">
						<div class="image-home">
							<?php 
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('quem-somos')), 'detalhe-post' ); 
								if($imagem[0]){ ?>
									<img src="<?php echo $imagem[0]; ?>" style="opacity: 0;">
								<?php }
							?>
						</div>
					</div>
				</div>

			</div>
		</article>

	</div>
</section>

<!-- recentes Mídias/Insights -->
<section class="section-content recente-post">
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

<!-- nossos advogados -->
<section class="section-content nossos-advogados list-advogados bg-cor3">
	<div class="container">
		<div class="">

			<h2 class="tit-medio center">Nossos <strong>Advogados</strong></h2>
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