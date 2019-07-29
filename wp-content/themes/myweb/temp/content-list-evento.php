							<div class="box-destaque noticias-destaque" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">

								<span class="label nome-area">NÓTICIAS</span>
								<div class="box-content-destaque">
									<?php foreach ( $categorias as $categoria ) { ?>
										<span class="label laranja"><?php echo $categoria->name; ?></span>
									<?php } ?>									
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<h2><?php the_title(); ?></h2>
									</a>
									<span class="data"><?php echo get_the_date(); ?></span>
								</div>

							</div>