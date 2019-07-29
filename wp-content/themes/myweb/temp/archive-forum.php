<?php
	if( $_POST['post'] == 'publicado' ):
		if($_POST['forum_titulo'] != ''):

			$new_post = array(
				'post_title'	=> $_POST['forum_titulo'],
				'post_content'  => $_POST['forum_texto'],
				'post_excerpt'  => $_POST['forum_resumo'],
				'post_type'		=> 'forum',
				'post_status'	=> 'publish'
			);

			// insert the post into the database
			if($id_newPost = wp_insert_post( $new_post )):

				session_start();
				$autor = get_post( $_SESSION['associado']['id'] );
				//echo '<br><br>'.$_SESSION['associado']['id'];
				//var_dump($autor);
				update_field( 'autor-forum', $autor, $id_newPost );
				wp_set_post_terms( $id_newPost, $_POST['forum_categoria'], 'categoria_forum' );

				header("Location: " . get_permalink($id_newPost));
			endif;

		endif;
	endif;
?>

<?php get_header(); ?>

<section class="box-content padding-top-40 forum list-forum">
	<div class="container">
		
		<div class="row">
			<div class="col-9">

				<?php if( $_GET['post'] == 'novo' ) : ?>

					<h3>NOVO POST</h3>
					<ul class="list-post-forum">

						<li class="item-forum form-forum bg-cinza">
							<div class="header-post">
							</div>
							<div class="body-post form-novo-post">
								<form action="<?php echo get_home_url(); ?>/forum" method="post">
									<fieldset>
										<input type="text" name="forum_titulo" placeholder="Título">
									</fieldset>
									<fieldset>
										<textarea name="forum_resumo" class="mini" placeholder="Resumo"></textarea>
									</fieldset>
									<fieldset class="col2">
										<?php
										$terms = get_terms( array(
										    'taxonomy' => 'categoria_forum',
										    'hide_empty' => false,
										) );
										//var_dump($terms);
										?>

										<div class="select">
										<select name="forum_categoria">
											<option>Categoria</option>
											<?php
												foreach ($terms as $key => $term) { ?>
													<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
												<?php }
											?>
										</select>
										</div>
									</fieldset>
									<fieldset>
										<textarea name="forum_texto" placeholder="Seu texto..."></textarea>
									</fieldset>
									<fieldset>
										<input type="hidden" name="post" value="publicado">
										<button type="submit" class="button grande vermelho">PUBLICAR</button>
									</fieldset>
								</form>
							</div>
							<div class="footer-post">

							</div>
						</li>

					</ul>

				<?php else: ?>

					<ul class="list-bloco-post list-meus-post">
						<li class="item-forum titulo-list bg-azul bg-total">
							<div class="header-post">
								
								<div class="table-forum">
									<div class="collist-forum colNome branco">Minhas Publicações</div>
									<div class="collist-forum colNum branco">Interações</div>	
									<div class="collist-forum colUltPost branco">Último Post</div>
								</div>

							</div>
						</li>

						<?php while ( have_posts() ) : the_post();

							//echo get_field('autor-forum') .' == '. $_SESSION['associado']['id'];
							if(get_field('autor-forum') == $_SESSION['associado']['id']){
								get_template_part( 'content-list-forum', get_post_format() );
							}

						endwhile; ?>
					</ul>

					<div class="novo-post">
						<a href="<?php echo get_home_url(); ?>/forum/?post=novo" class="button mini azul">NOVO POST</a>
					</div>

					<ul class="list-bloco-post list-todos-post margin-top-60">
						<li class="item-forum titulo-list bg-laranja bg-total">
							<div class="header-post">
								
								<div class="table-forum">
									<div class="collist-forum colNome branco">Publicações </div>
									<div class="collist-forum colNum branco">Interações</div>	
									<div class="collist-forum colUltPost branco">Último Post</div>
								</div>

							</div>
						</li>

						<?php while ( have_posts() ) : the_post();

							//echo get_field('autor-forum') .' == '. $_SESSION['associado']['id'];
							//if(get_field('autor-forum') == $_SESSION['associado']['id']){
							if(get_field('autor-forum') != $_SESSION['associado']['id']){
								get_template_part( 'content-list-forum', get_post_format() );
							}
							//}

						endwhile; ?>
					</ul>	

				<?php endif; ?>

			</div>

			<div class="col-3">

				<?php get_template_part( 'sidebar', get_post_format() ); ?>

			</div>	
		</div>

	</div>
</section>

<?php get_footer(); ?>








<?php /*
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

*/ ?>







<?php /*
<?php get_header(); ?>

<?php $category = get_queried_object(); //print_r($category); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide','option') ):
					$slide = 0;
					while ( have_rows('slide','option') ) : the_row();

						if(get_sub_field('imagem','option')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem','option');?>')">

								<div class="box-height">
									<div class="box-texto">
										
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_projetos.png" alt="<?php echo $category->name; ?>" />
										<h2 class="title_page"><?php echo $category->name; ?></h2>

										<p class="texto"><?php the_sub_field('texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php if(get_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id)){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>

		<ul class="ico-page">
			<?php
				$args = array(
				    'taxonomy'      => 'categoria_projeto',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $categoria ){ //print_r($categoria); ?>

						<li>
							<a href="javascript:" title="<?php echo $categoria->name; ?>" class="cat_projeto" rel="<?php echo $categoria->slug; ?>">
								<img src="<?php the_field('ico_listagem',$categoria->taxonomy.'_'.$categoria->term_id); ?>" class="" alt="<?php echo $categoria->name; ?>"/>
								<span><?php echo $categoria->name; ?></span>
							</a>
						</li>


					
				<?php
				}
			?>
		</ul>

	</div>
</section>

<section class="box-content sombra">
	<div class="container">
		<div class="grid">
			<div class="grid-sizer"></div>

			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content-list-projetos', get_post_format() );
				endwhile;
			?>

		</div>
		<?php paginacao(); ?>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});

		jQuery('.cat_projeto').click(function(){
			var item = '.'+jQuery(this).attr('rel');
			jQuery('.cat_projeto').addClass('off');
			jQuery(this).removeClass('off');

			jQuery('.grid-item').addClass('off');
			jQuery(item).removeClass('off');

			var $grid = jQuery('.grid').masonry({
				itemSelector: '.grid-item',
				percentPosition: true,
				columnWidth: '.grid-sizer'
			});
			// layout Masonry after each image loads
			$grid.imagesLoaded().progress( function() {
				$grid.masonry();
			});
		});

	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.pkgd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.js" type="text/javascript"></script>
<script type="text/javascript">
	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry();
	});  
</script>

*/ ?>