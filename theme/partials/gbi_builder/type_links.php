<section class="section s-links">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <?php if( have_rows('links') ):
                ?>
            <?php while( have_rows('links') ):
                        the_row();
                        $link = get_sub_field('link_link');  ?>
            <a href="<?php echo esc_url( $link ); ?>" data-scrolly="fromAlpha">
                <?php if(get_sub_field("link_image_type")) :?>
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/icons/<?php the_sub_field('link_icon'); ?>.svg"
                    alt="">
                <?php else : ?>
                <?php 
                $image = get_sub_field('link_image');
                if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <?php endif; ?>

                <?php the_sub_field('link_title'); ?>
                <?php if(get_sub_field('link_subtitle')) :?>
                <span><?php the_sub_field('link_subtitle'); ?></span>
                <?php endif;?>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>