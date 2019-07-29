<?php

	if( (isset($_POST)) && (!empty($_POST['email_login'])) && (!empty($_POST['senha_login'])) ):

		$email = $_POST['email_login'];
		$senha = $_POST['senha_login'];

		$args_login = array(
			'numberposts'	=> -1,
			'post_type'		=> 'associado',
			'meta_query'	=> array(
				'relation'		=> 'AND',
				array(
					'key'		=> 'email_associado',
					'value'		=> $email,
					'compare'	=> '='
				),
				array(
					'key'		=> 'senha_associado',
					'value'		=> $senha,
					'compare'	=> '='
				),
				array(
					'key'		=> 'status_associado',
					'value'		=> 1,
					'compare'	=> '='
				)
			)
		);

		//$associado = new WP_Query( $args_login );

		if( query_posts( $args_login ) ):

			session_cache_limiter('private');
			session_cache_expire(30);

			session_start();

			while ( have_posts() ) : the_post(); 

				$_SESSION['associado']['id'] = $post->ID;
				$_SESSION['associado']['nome-completo'] = $post->post_title;
				$_SESSION['associado']['nome'] = get_field('nome_associado');
				$_SESSION['associado']['sobrenome'] = get_field('sobrenome_associado');
				$_SESSION['associado']['email'] = $email;
				$_SESSION['associado']['status'] = get_field('status_associado');
				$_SESSION['associado']['login'] = 'ok';

				header("Location: " . get_permalink($id_associado));

			endwhile;
			wp_reset_query();

			//echo 'SESSÃO ATIVA PÓS LOGIN <br>';

		else:

			session_start();
			//echo 'Usuário ou Senha inválida';

			session_destroy();
			unset( $_SESSION );
			
			$_SESSION['associado']['login'] = 'erro';
			if(get_post_type() == 'forum'):
				header("Location: " . get_home_url());
			endif;

		endif;

		wp_reset_query();
	
	else:

		session_start();

		if (is_page('sair')) :

			//echo 'SESSÃO FINALIZADA';

			session_destroy();
			unset( $_SESSION );

			$_SESSION['associado']['login'] = 'finalizado';
			if(get_post_type() == 'forum'):
				header("Location: " . get_home_url());
			endif;

		else :

			if ( (isset($_SESSION)) && (!empty($_SESSION['associado'])) ):

				$_SESSION['associado']['login'] = 'ok';
				//echo 'SESSÃO ATIVA <br>';

				$id_associado = $_SESSION['associado']['id'];
				$nome_comp_associado = $_SESSION['associado']['nome-completo'];
				$nome_associado = $_SESSION['associado']['nome'];
				$sobrenome_associado = $_SESSION['associado']['sobrenome'];
				$email_associado = $_SESSION['associado']['email'];
				$status_associado = $_SESSION['associado']['status'];

			else :
			
				session_start();
				//echo 'SESSÃO FINALIZADA';
				
				session_destroy();
				unset( $_SESSION );

				$_SESSION['associado']['login'] = 'finalizado';
				if(get_post_type() == 'forum'):
					header("Location: " . get_home_url());
				endif;

			endif;

		endif;

	endif;

?>