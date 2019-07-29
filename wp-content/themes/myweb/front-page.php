<?php get_header(); ?>

<section class="box-content padding-top-40">
	<div class="container">
		
		<div class="row">
			<div class="col-9">
			
				<div class="curso list-curso">
					<div class="row item-curso">
						<div class="col-5 img-curso">
							<span class="label nome-area azul-celeste">CURSOS</span>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cursos.jpg">
						</div>

						<div class="col-7 cont-curso">
							<h2>Agronegócio: Como nosso setor ajuda a mover o Brasil</h2>
							<span class="data">30 de Junho, 2019</span>
							<p>O agronegócio vem sustentando a economia brasileira, sendo um dos setores de maior participação no PIB.  Compreender como ele é formado permite saber como e onde vamos nos encaixar para participar desse tipo de negócio. Saber encontrar pessoas que estão nesse mercado também é importante para que o negócio rural dê certo. Neste curso, vamos entender um pouco melhor o setor e a economia brasileira.</p>
						</div>
					</div>

					<div class="btn-curso">
						<a href="#" class="button pequeno right azul-celeste transparent">mais cursos</a>
					</div>
				</div>

				<!-- NOTÍCIAS -->
				<div class="noticias list-noticias">

					<!-- NOTÍCIAS DESTAQUE -->
					<?php
						$args_noticias = array(
							'posts_per_page' => 1,
							'post_type' => 'post'
						);

						query_posts( $args_noticias );
						//$wp_query = new WP_Query($args_noticias);
						while ( have_posts() ) : the_post(); 
							$categorias = wp_get_post_terms( $post->ID, 'category' ); 
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'detalhe-post' ); ?>

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

						<?php endwhile;
						wp_reset_query();
					?>
					<!-- NOTÍCIAS DESTAQUE -->

					<!-- NOTÍCIAS SECUNDÁRIA -->
					<div class="row row-mini">
						<?php
							$args_noticias = array(
								'posts_per_page' => 3,
								'offset' => 1,
								'post_type' => 'post'
							);

							query_posts( $args_noticias );
							while ( have_posts() ) : the_post(); 
								$categorias = wp_get_post_terms( $post->ID, 'category' ); 
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-post' ); ?>

								<div class="col-4 item-noticias">
									<div class="img-noticias">
										<?php foreach ( $categorias as $categoria ) { ?>
											<span class="label laranja"><?php echo $categoria->name; ?></span>
										<?php } ?>	
										<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>">
									</div>

									<div class="cont-noticias">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<h2><?php the_title(); ?></h2>
										</a>
										<span class="data"><?php echo get_the_date(); ?></span>
									</div>
								</div>

							<?php endwhile;
							wp_reset_query();
						?>
						<!-- NOTÍCIAS SECUNDÁRIA -->
						

						<?php
							if($eventos): ?>

								<div class="col-8 list-noticias-mini">
									<?php
										get_template_part( 'content-list-evento', get_post_format() );
										get_template_part( 'content-list-noticas2', get_post_format() );
									?>
								</div>

							<?php else: ?>

								<div class="col-12 list-noticias-mini">
									<div class="row row-mini item-noticias">
										<?php
											get_template_part( 'content-list-noticas3', get_post_format() );
										?>
									</div>
								</div>

							<?php endif;
						?>


					</div>
				</div>
			</div>	
			
			<div class="col-3">

				<?php get_template_part( 'sidebar', get_post_format() ); ?>

			</div>	
		</div>

	</div>
</section>

<?php /*








<section class="box-content no-padding box-msg-intro">
	
		
		<div class="vertical-center">
			<div class="content-vertical">
				
				<h2><strong>VAI COMEÇAR</strong> O<br><strong>MAIOR</strong> E <strong>MAIS BELO<br>CLÁSSICO DAS GERAIS.</strong></h2>
				<h2 class="sub-tituto">PREPARE SUA TORCIDA: VAI SER RIVALIDADE PURA!</h2>

			</div>
		</div>

		<h1>
			<span>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png<?php //the_field('logo_header', 'option'); ?>" alt="<?php //the_field('titulo', 'option'); ?>">
			</span>
		</h1>	
</section>

<header>
	<div class="container">
		<div class="cadastre-votar">
			Cadastre-se para votar <button class="button" type="button">CADASTRAR!</button>
		</div>
	</div>
</header>

<section class="intro-inscricao">
	<div class="container">
		<div class="cadastre-candidata">
			<button class="button grande cadastro-candidata" type="button">QUERO ME CANDIDATAR!</button>
			<a href="javascript:" class="leia-regulamento">Leia o regulamento<i class="fas fa-chevron-right"></i></a>
		</div>

		<p class="center">Não é uma candidata? <a href="">Cadastre-se</a> e fique por dentro do que rola por aqui!</p>
	</div>
</section>

<div class="modal off" id="cadastro-candidata">
	<div class="vertical-center">
		<div class="content-vertical">

			<div class="content-modal">
				<span class="close-modal">
					<i class="fas fa-times"></i>
				</span>

				<div class="modal-scroll">

					<div class="header-modal">
						<h2>QUERO ME CANDIDATAR!</h2>
						<h2 class="sub-tituto">VOCÊ É A MAIS BELA DAS TORCIDAS?</h2>
					</div>

					<div class="body-modal">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id dui nisl. Suspendisse aliquet purus eget risus malesuada, sit amet tempus leo vestibulum. Duis lobortis sem non ipsum semper sollicitudin.</p>
						<form id="inscricao">
							<fieldset class="col2">
								<input type="text" name="" placeholder="Qual o seu nome?">
							</fieldset>
							<fieldset class="col2 right">
								<input type="text" name="" placeholder="Data de nasc.">
							</fieldset>

							<fieldset class="col2">
								<input type="text" name="" placeholder="Seu peso">
							</fieldset>
							<fieldset class="col2 right">
								<input type="text" name="" placeholder="Sua altura">
							</fieldset>

							<fieldset class="col2">
								<input type="text" name="" placeholder="Qual o seu e-mail?">
							</fieldset>
							<fieldset class="col2 right">
								<input type="text" name="" placeholder="Qual seu telefone? Whatsapp?">
							</fieldset>

							<fieldset class="">
								<button class="button grande" type="button">PRONTO! ENVIAR MEU CADASTRO</button>
							</fieldset>
						</form>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<div class="modal off" id="leia-regulamento">
	<div class="vertical-center">
		<div class="content-vertical">

			<div class="content-modal">
				<span class="close-modal">
					<i class="fas fa-times"></i>
				</span>

				<div class="modal-scroll">

					<div class="header-modal">
						<h2>REGULAMENTO</h2>
						<h2 class="sub-tituto">CONCURSO "A MAIS BELA DAS TORCIDAS"!</h2>
					</div>

					<div class="body-modal">
						<h3>REGULAMENTO</h3>
						<p>O concurso A Mais Bela das Torcidas é aberto a mulheres, com idade entre 16 e 27 anos, residentes em Minas Gerais e, claro, que sejam torcedoras ou de Atlético ou Cruzeiro.</p>

						<h3>INSCRIÇÕES</h3>

						<p>As inscrições iniciam-se no dia <strong>20 de junho</strong> e vão até o dia <strong>28 do mesmo mês</strong> (podendo ser prorrogado ou não, de acordo com o entendimento dos organizadores). Ao término deste prazo uma comissão pré-julgadora irá selecionar/definir dentre as  candidatas inscritas quais irão participar da votação online.</p>
						<p>Serão selecionadas, inicialmente, 06 Atleticanas e 06 Cruzeirenses que vão disputar o título de A Mais Bela das Torcidas!</p>

						<h3>COMO OCORRERÃO</h3>
						<p>Serão aceitas apenas inscrições feitas por meio do formulário existente no site do concurso – amaisbeladastorcidas.com.br, onde a candidata envia seus dados pessoais, contatos e fotos (foto de rosto e de corpo inteiro). Pede-se que tais fotos sejam enviadas de forma natural, sem filtros ou efeitos e que sejam feitas, de preferência, com fundo neutro (sem senários, etc). Não é necessário enviar, inicialmente, fotos com a camisa de seu time do coração (tendo em vista que o objetivo é para uma pré-seleção). É IMPORTANTE que a foto seja recente. Todos os campos do formulário devem ser preenchidos.</p>

						<h3>IMPORTANTE</h3>
						<p>Candidatas menores de idade (caso sejam selecionadas para participar do concurso) devem ter autorização dos pais ou responsáveis. E em ambos os casos (menor de idade ou não) deve-se, também, assinar um termo de uso da imagem exclusivamente para o concurso.</p>

						<h3>ETAPAS DO CONCURSO</h3>
						<p>O concurso se dividirá em 03 partes: fase eliminatória, semi-final e final. Para cada etapa, as candidatas serão orientadas de como ocorrerá o processo de votação, divulgação e acesso para a próxima fase.</p>

						<h3>FOTOS UTILIZADAS NO CONCURSO</h3>
						<p>Diferentemente de muitos neste seguimento, o A Mais Bela das Torcidas tem por objetivo valorizar a beleza feminina de maneira a não levar para o seminu, ou de forma vulgarizada, as fotos de nossas participantes – tornando o concurso acessível e agradável a todas as faixas etárias.</p>

						<h3>PREMIAÇÃO</h3>
						<p>A vencedora do concurso receberá R$1500,00 em prêmios (dentre eles um book fotográfico especial) e a vice, R$500,00 em prêmios.</p>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){	  
		jQuery('.cadastro-candidata').click(function(){
			jQuery('#cadastro-candidata').removeClass('off');
		});

		jQuery('.leia-regulamento').click(function(){
			jQuery('#leia-regulamento').removeClass('off');
		});

		jQuery('.close-modal').click(function(){
			jQuery('.modal').addClass('off');
		});
	});
</script>

*/ ?>
<?php get_footer(); ?>

<?php /*
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

	<a href="#continue_sonhando" class="link_ancora" title="Continue sonhando">
		<i class="fa fa-angle-down" aria-hidden="true"></i>
		<span>CONTINUE SONHANDO</span>
	</a>
</section>

<section class="box-content box-content-blog">
	<span id="continue_sonhando" class="link_page_ancora"></span>
	<div class="container">

		<p class="sub-tituto borda-efeito">Nós tiramos do papel sua ideia e concretizamos seus sonhos</p>

		<?php if( have_rows('ico_page_superior') ): ?>
			<ul class="ico-page">
				<?php while ( have_rows('ico_page_superior') ) : the_row(); ?>

					<li>
						<img src="<?php the_sub_field('icone'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
						<span><?php the_sub_field('titulo'); ?></span>
					</li>

				<?php endwhile; ?>
			</ul>
		<?php endif; ?>	

		<?php
			$prod_list = get_posts(
				array(
					'posts_per_page' => 5,
					'post_type' => 'projetos'
				)
			);

			if(count($prod_list) > 0){ ?>
				<div class="grid">
					<div class="grid-sizer"></div>

					<?php foreach ( $prod_list as $produto ) { $terms = wp_get_post_terms( $produto->ID, 'categoria_projeto' ); ?>

						<div class="grid-item">
							<div class="">
								<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
									<article class="item">

										<img src="<?php the_field('imagem_listagem', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

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

					<?php } ?>

				</div>
			<?php }
		?>		

		<p class="sub-tituto borda-efeito">Trabalhamos para transformar ideias em serviços e produtos referências em seu segmento.</p>
		
		<?php if( have_rows('ico_page_inferior') ): ?>
			<ul class="ico-page ico-page-inferior">
				<?php while ( have_rows('ico_page_inferior') ) : the_row(); ?>

					<li>
						<img src="<?php the_sub_field('icone'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
						<span><?php the_sub_field('titulo'); ?></span>
					</li>

				<?php endwhile; ?>
			</ul>
		<?php endif; ?>	
	
	</div>
</section>

<section class="box-content box-msg" style="background-image: url('<?php the_field('imagem_destaque'); ?>');">
	<div class="box-height">
		<div class="box-texto">
			
			<p class="texto"><?php the_field('texto_destaque'); ?></p>
			<?php if(get_field('sub_texto_destaque')){ ?>
				<p class="sub-texto"><?php the_field('sub_texto_destaque'); ?></p>
			<?php } ?>

		</div>
	</div>
</section>

<section class="box-content box-sobre sombra">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cafe.png" class="ico_cafe" alt=""/>
		<p class="sub-tituto borda-efeito">Trabalhamos para transformar ideias em serviços e produtos referências em seu segmento.</p>
		<a href="#" class="button" title="Quero Agendar">Quero Agendar</a>

		<p class="sub-tituto sub-titulo-icone borda-efeito">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_news.png" class="" alt=""/>
			Newsletter
		</p>

		<form class="news" action="javascript:">
			<input type="text" name="email_news" placeholder="Escreva seu email aqui...">
			<button class="news"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/button_news.png" class="" alt=""/></button>
		</form>

	</div>
</section>



<script type="text/javascript">
	jQuery(document).ready(function(){	    

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#texto').val();
			var para = '<?php get_field('email', 'option'); ?>';
			var nome_site = '<?php get_field('titulo', 'option'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});
		
	});

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

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.pkgd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.js" type="text/javascript"></script>
<script type="text/javascript">
	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry();
	});  
</script>

*/ ?>