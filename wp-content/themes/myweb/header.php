<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php /* 
	$titulo_princ = get_field('titulo', 'option');
	$descricao_princ = get_field('descricao', 'option');
	$imagem_princ = get_field('imagem_principal', 'option');
	$url = get_home_url();
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );

	if(is_tax()){
		$terms = get_queried_object();
		$titulo = $terms->name;
		$descricao = $terms->description;
		$imagem = get_field('imagem_listagem',$terms->taxonomy.'_'.$terms->term_id);
		$url = get_term_link($terms->term_id);
	}

	if(is_archive()){
		$titulo = get_field('titulo_pagina','option');
		$descricao = get_field('descricao_pagina','option');
		$imagem = get_field('imagem_pagina','option');
		$url = $url.'/produtos';
	}

	if(is_single()){
		$titulo = get_the_title();
		$descricao = get_the_excerpt();
		
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	if($titulo == ''){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}

	$autor = 'Di20 Desenvolvimento'; 
*/ ?>


<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php /*
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo_princ; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>
*/ ?>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owlcarousel/owl.theme.default.min.css">
<!-- JQUERY -->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.js"></script>


<script type="text/javascript">
	//jQuery.noConflict();

	/*jQuery(document).ready(function(){

		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				jQuery('.nav').css('top','-100vh');
				jQuery(this).removeClass('active');
				jQuery('.header').removeClass('active');
			}else{
				jQuery('.nav').css('top','0px');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
			}
		});

		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}

		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		jQuery('.nav').css('top','-100vh');
		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});

	jQuery(window).scroll(function(){
		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}else{
			jQuery('.header').removeClass('scroll_menu');
		}
	});*/
</script>

<!-- ZOPIM -->
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">/*
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4wUPiAqqUPHLIihFTiGQt2Su4HknexxE";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");*/
</script>

<!-- SUMO -->
<!--<script src="//load.sumome.com/" data-sumo-site-id="0820f5828ba5ae1d27edd8bde6d74989a0ddbfa73cad0af4f62420486d84f071" async="async"></script>-->

<?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="">
			<h1>
				<a href="<?php echo get_home_url(); ?>" title="<?php //the_field('titulo', 'option'); ?>">
					<img src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/sadimorishita_logo_header.png" alt="<?php //the_field('titulo', 'option'); ?>">
				</a>
			</h1>

			<a href="javascript:" class="menu-mobile"></a>

			<nav class="nav">
				<ul>
					<li class="<?php if(is_front_page()): echo 'ativo'; endif; ?>">
						<a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a>
					</li>

					<li class="<?php if(is_page('quem-somos')): echo 'ativo'; endif; ?>">
						<a href="<?php echo get_permalink(get_page_by_path('quem-somos')); ?>" title="QUEM SOMOS">QUEM SOMOS <i class="fas fa-chevron-down" style="display: none;"></i></a>

						<ul style="display: none;">
							<li><a href="<?php echo get_home_url(); ?>/" title="">História</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Estatuto</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Missão e Visão</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Regime Interno</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Diretoria Executiva</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Conselho Fiscal</a></li>
							<li><a href="<?php echo get_home_url(); ?>/" title="">Assessoria Técnica</a></li>
							<li><a href="<?php echo get_home_url(); ?>/associado" title="ASSOCIADOS">Associados</a></li>
						</ul>
					</li>

					<li class="<?php if('areas-atuacao' == get_post_type()): echo 'ativo'; endif; ?>">
						<a href="<?php echo get_home_url(); ?>/areas-atuacao" title="ÁREAS DE ATUAÇÃO">ÁREAS DE ATUAÇÃO</a>
					</li>

					<li class="<?php if('nossos-advogados' == get_post_type()): echo 'ativo'; endif; ?>">
						<a href="<?php echo get_home_url(); ?>/nossos-advogados" title="NOSSOS ADVOGADOS">NOSSOS ADVOGADOS</a>
					</li>

					<li class="<?php if('post' == get_post_type()): echo 'ativo'; endif; ?>">
						<a href="<?php echo get_home_url(); ?>/midias-insight" title="MÍDIAS/INSIGHT">MÍDIAS/INSIGHT <i class="fas fa-chevron-down" style="display: none;"></i></a>
					</li>

					<li class="<?php if(is_page('fale-conosco')): echo 'ativo'; endif; ?>">
						<a href="javascript:<?php //echo get_permalink(get_page_by_path('fale-conosco')); ?>" title="FALE CONOSCO">FALE CONOSCO</a>
					</li>

					<li class="idiomas">
						<div id="google_translate_element" class="boxTradutor"></div>
						<a href="javascript:trocarIdioma('pt')">
							<img class="img-footer" src="<?php echo get_template_directory_uri(); ?>/assets/images/br.png" alt="">
						</a>
						<a href="javascript:trocarIdioma('en')" class="">
							<img class="img-footer" src="<?php echo get_template_directory_uri(); ?>/assets/images/en.png" alt="">
						</a>
						<a href="javascript:trocarIdioma('es')" class="">
							<img class="img-footer" src="<?php echo get_template_directory_uri(); ?>/assets/images/es.png" alt="">
						</a>
					</li>

					<li class="busca" style="display: none;">
						<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="" title="O QUE VOCÊ QUER BUSCAR?"><i class="fas fa-search"></i></a>
					</li>
				</ul>
			</nav>

		</div>
	</header>

	<?php get_template_part( 'breadcrumbs', get_post_format() ); ?>

	<?php if(is_front_page()){ ?>
		<section class="section-content no-padding slide">		
			<div class="carousel slide" data-ride="" data-interval="6000" id="slide">
				<div class="carousel-inner">

					<?php
						$args_noticias = array(
							'posts_per_page' => 3,
							'post_type' => 'post'
						);
						$current_prod = $post->ID;
						query_posts( $args_noticias );
						$slide = 0;
						$link_slide = array();

						while ( have_posts() ) : the_post();
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

								<div class="carousel-item <?php if($slide == 0){ echo 'active'; } ?>" style="background-image: url('<?php echo $imagem[0]; ?>');">

									<div class="vertical-center">
										<div class="content-vertical content-carousel">
											<h2 class="title_page"><?php the_title(); ?></h2>
											<div class="texto"><?php the_excerpt(); ?></div>
										</div>
									</div>
									
								</div>

							<?php
							$slide = $slide+1;
							$link_slide[] = get_the_permalink();
						endwhile;
						wp_reset_query();
					?>

				</div>

				<?php /*
				<a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
				</a>
				<a class="carousel-control-next" href="#slide" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Próximo</span>
				</a>
				*/ ?>

				<div class="box-carousel-indicators">
					<div class="content-indicators">
						<ol class="carousel-indicators">					
							<?php for($i=0; $i<$slide; $i++){ ?>
								<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
							<?php } ?>					
						</ol>

						<a href="<?php echo get_home_url(); ?>/midias-insight" title="MÍDIAS/INSIGHT">
							<h2>MÍDIAS/INSIGHT</h2>
						</a>
					</div>

					<div class="link-midia">
						<?php
							foreach ($link_slide as $key => $link) { ?>
								<a href="<?php echo $link; ?>" title="Veja mais" class="button cor2 <?php if($key == 0){ echo 'active'; } ?>" id="btn_slide_<?php echo $key; ?>">
									VEJA MAIS <i class="fas fa-chevron-right"></i>
								</a>
							<?php }
						?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>