<?php
	if( $_POST['comentario'] == 'novo' ):
		if($_POST['comentario_forum'] != ''):

			/*$new_post = array(
				'post_title'	=> $_POST['forum_titulo'],
				'post_content'  => $_POST['forum_texto'],
				'post_excerpt'  => $_POST['forum_resumo'],
				'post_type'		=> 'forum',
				'post_status'	=> 'publish'
			);*/

			session_start();
			$autor = get_post( $_SESSION['associado']['id'] );
			$texto = $_POST['comentario_forum'];
			$resposta_post = $_POST['resposta-post'];
			//echo '<br><br>'.$_SESSION['associado']['id'];
			//var_dump($autor);
			//update_field( 'autor-post', $autor, $id_newPost );
			//update_field( 'texto-post', $_POST['comentario_forum'], $id_newPost );

			//wp_set_post_terms( $id_newPost, $_POST['forum_categoria'], 'categoria_forum' );

			date_default_timezone_set('America/Sao_Paulo');
			setlocale(LC_TIME,"portuguese");

			$posts_forum = "posts-forum";
			$value = array(
				"autor-post"	=> $autor,
				"texto-post"	=> $texto,
				"data-post"		=> strftime("%d de %B, %Y às %R"),
				"resposta-post"		=> $resposta_post
			);

			//update_field( $posts_forum, $value, $post->ID );
			//update_sub_field( $posts_forum, $value, $post->ID );
			add_row( $posts_forum, $value, $post->ID );

			header("Location: " . get_permalink());

		endif;
	endif;
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="box-content padding-top-40 no-padding-bottom forum detalhe">
		<div class="container">
			
			<div class="row">
				<div class="col-9">

					<?php get_template_part( 'content-forum', get_post_format() ); ?>

				</div>

				<div class="col-3">

					<?php get_template_part( 'sidebar-forum', get_post_format() ); ?>

				</div>	
			</div>

		</div>
	</section>

	<!-- NOTÍCIAS SECUNDÁRIA -->
	<section class="box-content no-padding-top">
		<div class="container">
			
			<div class="row">
				<div class="col-m-1 col-10">

					<div class="noticias list-noticias noticias-recentes">

						<h3 class="border mid">
							<span>NOTÍCIAS RECENTES</span>
							<a href="#" class="button pequeno transparent">mais notícias <i class="fas fa-chevron-right"></i></a>
						</h3>

						<div class="row row-mini">

							<?php
								$args_noticias = array(
									'posts_per_page' => 4,
									'post_type' => 'post'
								);

								$current_prod = $post->ID;
								query_posts( $args_noticias );
								$i = 0;
								while ( have_posts() ) : the_post();
									if($current_prod != $post->ID){

										$i++;
										if($i <= 3){
										
											$categorias = wp_get_post_terms( $post->ID, 'category' ); 
											$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-post' ); ?>

											<div class="col-4 item-noticias">
												<div class="img-noticias">
													<?php foreach ( $categorias as $categoria ) { ?>
														<span class="label laranja"><?php echo $categoria->name; ?></span>
													<?php } ?>	
													<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>">
												</div>

												<div class="cont-noticias">
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
													<span class="data"><?php echo get_the_date(); ?></span>
												</div>
											</div>
										
										<?php }

									}
								endwhile;
								wp_reset_query();
							?>

						</div>
					</div>

				</div>
			</div>

		</div>
	</section>
	<!-- NOTÍCIAS SECUNDÁRIA -->

<?php endwhile; ?>

<?php get_footer(); ?>