<?php
/*
Template Name: Page plan du site
*/
?>

<?php get_header(); ?>


<?php 
    include('partials/sections/hero/'.get_field("page_config_hero_template").'.php' ); 
?>
<section class="section">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <?php echo do_shortcode("[simple-sitemap]")?>
        </div>
    </div>
</section>



<?php get_footer(); ?>