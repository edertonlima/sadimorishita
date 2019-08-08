<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>

		<article class="<?php if('nossos-advogados' == get_post_type()): echo 'col-4'; endif; ?>">
			<a href="<?php the_permalink(); ?>">
				<div class="img-mask">
					<div class="img-advogado" style="background-image: url('<?php echo $imagem[0]; ?>');"></div>
					<div class="hover">
						<span class="button cor2 transparent">
							CONHEÇA MAIS <i class="fas fa-chevron-right"></i>
						</span>					
					</div>
				</div>

				<div class="content-advogado">
					<div class="vertical-center">
						<div class="content-vertical">
							<h3 class=""><?php the_title(); ?></h3>
							<span class="prof"><?php the_field('profissao'); ?></span>	
						</div>
					</div>	
				</div>
			</a>
		</article>

	<?php }
?>