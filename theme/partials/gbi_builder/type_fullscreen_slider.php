<section class="section s-hero s-hero--carousel">
    <div class="swiper" data-component="Carousel" data-carousel-type="auto">
        <div class="swiper-navigation">
            <div class="swiper-button-prev"><?php the_sub_field("slider_prev"); ?></div>
            |
            <div class="swiper-button-next"><?php the_sub_field("slider_next"); ?></div>
        </div>

        <div class="swiper-wrapper">
            <?php if( have_rows('slider_slides') ): ?>
            <?php while( have_rows('slider_slides') ): 
                        the_row(); 
                        $image = get_sub_field('slide_image');
                    ?>
            <div class="swiper-slide">
                <div class="wrapper wrapper--small">
                    <div class="grid-center">
                        <div class="hero__media">
                            <?php if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="hero__content">
                            <h1 class="title-quaterny"><?php the_sub_field('slide_subtitle'); ?></h1>
                            <h2 class="title-primary"><?php the_sub_field('slide_title'); ?></h2>
                            <?php  
                            $link = get_sub_field('slide_button');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                            <a class="link link--arrow" href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                                <svg class="icon">
                                    <use xlink:href="#icon-arrow"></use>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>