<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */



/* HABILITAR / DESABILITAR */
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );

// Unable admin bar
add_filter('show_admin_bar', '__return_false');


add_post_type_support( 'post', 'excerpt' );
// tn custom excerpt length
function tn_custom_excerpt_length( $length ) {
	return 12;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );



// remove itens padrões
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	//remove_post_type_support( 'post', 'thumbnail' );

	//remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}

// REMOVE PARENT PAGE
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// Remove tags
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );


// ENCURTADOR DE URL
function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}


// SIZE IMAGES MIDIA
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'detalhe-post', 1170, 508, true ); // (cropped)
    add_image_size( 'mini-vertical-post', 320, 568, true ); // (cropped)
    add_image_size( 'mini-post', 415, 245, true ); // (cropped)
}


// muda nome post
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Mídias/Insight';
    $submenu['edit.php'][5][0] = 'Todos os posts';
    $submenu['edit.php'][10][0] = 'Adicionar post';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Mídias/Insight';
    $labels->singular_name = 'Mídias/Insight';
    $labels->add_new = 'Adicionar post';
    $labels->add_new_item = 'Adicionar post';
    $labels->edit_item = 'Editar post';
    $labels->new_item = 'Post';
    $labels->view_item = 'Ver post';
    $labels->search_items = 'Buscar post';
    $labels->not_found = 'Nenhum post encontrado';
    $labels->not_found_in_trash = 'Nenhum post encontrado na lixeira';
    $labels->all_items = 'Todos os posts';
    $labels->menu_name = 'Mídias/Insight';
    $labels->name_admin_bar = 'Mídias/Insight';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

/* PAGINAS CONFIGURAÇÕES */ 
//if( function_exists('acf_add_options_page') ) {

	/*acf_add_options_page(array(
		'page_title' 	=> 'Slide Home',
		'menu_title'	=> 'Slide Home',
		'menu_slug' 	=> 'slide-home',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-collapse'
	));*/

	/*acf_add_options_page(array(
		'page_title' 	=> 'Formulários',
		'menu_title'	=> 'Formulários',
		'menu_slug' 	=> 'formularios',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-comments'
	));*/
	
	/*acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Projetos',
		'menu_title'	=> 'Projetos',
		'parent_slug'	=> 'configuracoes-geral',
	));
}*/

/* PAGINAÇÃO */
function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

// NOVOS POST TYPES 


// ÁREAS DE ATUAÇÃO
add_action( 'init', 'create_post_type_areasatuacao' );
function create_post_type_areasatuacao() {

	$labels = array(
	    'name' => _x('Áreas de Atuação', 'post type general name'),
	    'singular_name' => _x('Áreas de Atuação', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Post'),
	    'add_new_item' => __('Addicionar novo Post'),
	    'edit_item' => __('Editar Post'),
	    'new_item' => __('Novo Post'),
	    'all_items' => __('Todos os Post'),
	    'view_item' => __('Visualizar Post'),
	    'search_items' => __('Procurar Post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Áreas de Atuação'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-desktop',
	    'supports' => array('title','editor')
	  );

    register_post_type( 'areas-atuacao', $args );
}

// NOSSOS ADVOGADOS
add_action( 'init', 'create_post_type_nossosadvogados' );
function create_post_type_nossosadvogados() {

	$labels = array(
	    'name' => _x('Nossos Advogados', 'post type general name'),
	    'singular_name' => _x('Nossos Advogados', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Advogado'),
	    'add_new_item' => __('Addicionar novo Advogado'),
	    'edit_item' => __('Editar Advogado'),
	    'new_item' => __('Novo Advogado'),
	    'all_items' => __('Todos os Advogados'),
	    'view_item' => __('Visualizar Advogado'),
	    'search_items' => __('Procurar Advogado'),
	    'not_found' =>  __('Nenhum advogado encontrado.'),
	    'not_found_in_trash' => __('Nenhum advogado encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Nossos Advogados'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-businessman',
	    'supports' => array('title','editor','thumbnail')
	  );

    register_post_type( 'nossos-advogados', $args );
}


/*
// FORUM
add_action( 'init', 'create_post_type_forum' );
function create_post_type_forum() {

	$labels = array(
	    'name' => _x('Forum', 'post type general name'),
	    'singular_name' => _x('Forum', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Post'),
	    'add_new_item' => __('Addicionar novo Post'),
	    'edit_item' => __('Editar Post'),
	    'new_item' => __('Novo Post'),
	    'all_items' => __('Todos as Posts'),
	    'view_item' => __('Visualizar Post'),
	    'search_items' => __('Procurar Post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Forum'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-format-chat',
	    'supports' => array('title','excerpt','editor')
	  );

    register_post_type( 'forum', $args );
}

// CATEGORIA FORUM
add_action( 'init', 'create_taxonomy_categoria_forum' );
function create_taxonomy_categoria_forum() {

	$labels = array(
	    'name' => _x( 'Categoria', 'taxonomy general name' ),
	    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Procurar categoria' ),
	    'all_items' => __( 'Todas as categorias' ),
	    'parent_item' => __( 'Categoria pai' ),
	    'parent_item_colon' => __( 'Categoria pai:' ),
	    'edit_item' => __( 'Editar categoria' ),
	    'update_item' => __( 'Atualizar categoria' ),
	    'add_new_item' => __( 'Adicionar nova categoria' ),
	    'new_item_name' => __( 'Nova categoria' ),
	    'menu_name' => __( 'Categoria' ),
	);

    register_taxonomy( 'categoria_forum', array( 'forum' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
		'has_archive' => 'forum',
		'rewrite' => array(
		    'slug' => 'forum',
		    'with_front' => false,
			),
        )
    );
}
*/


$producao = false;
if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, /*#menu-appearance, #menu-plugins, */#menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator, 
		#menu-appearance li:nth-child(1), 
		#menu-appearance li:nth-child(2), 
		#menu-appearance li:nth-child(3) 
		{
			display: none!important;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-comments").remove();
				/*jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();*/
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();

				jQuery(".user-rich-editing-wrap").remove();
				jQuery(".user-admin-color-wrap").remove();
				jQuery(".user-comment-shortcuts-wrap").remove();
				jQuery(".user-admin-bar-front-wrap").remove();
				jQuery(".user-language-wrap").remove();

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();

				jQuery("#menu-appearance li:nth-child(1)").remove();
				//jQuery("#menu-appearance li:nth-child(2)").remove();
				//jQuery("#menu-appearance li:nth-child(3)").remove();
			});
		</script>
	  ';
	}
}


?>