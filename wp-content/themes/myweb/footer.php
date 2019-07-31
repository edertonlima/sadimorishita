
	<footer class="footer">
		<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">
						<img class="img-footer" src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/sadimorishita_logo_footer.svg" alt="<?php //the_field('titulo', 'option'); ?>">

						<ul>
							<li class=""><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
						</ul>
					</div>

					<div class="content-vertical">
						<div class="endereco-footer">
							<h2>Escritório <strong>São Paulo</strong></h2>
							<p>Av. Maria Coelho Aguiar, 215, Bloco F, 6º andar<br>Centro Empresarial, São Paulo/SP - CEP 05804-900</p>
						</div>

						<div class="endereco-footer">
							<h2>Escritório <strong>Santo André</strong></h2>
							<p>Av. Industrial, nº 780, cj. 912<br>Santo André, Brasil – CEP 09080-500</p>
						</div>
					</div>

					<div class="content-vertical">
						<div class="info-contato">
							<h2>Fale <strong>Conosco</strong></h2>
							<span class="telefone"><em>+55 11</em> 3390-3518</span>
							<p>contato@adimorishita.com.br</p>
						</div>
					</div>
				</div>

		</div>
			

		<div class="copy">
			<div class="container">

				<div class="vertical-center">
					<div class="content-vertical">

						<?php /* <img class="img-footer" src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/sadimorishita_logo_footer.svg" alt="<?php //the_field('titulo', 'option'); ?>"> */ ?>
						<span>Sadi | Morishita Advogados. <i class="far fa-copyright"></i> Copyright <?php echo date('Y'); ?>.</span>

					</div>
					<div class="content-vertical">
						
						<ul>
							<li><a href="#" title=""><i class="fas fa-angle-right"></i> Nossos Advogados</a></li>
							<li><a href="#" title=""><i class="fas fa-angle-right"></i> Escritórios</a></li>
							<li><a href="#" title=""><i class="fas fa-angle-right"></i> Fale Conosco</a></li>
							<?php /* <li class="redes-sociais"><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
							<li class=""><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li> */ ?>
						</ul>

					</div>
				</div>

			</div>
		</div>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>