<section class="section s-blog s-blog--carousel">
    <div class="wrapper">
        <div class="grid-center">
            <header class="blog__header">
                <h2 class="title-secondary" data-scrolly="fromLeft"><?php the_sub_field('posts_title'); ?></h2>
                <?php  
                $link = get_sub_field('posts_see_all');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>" data-scrolly="fromRight">
                    <?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </header>
            <div class="blog__cards">
                <div class="swiper" data-component="Carousel" data-carousel-type="three-col">
                    <div class=" swiper-wrapper">

                        <?php if( have_rows('posts') ): ?>
                        <?php while( have_rows('posts') ): 
                            the_row(); 
                            ?>
                        <?php
                            $featured_posts = get_sub_field('activity');
                            if( $featured_posts ): ?>

                        <?php foreach( $featured_posts as $post ): 

                                    // Setup this post for WP functions (variable must be named $post).
                                    setup_postdata($post); ?>
                        <div class="swiper-slide" data-scrolly="fromBottom">
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
                        </div>
                        <?php endforeach; ?>

                        <?php 
                                // Reset the global post object so that the rest of the page works correctly.
                                wp_reset_postdata(); ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>



                    </div>
                    <div class="swiper-pagination"></div>
                </div>


            </div>
        </div>
    </div>
</section>