<?php
//Enlève des trucs inutile de WordPress
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// Initialisation des CPTs
include('functions/post_type.php');
// include('functions/pagination.php');
include('functions/breadcrumb.php');




/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    $manifest = json_decode(file_get_contents('dist/assets.json', true));
    $main = $manifest->main;
    wp_enqueue_style('theme', get_template_directory_uri() . "/dist/" . $main->css, false, null);
    wp_register_script( 'theme-js', get_template_directory_uri() . "/dist/" . $main->js, null, true, true);
    wp_enqueue_script('theme-js');
    $translation_array = array( 'templateUrl' => get_template_directory_uri() );
    //after wp_enqueue_script
    wp_localize_script( 'theme-js', 'config', $translation_array );
}, 100);

function change_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'change_excerpt_length', 999 );

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

/*  
function my_login_logo() { ?>
<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri();
    ?>/dist/images/logo.png);
    height: 80px;
    width: 244px;
    background-size: 244px 80px;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' ); */
// function my_acf_google_map_api( $api ){
//     $api['key'] = 'AIzaSyAj44Exu34UC34e7xyrGOURjO48FV0eBTg';
//     return $api;
// }
// add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function custom_date_range($start, $end) {
    $start = strtotime($start);
    $end = strtotime($end);
    $format = "";

    if(date('Y',$start)!=date('Y',$end)){
        $format = date_i18n('j F Y',$start) . " au " . date_i18n('j F Y',$end);
    }else{
        if(date('m',$start)!=date('m',$end)){
            $format = date_i18n('j F',$start) . " au " . date_i18n('j F Y',$end);
        }else if(date('j',$start)!=date('j',$end)){
            $format = date_i18n('j',$start) . " au " . date_i18n('j F Y',$end);
        } else{
            $format = date_i18n('j F Y',$start);
        }
    }
    return $format;
}

/* Configuration des menus */
function register_my_menus() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Menu Principal' ),
        'footer-menu' => __( 'Menu pied de page' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );