<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <title>Estérel</title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>


<!-- Color highlight configuration -->
<?php 
if(is_home()) {
    $GLOBALS['homeOpt'] = get_option('page_for_posts');
} else {
    $GLOBALS['homeOpt'] = "";
}
$classtoAdd = get_field("page_config_hero_color", $GLOBALS['homeOpt']) ? "highlight-". get_field("page_config_hero_color", $GLOBALS['homeOpt']) : ""; 

?>

<body <?php body_class($classtoAdd); ?>>

    <?php include('partials/body_begins.php'); ?>
    <div class="site-container" data-component="Scrolly">
        <header class="header wrapper" data-component="Header" data-auto-hide>
            <div class="grid-center">
                <button class="header__toggle js-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="header__brand">
                    <a href="/"><img src="<?php echo get_template_directory_uri() ?>/dist/images/logo.png"
                            alt="Logo Ville Estérel"></a>
                </div>
                <nav class="nav-primary" data-component="SubNav">
                    <ul>
                        <?php wp_nav_menu( array( 
							'theme_location' => 'main-menu',
							"container" => "",
                            "menu_class" => 'nav__item',
							'items_wrap' => '%3$s',
                            'link_before' => '<span>',
                            'link_after' => '</span>'
						) ); ?>
                    </ul>
                    <nav class="nav-secondary mobile">
                        <ul>
                            <li>
                                <a href="#" target="_blank">
                                    <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/facebook-color.svg"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href=" #">
                                    <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/temp.svg"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <!-- <a href=" #">
                                    <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/search.svg"
                                        alt="">
                                </a> -->
                            </li>
                            <?php 
                                    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 1, 'raw' => 1 ) );
                                    ?>
                            <?php if ($langs_array) : ?>
                            <?php foreach ($langs_array as $lang) : ?>
                            <?php 
                                    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 1, 'raw' => 1, 'display_names_as' => 'slug' ) );
                                    ?>
                            <?php if ($langs_array) : ?>
                            <?php foreach ($langs_array as $lang) : ?>
                            <li class="menu-item">
                                <a href="<?php echo $lang['url']; ?>">
                                    <?php echo $lang['name']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </nav>
                <nav class="nav-secondary">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/VilleEsterel" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/facebook-color.svg"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/villedesterel/" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/instagram-color.svg"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <div data-component="Search">
                                <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/search.svg"
                                    alt="">
                            </div>
                        </li>
                        <?php 
                                    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 1, 'raw' => 1, 'display_names_as' => 'slug' ) );
                                    ?>
                        <?php if ($langs_array) : ?>
                        <?php foreach ($langs_array as $lang) : ?>
                        <!-- <li class="menu-item">
                            <a href="<?php echo $lang['url']; ?>">
                                <?php echo $lang['name']; ?>
                            </a>
                        </li> -->
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>


            </div>
            <div class="search-bar">
                <?php get_search_form( true ); ?>
            </div>
        </header>