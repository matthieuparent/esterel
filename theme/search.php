<?php get_header(); ?>
<?php 

    $hasImage = get_field('page_config_hero_image_check',  $GLOBALS['homeOpt']); 
        $color = get_field("page_config_hero_color", $GLOBALS['homeOpt']);

?>
<section class="section s-hero s-hero--no-content<?php echo (!$hasImage) ? ' s-hero--no-image' : '';?>">
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
        </div>
    </div>
</section>
<div class="section s-title<?php echo ($color) ? ' s-color-'.$color : '';?>">
    <div class="wrapper">
        <div class="grid-center">
            <div class="title__content" data-scrolly="fromLeft">
                <p> <?php
            if(function_exists('yoast_breadcrumb')) {
                echo crumb_nav(get_crumb_array());			
            }
        ?></p>
                <h1 class="title-primary">Recherche</h1>
            </div>
        </div>
    </div>

</div>


<div class="section s-search">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <h2 class="title-tertiary highlight" data-scrolly="fromLeft">Résultats de recherche pour:
                <i><?php the_search_query(); ?></i>
            </h2>
            <div class="questions">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="question <?php echo has_post_thumbnail() ? '' : ' full';?>"
                    data-scrolly="fromBottom">
                    <?php if( has_post_thumbnail() ): ?>
                    <div class="question__image">

                        <?php the_post_thumbnail(); ?>

                    </div>
                    <?php endif; ?>
                    <div class="question__title">
                        <svg class="icon icon-plus">
                            <use xlink:href="#icon-plus-large"></use>
                        </svg>
                        <svg class="icon icon-minus">
                            <use xlink:href="#icon-minus-large"></use>
                        </svg>
                        <h3 class="title-cintary"><?php the_title(); ?></h3>
                        <div class="question__answer js-answer">
                            <div class="answer__wrapper">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>

                </a>
                <?php endwhile; ?>
                <?php else : ?>
                <p><?php _e( 'Désolé, aucun résultat' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>