<?php
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_action( 'wp_enqueue_scripts', 'realty_scripts' );
function realty_scripts() {
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array('reset'));
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.min.css', array('reset'));
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array('reset', 'bootstrap'));
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array('main'));    
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}

add_image_size( 'thumbnail-md', 244, 244, true );
add_image_size( 'thumbnail-sm', 80, 80, true );

function realty_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'current_screen', 'realty_add_editor_styles' );

add_theme_support( 'post-thumbnails' );
// add_theme_support( 'menus' );


// Длина короткого описания
function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', function($more) {
    return '...';
});
add_action('init', 'register_post_types');

function register_post_types(){
    register_post_type('estate', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Объявления', // основное название для типа записи
            'singular_name'      => 'Объявление', // название для одной записи этого типа
            'add_new'            => 'Добавить объявление', // для добавления новой записи
            'add_new_item'       => 'Добавление объявления', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование объявления', // для редактирования типа записи
            'new_item'           => 'Новое объявление', // текст новой записи
            'view_item'          => 'Просмотреть объявления', // для просмотра записи этого типа.
            'search_items'       => 'Искать объявления', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name'          => 'Объявления', // название меню
        ),
        'public'              => true,
        'show_ui'             => true,
        'menu_icon'           => 'dashicons-building',
        'supports'            => array('title','editor','thumbnail') ,
        'has_archive'         => 'estate'
    ));    
}



function add_featured_galleries_to_ctp($post_types) {
    array_push($post_types, 'estate'); 
    return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp' );

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy(){
	// заголовки
	// весь список: http://wp-kama.ru/function/get_taxonomy_labels
	$labels = array(
		'name'              => 'Типы недвижимости',
		'singular_name'     => 'Тип недвижимости',
		'search_items'      => 'Искать типы недвижимости',
		'all_items'         => 'Все типы',
		'parent_item'       => 'Родительский тип недвижимости',
		'parent_item_colon' => 'Родительский тип недвижимости:',
		'edit_item'         => 'Редактировать тип недвижимости',
		'update_item'       => 'Обновить тип недвижимости',
		'add_new_item'      => 'Добавить тип недвижимости',
		'new_item_name'     => 'Название нового типа недвижимости',
		'menu_name'         => 'Тип недвижимости',
	); 
	// параметры
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true,
		'meta_box_cb'           => null, 
	);
	register_taxonomy('estate_type', array('estate'), $args );

	$labels2 = array(
		'name'              => 'Категории',
		'singular_name'     => 'Категория',
		'search_items'      => 'Искать категории',
		'all_items'         => 'Все категории',
		'parent_item'       => 'Родительская категория',
		'parent_item_colon' => 'Родительская категория:',
		'edit_item'         => 'Редактировать категорию',
		'update_item'       => 'Обновить категорию',
		'add_new_item'      => 'Добавить категорию',
		'new_item_name'     => 'Название новой категории',
		'menu_name'         => 'Категории',
	); 
	// параметры
	$args2 = array(
		'labels'                => $labels2,
		'hierarchical'          => true,
		'meta_box_cb'           => null,
		'has_archive'         => 'estate-cat'
	);
	register_taxonomy('estate_category', array('estate'), $args2 );
}

$GLOBALS['my_query_filters'] = array( 
	'field_1'	=> 'deal',
	'field_2'	=> 'estate-type',
	// 'field_3'	=> 'price',
	// 'field_4'	=> 'square',
	'field_5'	=> 'room_count',
	'field_6'	=> 'kh_region',
	'field_7'	=> 'region_place',
);


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {
	
	// bail early if is in admin
	if( is_admin() ) {
		
		return;
		
	}
	
	
	// get meta query
	$meta_query = $query->get('meta_query');
	$paged = $query->get('paged');
	
	// loop over filters
	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
		
		// continue if not found in url
		if( empty($_GET[ $name ]) ) {
			
			continue;
			
		}
		
		
		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);
		
		
		// append meta query
    	$meta_query[] = array(
            'key'		=> $name,
            'value'		=> $value,
            'compare'	=> 'IN',
        );
        
	}

	if (!empty($_GET['kh_street'])) {
		$meta_query[] = array(
            'key'		=> 'kh_street',
            'value'		=> $_GET['kh_street'],
            'compare'	=> 'LIKE',
        );
	}


	if (!empty($_GET['price_max']) || !empty($_GET['price_min'])) {
		if (empty($_GET['price_max'])) {
			$max_price = 9999999999;			
		} else {
			$max_price = (int) $_GET['price_max'];
		}
		if (empty($_GET['price_min'])) {
			$min_price = 0;			
		} else {
			$min_price = (int) $_GET['price_min'];			
		}

		$meta_query[] = array(
            'key'		=> 'price',
            'value'		=> array($min_price, $max_price),
            'compare'	=> 'BETWEEN',
        );
	} 
	if (!empty($_GET['square_max']) || !empty($_GET['square_min'])) {
		if (empty($_GET['square_max'])) {
			$max_square = 9999999999;			
		} else {
			$max_square = (int) $_GET['square_max'];
		}
		if (empty($_GET['square_min'])) {
			$min_square = 0;			
		} else {
			$min_square = (int) $_GET['square_min'];			
		}

		$meta_query[] = array(
            'key'		=> 'square',
            'value'		=> array($min_square, $max_square),
            'compare'	=> 'BETWEEN',
            'type' => 'NUMERIC',
        );
	} 
	if (!empty($_GET['rooms_max']) || !empty($_GET['rooms_min'])) {
		if (empty($_GET['rooms_max'])) {
			$max_rooms = 9999999999;			
		} else {
			$max_rooms = $_GET['rooms_max'];
		}
		if (empty($_GET['rooms_min'])) {
			$min_rooms = 0;			
		} else {
			$min_rooms = $_GET['rooms_min'];			
		}

		$meta_query[] = array(
            'key'		=> 'room_count',
            'value'		=> array($min_rooms, $max_rooms),
            'compare'	=> 'BETWEEN',
            'type' => 'NUMERIC',
        );
	} 
	if(!empty($_GET['sort'])){
		switch ($_GET['sort']) {
			case 'new':
				$query->set('orderby', 'date');
				$query->set('order', 'DESC');
				break;

			case 'price_desc':
				$query->set('orderby', 'meta_value_num');
				$query->set('meta_key', 'price');	 
				$query->set('order', 'DESC'); 
				break;

			case 'price_asc':
				$query->set('orderby', 'meta_value_num');
				$query->set('meta_key', 'price');
				$query->set('order', 'ASC'); 
				break;
			
			default:
				$query->set('orderby', 'date');
				$query->set('order', 'DESC');
				break;
		}
	}

	$query->set('posts_per_page', '5'); 
	$query->set('paged', $paged );
	
	// update meta query
	$query->set('meta_query', $meta_query);

}
/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}

// [info-block][/info-block]
function infoblock_shortcode( $atts, $content = null ) {
  
  extract( shortcode_atts( array(
  'title' => 'Информационный блок'  
  ), $atts ) );
  
  return '<div class="info-block"><div class="info-block-header closed">' . $title . '</div><div class="info-block-body">' . $content . '</div></div>';
}
add_shortcode( 'info-block', 'infoblock_shortcode' );

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'estate-title';
 
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
    $my_attr2 = 'estate-link';
	 
    if ( isset( $atts[$my_attr2] ) ) {
        $out[$my_attr2] = $atts[$my_attr2];
    }
    
    return $out;
}