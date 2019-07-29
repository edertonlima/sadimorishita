<div class="sidebar">
	
	<?php if (!is_page('sair')) : ?>
		<div class="box-sidebar bg-cinza">
			<h3 class="border center">TORNE-SE UM ASSOCIADO</h3>
			<p class="center">Ao associar-se, você estará contribuindo para o fortalecimento da nossa classe, além de poder aproveitar os vários benefícios que oferecemos aos nossos sócios.</p>
			<a href="#" class="button btn-full vermelho margin-top-20">QUERO SER SÓCIO!</a>
		</div>
	<?php endif; ?>

	<?php if (!is_page('sair')) : ?>
		<div class="box-sidebar border">
			<h3 class="border mid"><span>ATENDIMENTO</span></h3>
			<div class="info-contato">
				<span class="legend-footer">TELEFONE</span>
				<span class="info-footer"><em>(62)</em> 3218-2914</span>

				<span class="legend-footer margin-top-15">E-MAIL</span>
				<span class="info-footer email">contato@aeago.org.br</span>
			</div>
		</div>

		<div class="box-sidebar">
			<div class="redes-sociais">
				<span>SIGA-NOS</span>
				<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="" title="FACEBOOK"><i class="fab fa-facebook-square"></i></a>
				<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="" title="INSTAGRAM"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
<?php endif; ?>
	
	<?php if (!is_page('sair')) :

		// PROFISSIONAL EM DESTAQUE
		get_template_part( 'content-associado-destaque', get_post_format() );

	endif; ?>

	<div class="box-sidebar border">
		<h3 class="border mid"><span>CATEGORIAS</span></h3>
		<ul class="categorias">
			<li><a href="#"><i class="fas fa-chevron-right"></i>Agricultura</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Agronegócio</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Ciência</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Energia</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Florestal</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Gestão Rural</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Mercado</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Política</a></li>
			<li><a href="#"><i class="fas fa-chevron-right"></i>Tecnologia</a></li>
		</ul>	
	</div>

	<div class="box-sidebar bg-cinza margin-top-30">
		<h3 class="border center">NEWSLETTER</h3>
		<p class="center">Digite seu e-mail abaixo para assinar o nosso informativo e ficar por dentro de todas as novidades!</p>
		<a href="#" class="button btn-full laranja margin-top-20">ASSINAR</a>
	</div>

	<div class="box-sidebar box-facebook">
		<div class="fb-page" data-href="https://www.facebook.com/associadosaeago/" data-tabs="" data-width="" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/associadosaeago/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/associadosaeago/">AEAGO</a></blockquote></div>
	</div>
</div>