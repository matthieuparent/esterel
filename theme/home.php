<?php get_header(); ?>

<?php 
    include('partials/sections/hero/'.get_field("page_config_hero_template", $GLOBALS['homeOpt']).'.php' ); 
?>

<section class="section s-blog ">
    <div class="wrapper">
        <div class="grid-center">
            <header class="blog__header">
                <h2 class="title-secondary"><?php wp_title(''); ?></h2>
            </header>
            <div class="blog__cards">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="card">
                    <div class="card__media">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="card__title">
                        <h3 class="title-tertiary"><?php the_title(); ?></h3>
                    </div>
                    <div class="card__content">
                        <h3 class="title-tertiary"><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <button class="link link--arrow">En savoir plus <svg class="icon">
                                <use xlink:href="#icon-arrow"></use>
                            </svg></button>
                    </div>
                </a>
                <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>