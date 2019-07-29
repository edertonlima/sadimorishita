<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-vertical-post' );

	if($imagem[0]){ ?>

		<div class="col-4">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-destaque list-associado" style="background-image: url('<?php echo $imagem[0]; ?>">
			
				<div class="box-content-destaque center">
					<h2><?php the_title(); ?></h2>
					<span class="label azul">Engenheiro</span>
				</div>

			</a>
		</div>	

	<?php } 
?>