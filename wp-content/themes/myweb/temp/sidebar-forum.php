<div class="sidebar">

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
	
	<?php if (!is_page('sair')) : ?>
		<div class="box-sidebar">
			<div class="redes-sociais">
				<span>SIGA-NOS</span>
				<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="" title="FACEBOOK"><i class="fab fa-facebook-square"></i></a>
				<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="" title="INSTAGRAM"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="box-sidebar bg-cinza margin-top-30">
		<h3 class="border center">NEWSLETTER</h3>
		<p class="center">Digite seu e-mail abaixo para assinar o nosso informativo e ficar por dentro de todas as novidades!</p>
		<a href="#" class="button btn-full laranja margin-top-20">ASSINAR</a>
	</div>

</div>