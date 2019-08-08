<article class="detalhe-post">
	<header>
		<h2 class="center">Quem <strong>Somos</strong></h2>
		<p class="subtitulo center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
	</header>

	<div class="content row">
		<div class="col-6">
			<h2 class="tit-medio">Somos <strong>Excelência</strong></h2>
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

	<div class="content row">
		<div class="col-4">
			<h3 class="">MISSÃO</h3>
			<p class="justify">
				Assessorar, orientar e auxiliar nossos clientes, oferecendo serviços jurídicos de qualidade nas áreas de atuação do escritório com as melhores soluções.
			</p>
		</div>
		<div class="col-4">
			<h3 class="">VISÃO</h3>
			<p class="justify">
				Reconhecimento no mercado como um escritório jurídico de excelência nas áreas de atuação, tornando-se referência. 
			</p>
		</div>
		<div class="col-4">
			<h3 class="">VALORES</h3>
			<p class="justify">
				Ser uma instituição comprometida com as causas de seus clientes, atuando sempre dentro das normas éticas, de conduta e transparência e comprometimento com os seus clientes em buscar da melhor solução jurídica.
			</p>
		</div>
	</div>
</article>