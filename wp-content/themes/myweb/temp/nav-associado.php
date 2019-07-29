<?php  if ( $_SESSION['associado']['login'] == 'ok' ): ?>
	<div class="nav-associado">
		<div class="container">
		
			<ul class="user">
				<li><span><?php echo $_SESSION['associado']['nome-completo']; ?></span></li>
				<li class="nav-link<?php if(is_single($_SESSION['associado']['id'])): echo ' ativo'; endif; ?>">
					<a href="<?php echo get_permalink($_SESSION['associado']['id']); ?>" class=""><i class="fas fa-user-tie"></i> Perfil</a>
				</li>
				<li class="nav-link<?php if( (is_archive('forum')) or (is_singular('forum')) ): echo ' ativo'; endif; ?>">
					<a href="<?php echo get_home_url(); ?>/forum" class=""><i class="far fa-comments"></i> Fórum</a>
				</li>
				<li><a href="<?php echo get_permalink(get_page_by_path('sair')); ?>" id="logout">Sair <i class="fas fa-sign-out-alt"></i></a></li>
			</ul>

		</div>
	</div>
<?php endif; //var_dump($_SESSION['associado']); ?>