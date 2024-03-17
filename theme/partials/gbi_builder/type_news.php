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
                    <?php 
                    $args = Array(
                        'post_type' => 'post',
                        'posts_per_page' => '5',
                        'order' => 'DESC'
                      );
                    $the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
	<!-- the loop -->
	<?php
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
		?>
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
                        

	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


                    </div>
                    <div class="swiper-options">
                        <div class="swiper-button-prev button-prev"></div>
                        <div class="swiper-pagination"></div>
                            <div class="swiper-button-next button-next"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>