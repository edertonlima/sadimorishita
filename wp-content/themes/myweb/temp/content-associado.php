		
		<div class="row row-mini">
			<div class="cont-noticias">

				<div class="col-4">
					<?php 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-post' ); 
						if($imagem[0]){ ?>
							<img src="<?php echo $imagem[0]; ?>">
						<?php }
					?>

					<div class="info-contato">
						<ul>
							<li><i class="fas fa-at"></i> <?php the_field('email_associado'); ?></li>
							<li><i class="fas fa-phone-alt"></i> (62) 3213-5148</li>
							<li><i class="fas fa-mobile-alt"></i> (62) 9973-5831</li>
							<li><i class="fas fa-map-marker-alt"></i> Goiana, PE</li>
						</ul>
					</div>
				</div>

				<div class="col-8">
					<span class="label azul">Engenheiro</span>
					<h2><?php the_title(); ?></h2>
					<p>Número de Carteira: 1137/D-GO</p>
					
					<?php the_excerpt(); ?>

					<div class="perfil">
						<h3 class="border mid">
							<span>Perfil</span>
						</h3>
						<p>a) Avaliações e Perícias de Engenharia</p>
						<p>b) Vistoria Cautelar de: Vizinhos, Aptos. Novos;</p>
						<p>c) Vistoria p/Condôminos a Receber Prédios Novos das Construtoras</p>
						<p>d) Inspeção Predial, Vistoria em Obras p/Verificação de Defeitos, Planejamento e Acompanhamento de Obras</p></p>
					</div>
				</div>

			</div>
		</div>



<?php /*

<?php $category = get_categories($args);  ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();

						if(get_sub_field('imagem')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

								<div class="box-height">
									<div class="box-texto">
										
										<img src="<?php the_field('ico_listagem',$category[0]->taxonomy.'_'.$category[0]->term_id); ?>" alt="<?php echo $category[0]->name; ?>" />
										<h2 class="title_page"><?php the_title(); ?></h2>
 
										<p class="texto"><?php the_sub_field('texto'); ?></p>
										<?php if(get_sub_field('sub_texto')){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>

	</div>
</section>

<section class="box-content box-sobre sombra">
	<div class="container">
		
		<div class="content-post">
			<?php the_content(); ?>
		</div>

	</div>
</section>

<?php if(get_field('imagem')){ ?>
	<img src="<?php the_field('imagem'); ?>" class="img-destaque" alt=""/>
<?php } ?>

<section class="box-content box-sobre sombra">
	<div class="container">

		<div class="content-post">
			<?php if(get_field('titulo')){ ?>
				<h5><?php the_field('titulo'); ?></h5>
			<?php } ?>
			<?php the_field('texto_adicional'); ?>
		</div>

		<?php /*
		<div class="autor">
			<span class="ico"></span>
			<span class="nome-data"><span class="nome"><?php echo get_the_author(); ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_date(); ?></span>
		</div>
		*/  /* ?>
	</div>
</section>

<section class="box-content box-sobre sombra no-padding">
	<div class="container">

		<h5 class="veja-mais">VEJA MAIS NOTÍCIAS <br> RELACIONADAS</h5>

		<div class="grid">
			<?php
				$produto = get_previous_post();
				if($produto){ $terms = get_the_category($produto->ID); ?>
					<div class="grid-item grid-left">
						<div class="">
							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
								<article class="item">
					
									<img src="<?php the_field('imagem_listagem_post', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

									<div class="hover-grid">
										<div class="cont-hover">
											<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt=""/>
											<span><?php echo $produto->post_title; ?></span>
											<?php echo $terms[0]->name; ?>
										</div>
									</div>
								</article>
							</a>
						</div>
					</div>
				<?php }
			?>

			<?php
				$produto = get_next_post();
				if($produto){ $terms = get_the_category($produto->ID); ?>
					<div class="grid-item grid-right">
						<div class="">
							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
								<article class="item">
					
									<img src="<?php the_field('imagem_listagem_post', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

									<div class="hover-grid">
										<div class="cont-hover">
											<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt=""/>
											<span><?php echo $produto->post_title; ?></span>
											<?php echo $terms[0]->name; ?>
										</div>
									</div>
								</article>
							</a>
						</div>
					</div>
				<?php }
			?>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(window).load(function(){

		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});

	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});
</script>

*/ ?>