<article class="detalhe-post">

	<header class="">
		<div class="row row-mini">
			<?php 
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
				if($imagem[0]){ ?>
					<img class="col-4" src="<?php echo $imagem[0]; ?>">
				<?php }
			?>
			<div class="col-8 content-advogado">
				<h2 class=""><strong><?php the_title(); ?></strong></h2>
				<span class="prof"><?php the_field('profissao'); ?></span>

				<?php if(get_field('atuacao')): ?>
					<h3>ATUAÇÃO</h3>
					<p class=""><?php the_field('atuacao'); ?></p>
				<?php endif ?>

				<?php if(get_field('idiomas')): ?>
					<h3>IDIOMAS</h3>
					<p class=""><?php the_field('idiomas'); ?></p>
				<?php endif ?>
			</div>
		</div>
	</header>

	<div class="content justify">
		<?php the_content(); ?>
	</div>

</article>