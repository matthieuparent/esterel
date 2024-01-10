<section class="section s-gallery">
    <div class="wrapper">
        <div class="grid-center grid-<?php echo count(get_sub_field('type_gallery_images')); ?>">
            <?php if( have_rows('type_gallery_images') ):
                $count = 0 ?>
            <?php while( have_rows('type_gallery_images') ): 
                        the_row(); 
                        $image = get_sub_field('gallery_image');
                        $anim = ["fromLeft", "fromTop", "fromRight", "fromBottom"];
                    ?>
            <?php if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                data-scrolly="<?php echo $anim[$count]; ?>" />
            <?php endif; ?>
            <?php 
                $count++;
                endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>