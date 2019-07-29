<div class="row row-mini">
	<div class="">
		
		<div class="col-12">

			<?php 
				$url_post = get_permalink();
				$ID_post = $post->ID;
				$categorias = wp_get_post_terms( $post->ID, 'categoria_forum' );
				foreach ( $categorias as $categoria ) { ?>
					<span class="label azul"><?php echo $categoria->name; ?></span>
				<?php }
			?>	

			<h2><?php the_title(); ?></h2>
			<span class="autor">
				<strong><?php echo get_the_title(get_field('autor-forum')); ?></strong>
				<span> - <?php echo get_the_date(); ?> <?php the_time( 'à\s H:i' ); ?></span>
			</span>


			<div class="content justify">
				<?php the_content(); ?>
			</div>

			<?php /*
			<div class="tags">
				<h3><span>TAGS:</span></h3>
				<ul>
					<li><a href="#" class="label">agro</a></li>
					<li><a href="#" class="label">tecnologia</a></li>
					<li><a href="#" class="label">sustentabilidade</a></li>
					<li><a href="#" class="label">pib</a></li>
					<li><a href="#" class="label">futuro</a></li>
				</ul>
			</div>
			*/ ?>

			<ul class="list-post-forum">

				<li class="item-forum form-forum bg-azul">

					<form action="<?php echo $url_post; ?>" method="post">
						<div class="header-post">
							<strong>Comente nesta publicação</strong>
						</div>
						<div class="body-post">							
							<fieldset>
								<textarea name="comentario_forum" placeholder="Seu texto..."></textarea>
							</fieldset>
						</div>
						<div class="footer-post">
							<input type="hidden" name="resposta-post" value="">
							<input type="hidden" name="comentario" value="novo">
							<button type="submit" class="button mini azul">ENVIAR</button>
						</div>
					</form>

				</li>

				<?php if( have_rows('posts-forum') ):
					$row_comentario = 0;
					while ( have_rows('posts-forum') ) : the_row(); 

						$myarray = array(get_sub_field('autor-post')[0]);
						$args = array(
						   'post_type' => 'associado',
						   'post__in'  => $myarray
						);

						if( query_posts( $args ) ):
							while ( have_posts() ) : the_post(); ?>

								<li class="item-forum bg-cinza" id="post-<?php echo $row_comentario; ?>">
									<div class="header-post">
										<i class="fas fa-user"></i>
										<strong><?php echo $post->post_title; ?></strong>
										<!--29 de junho, 2019 3:22 pm-->
										<?php the_sub_field('data-post'); ?>
										<?php /*<div class="favorito"><i class="fas fa-heart"></i> 10</div>*/ ?>
									</div>
									<div class="body-post">

										<?php if(get_sub_field('resposta-post') != ''): ?>
											<div class="reposta-post">
												<i class="fas fa-quote-left"></i>

												<?php
													$rows = get_field('posts-forum',$ID_post); // get all the rows
													$specific_row = $rows[get_sub_field('resposta-post')]; // 0 will get the first row, remember that the count starts at 0
													echo '<p>' . $specific_row['texto-post'] . '</p>';
												?>

											</div>
										<?php endif; ?>

										<p><?php the_sub_field('texto-post'); ?></p>
									</div>
									<div class="footer-post">
										<?php /*<button class="button mini azul transparent">CURTIR</button> */?>
										<button class="button mini azul responder" rel='#resposta-<?php echo $row_comentario; ?>'>RESPONDER</button>
									</div>
								</li>

								<li class="item-forum form-forum bg-azul item-resposta" id="resposta-<?php echo $row_comentario; ?>">

									<i class="fas fa-times close-responder"></i>
									<form action="<?php echo $url_post; ?>" method="post">
										<div class="header-post">
											<strong>Comente nesta resposta</strong>
										</div>
										<div class="body-post">							
											<fieldset>
												<textarea name="comentario_forum" placeholder="Seu texto..."></textarea>
											</fieldset>
										</div>
										<div class="footer-post">
											<input type="hidden" name="resposta-post" value="<?php echo $row_comentario; ?>">
											<input type="hidden" name="comentario" value="novo">
											<button type="submit" class="button mini azul">ENVIAR</button>
										</div>
									</form>

								</li>

							<?php endwhile;
							wp_reset_query();
						endif;

						$row_comentario++; 

					endwhile;
				endif; ?>

			</ul>
		</div>

	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.responder').click(function(){
			//alert(jQuery(this).attr('rel'));
			jQuery(jQuery(this).attr('rel')).show();
			//jQuery('#esposta0').show();
		});

		jQuery('.close-responder').click(function(){
			jQuery(this).parent().hide();
		});
	});
</script>