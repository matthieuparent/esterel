<?php get_header(); ?>
<section class="section s-hero s-hero--no-image">
</section>
<section class="section s-title">
    <div class="wrapper">
        <div class="grid-center">
            <div class="title__content">
                <p> <?php
            if(function_exists('yoast_breadcrumb')) {
                echo crumb_nav(get_crumb_array());			
            }
        ?></p>
                <h1 class="title-primary"><?php the_title(); ?></h1>
            </div>
            <!--div class="title__download">
                <svg class="icon icon--xl">
                    <use xlink:href="#icon-download"></use>
                </svg>
                <p>Télécharger le bulletin</p>
            </div-->
        </div>
    </div>
</section>
<section class="section s-text-image">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <div class="text__content">
                <?php the_content(); ?>
            </div>
            <div class="text__image">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>