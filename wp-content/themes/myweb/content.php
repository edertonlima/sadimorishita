<article class="detalhe-post">

	<header class="list-post">
		<div class="content-list-post">
			<h2 class=""><strong><?php the_title(); ?></strong></h2>
			<p class="data-det margin-top-20"><i class="far fa-calendar-alt"></i><?php echo get_the_date('d \d\e M, Y'); ?></p>
		</div>
	</header>

	<div class="content justify">
		<?php the_content(); ?>
	</div>

</article>