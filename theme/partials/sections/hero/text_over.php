<?php 
    $hasImage = get_field('page_config_hero_image_check', $GLOBALS['homeOpt']); 
?>
<section class="section s-hero">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <?php if($hasImage ) :
                 $image = get_field('page_config_hero_image', $GLOBALS['homeOpt']);?>
            <div class="hero__media">
                <?php if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="hero__content" data-scrolly="fromLeft">
                <p class="title-quaterny"> <?php
            if(function_exists('yoast_breadcrumb')) {
                echo crumb_nav(get_crumb_array());			
            }
        ?></p>
                <?php if(get_field('page_config_hero_title', $GLOBALS['homeOpt']) ) :?>
                <h1 class="title-primary"><?php the_field('page_config_hero_title', $GLOBALS['homeOpt']); ?></h1>
                <?php else :?>
                <h1 class="title-primary"><?php the_title(); ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>