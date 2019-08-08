<article class="detalhe-post">
	<header>
		<h2 class="center">Quem <strong>Somos</strong></h2>
		<p class="subtitulo center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
	</header>

	<div class="content row">
		<div class="col-6">
			<!--<h2 class="tit-medio">Somos <strong>Excelência</strong></h2>-->
			<div class="justify">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col-6">
			<?php 
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'detalhe-post' ); 
				if($imagem[0]){ ?>
					<img src="<?php echo $imagem[0]; ?>">
				<?php }
			?>
		</div>
	</div>
</article>