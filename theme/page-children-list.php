<?php
/*
Template Name: Page liste enfant
*/
?>


<?php get_header(); ?>
<?php 
    include('partials/sections/hero/'.get_field("page_config_hero_template").'.php' ); 
?>


<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

<section class="section s-child-list">
    <div class="wrapper">
        <div class="grid-center">

            <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
            <?php 
                $hasImage = get_field('page_config_hero_image_check'); 
            ?>
            <a href="<?php the_permalink(); ?>" class="child-item">
                <div class="child-item--media">
                    <?php if($hasImage ) :
                 $image = get_field('page_config_hero_image', $GLOBALS['homeOpt']);?>

                    <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>

                    <?php endif; ?>
                </div>
                <div class="child-item--content"><?php the_title(); ?></div>
            </a>

            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>