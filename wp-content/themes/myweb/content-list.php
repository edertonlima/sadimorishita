<article class="<?php if(is_category()): echo 'col-4'; else: echo 'col-3'; endif; ?> list-post">
	<div class="data">
		<span class="dia"><?php echo get_the_date('d'); ?></span>
		<span class="mes"><?php echo get_the_date('M'); ?></span>
		<span class="ano"><?php echo get_the_date('Y'); ?></span>
	</div>
	<div class="content-list-post">
		<h3><?php the_title(); ?></h3>
		<?php the_excerpt(); ?>
		
		<a href="<?php the_permalink(); ?>" title="Veja mais" class="button cor2 transparent">
			VEJA MAIS <i class="fas fa-chevron-right"></i>
		</a>
	</div>
</article>