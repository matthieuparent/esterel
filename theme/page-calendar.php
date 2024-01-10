<?php
/*
Template Name: Page calendrier
*/
?>
<?php get_header(); ?>
<section class="section s-hero s-hero--no-content">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <div class="hero__media">
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/temp/hero.jpg"
                    alt="Logo Ville Estérel">
            </div>
        </div>
    </div>
</section>
<section class="section s-title">
    <div class="wrapper">
        <div class="grid-center">
            <div class="title__content">
                <p> <?php
            if(function_exists('yoast_breadcrumb')) {
                echo crumb_nav(get_crumb_array());			
            }
        ?></p>
                <h1 class="title-primary"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="section s-calendar">
    <div class="wrapper">
        <div class="grid-center">
            <?php echo do_shortcode('[MEC id="28"]') ?>
        </div>
    </div>

</section>
<?php get_footer(); ?>