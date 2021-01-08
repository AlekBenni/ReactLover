<?php 

/*
 * Подключение скриптов и стилей
 */

require_once __DIR__ . '/Test_Menu.php';


function test_scripts(){
    wp_enqueue_style('test-bootstrapcss', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('test-style', get_stylesheet_uri());

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), false, true);
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script('test-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), false, true);
    wp_enqueue_script('test-bootstrapjs', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'test_scripts');

    // Регистрируем размеры картинок
function test_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_image_size( 'my-thumb', 200, 200 );
    add_theme_support('custom-logo', array(
        'width' => '50',
        'height' => '50',
    ));

        //Цвета и бэкгроунд
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => get_template_directory_uri() . '/assets/image/background.jpg',
    ));

        //Шапка сайта
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/image/header.jpg',
        'width' => '2000',
        'height' => '1300',
    ));

    register_nav_menus( array(
        'header_menu' => 'Меню в шапке',
        'footer_meny' => 'Меню в футере'
    ) );
}
add_action( 'after_setup_theme', 'test_setup' );

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav> ';
}

// выводим пагинацию
the_posts_pagination( array(
	'end_size' => 2,
) ); 

// Регистрируем SideBar
function test_widgets_init(){
    register_sidebar( array(
        'name' => 'Сайдбар справа',
        'id' => 'right-sidebar',
        'description' => 'Область для виджетов в сайдбаре справа',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        'before_widget' => '<div class = "my_sidebar">',
        'after_widget' => '</div>'
    ) );
}
add_action('widgets_init', 'test_widgets_init');










?>