<li class="item-forum">
	<div class="header-post">
		
		<div class="table-forum">
			<?php /*<div class="collist-forum"><!--<i class="fas fa-user"></i>--></div> */?>
			<div class="collist-forum colNome">
				<a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a>
				<?php the_excerpt(); ?>

				<div class="cat-forum">
					<?php 
						$categorias = wp_get_post_terms( $post->ID, 'categoria_forum' );
						foreach ( $categorias as $categoria ) { ?>
							<span class="label"><?php echo $categoria->name; ?></span>
						<?php }
					?>
					<span class="autor">
						<strong><?php echo get_the_title(get_field('autor-forum')); ?></strong>
						<span> - <?php echo get_the_date(); ?> <?php the_time( 'à\s H:i' ); ?></span>
					</span>
				</div>	

			</div>
			<div class="collist-forum colNum">
				<?php 
					if( have_rows('posts-forum') ):
						echo count(get_field('posts-forum'));
					else:
						echo '0';
					endif;
				?>
			</div>	
			<div class="collist-forum colUltPost">
				<span class="autor">
					<?php
						if( have_rows('posts-forum') ):

							$repeater = get_field('posts-forum');
							$last_row = end($repeater);

							$ID = $last_row['autor-post'][0];
							$args = array('p' => $ID, 'post_type' => 'associado');
							$loop = new WP_Query($args);

							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<strong><?php the_field('nome_associado'); ?></strong>
							<?php endwhile;

							$data_last_post = explode('às', $last_row['data-post']); ?>

							<span><?php echo $data_last_post[0]; ?></span>
							<span><?php echo 'às' . $data_last_post[1]; ?></span>

						<?php endif;
					?>
				</span>
			</div>
		</div>

	</div>
</li>