
	<footer class="footer">
		<nav class="nav">
			<ul>
				<li class="">
					<a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a>
				</li>

				<li class="submenu">
					<a href="<?php //echo get_permalink(get_page_by_path('sobre')); ?>" title="SOBRE">SOBRE <i class="fas fa-chevron-down"></i></a>
				</li>

				<li class="">
					<a href="<?php //echo get_home_url(); ?>" title="CURSOS">CURSOS</a>
				</li>

				<li class="">
					<a href="<?php //echo get_permalink(get_page_by_path('co-found')); ?>" title="EVENTOS">EVENTOS</a>
				</li>

				<li class="">
					<a href="<?php //echo get_home_url(); ?>" title="NOTÍCIAS">NOTÍCIAS</a>
				</li>

				<li class="">
					<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" title="CONTATO">CONTATO</a>
				</li>

				<?php if ( $_SESSION['associado']['login'] != 'ok' ): ?>
					<li class="">
						<a href="<?php //echo get_permalink(get_page_by_path('contato')); ?>" class="button associar-se" title="ASSOCIAR-SE">ASSOCIAR-SE</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>

		<div class="content-footer">
			<div class="container">
				<div class="row">
					
					<div class="col-6">
						<img class="img-footer" src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/logo-aeago-footer.png" alt="<?php //the_field('titulo', 'option'); ?>">
						<div class="endereco-footer">
						<span class="legend-footer">ENDEREÇO</span>
						<p>Rua 220, Nº 805, Setor Leste Universitário, Goiânia – GO<br>CEP 74603-140</p>
						</div>
					</div>
					<div class="col-3">
						<div class="info-contato">
							<span class="legend-footer">TELEFONE</span>
							<span class="info-footer"><em>(62)</em> 3218-2914</span>
						</div>
					</div>
					<div class="col-3">
						<div class="info-contato">
							<span class="legend-footer">E-MAIL</span>
							<span class="info-footer email">contato@aeago.org.br</span>
						</div>
					</div>
				</div>
				
				<?php /*<div class="row">

					<?php if( have_rows('redes_sociais','option') ): ?>
						<div class="redes">						
							<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

								<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
									<img src="<?php the_sub_field('icone','option'); ?>" alt="<?php the_field('nome', 'option'); ?>">
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<div class="tel_footer">
						<span><?php the_field('telefone_1', 'option'); ?></span>
						<?php
							if(get_field('telefone_2', 'option')){ ?>
								<span><?php the_field('telefone_2', 'option'); ?></span>
							<?php }
						 ?>
					</div>
					<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>" class="logo_footer">
					
				</div>*/?>
			</div>
		</div>

		<p class="copy"><i class="far fa-copyright"></i><?php echo date('Y'); ?>. Todos os direitos reservados.</p>
	</footer>

	<div class="modal <?php if ( $_SESSION['associado']['login'] != 'erro'): echo 'off'; endif; ?>" id="modal-login">
		<div class="vertical-center">
			<div class="content-vertical">

				<div class="content-modal">
					<span class="close-modal">
						<i class="fas fa-times"></i>
					</span>

					<div class="modal-scroll">

						<div class="header-modal">
							<h2>MINHA ÁREA!</h2>
							<h2 class="sub-tituto">Ainda não é um associado? <a href="#" class="link">Clique aqui!</a></h2>

							<?php if ( $_SESSION['associado']['login'] == 'erro'): ?>
								<p class="msg-form erro"><strong>Algo não está certo <i class="far fa-frown"></i></strong>Por favor, certifique se os dados estão corretos e tente novamente.</p>
							<?php endif; ?>
						</div>

						<div class="body-modal">
							<form id="login" action="<?php echo get_home_url(); ?>/associado" method="post">
								<fieldset class="col2">
									<input type="text" name="email_login" placeholder="Seu E-mail">
								</fieldset>
								<fieldset class="col2 right">
									<input type="text" name="senha_login" id="senha_login" placeholder="Sua Senha">
								</fieldset>

								<fieldset class="">
									<button class="button grande vermelho" type="submit">ENTRAR</button>
									<span class="txt-legenda-btn">Não lembra sua senha? <a href="#" class="link"> Clique aqui!</a></span>
								</fieldset>
							</form>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>	

	<?php wp_footer(); ?>

	<script type="text/javascript">
		jQuery(document).ready(function(){	

			// ABRE MODAL LOGIN
			jQuery('#btn-login').click(function(){
				jQuery('#modal-login').removeClass('off');
			});

			jQuery('#senha_login').focus(function(){
				if(jQuery(this).val() == ''){
					jQuery(this).attr('placeholder','');
					jQuery(this).val('');
					jQuery(this).attr('type','password');
				}
			});

			jQuery('#senha_login').focusout(function(){
				if(jQuery(this).val() == ''){
					jQuery(this).attr('placeholder','Sua Senha');
					jQuery(this).val('');
					jQuery(this).attr('type','text');
				}
			});

			/*jQuery('#senha_login').change(function(){
				if(jQuery(this).val() == ''){
					jQuery(this).attr('type','text');
					jQuery(this).attr('placeholder','text').val('Sua Senha');
				}
			});*/

			/*jQuery('.leia-regulamento').click(function(){
				jQuery('#leia-regulamento').removeClass('off');
			});*/

			jQuery('.close-modal').click(function(){
				jQuery('.modal').addClass('off');
			});
		});
	</script>

</body>
</html>

<?php
	//var_dump($_SESSION['associado']);
?>
