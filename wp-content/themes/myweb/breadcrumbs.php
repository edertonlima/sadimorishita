<?php //if( (!is_home()) && (!is_page('sair')) ){ ?>
<?php if( !is_front_page() ): ?>

	<div class="breadcrumbs">
		<div class="container">
			

			<?php // ASSOCIADOS
				if(get_post_type() == 'associado'): ?>
					<h4>ASSOCIADOS</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/associado" title="Associados">associados</a></li>

						<?php if(is_singular('associado')): ?>
							<li><span><?php echo the_title(); ?></span></li>
						<?php endif; ?>

						<?php if( $_GET['editar'] == 'perfil' ) : ?>
							<li><span>editar</span></li>
						<?php endif; ?>

						<?php if( $_GET['editar'] == 'senha' ) : ?>
							<li><span>alterar senha</span></li>
						<?php endif; ?>
					</ul>
				<?php endif;
			?>

			<?php // FÓRUM
				if(get_post_type() == 'forum'): ?>
					<h4>FÓRUM</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME"><i class="fas fa-home"></i></a><span></span></li>
						<li><a href="<?php echo get_home_url(); ?>/forum" title="Fórum">fórum</a></li>

						<?php if( $_GET['post'] == 'novo' ) : ?>
							<li><span>novo post</span></li>
						<?php endif; ?>
						<!--<li><span class="">
							<?php 
								$categorias = wp_get_post_terms( $post->ID, 'category' );
								foreach ( $categorias as $categoria ) { ?>
									<a href="#" title=""><?php echo $categoria->name;
									
										if( next( $categorias ) ) {
											echo ', ';
										} ?>

									</a>
									
								<?php }
							?>	
						</span></li>-->

						<?php if(is_singular('forum')): ?>
							<li><span><?php echo the_title(); //$_SESSION['associado']['nome-completo']; ?></span></li>
						<?php endif; ?>
					</ul>
				<?php endif;
			?>



			<?php // page
				if(is_page()): ?>
					<h4><?php the_title(); ?></h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a><span></span></li>
						<?php /*<li><a href="<?php echo get_home_url(); ?>/noticias" title="notícias">notícias</a></li>*/?>
						<li><span class=""><?php the_title(); ?></span></li>
					</ul>
				<?php endif;
			?>

			<?php // NOTÍCIAS
				if('post' == get_post_type()): ?>
					<h4>Mídias/Insights</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a><span></span></li>
						<?php /*<li><a href="<?php echo get_home_url(); ?>/noticias" title="notícias">notícias</a></li>*/?>
						<li><span class="">
							<?php 
								$categorias = wp_get_post_terms( $post->ID, 'category' );
								foreach ( $categorias as $categoria ) { ?>
									<a href="#" title=""><?php echo $categoria->name;
									
										if( next( $categorias ) ) {
											echo ', ';
										} ?>

									</a>
									
								<?php }
							?>	
						</span></li>
					</ul>
				<?php endif;
			?>


			<?php // ÁREA DE ATUAÇÃO
				if(get_post_type() == 'areas-atuacao'): ?>
					<h4>ÁREAS DE ATUAÇÃO</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a><span></span></li>
						<li><span>ÁREAS DE ATUAÇÃO</span></li>
						<li><span class=""><?php the_title(); ?></span></li>
					</ul>
				<?php endif;
			?>


			<?php // ÁREA DE ATUAÇÃO
				if(get_post_type() == 'nossos-advogados'): ?>
					<h4>NOSSOS ADVOGADOS</h4>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a></li>
						<li><a href="<?php echo get_home_url(); ?>/nossos-advogados" title="NOSSOS ADVOGADOS">NOSSOS ADVOGADOS</A></li>
						<?php if(is_singular('nossos-advogados')): ?>
							<li><span class=""><?php the_title(); ?></span></li>
						<?php endif; ?>
					</ul>
				<?php endif;
			?>

		</div>
	</div>

<?php endif; ?>