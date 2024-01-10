<?php
$single = new MEC_skin_single();
$single_event_main = $single->get_event_mec(get_the_ID());
$single_event_obj = $single_event_main[0];
$location = $single_event_obj->data->locations;
$location = reset($location);

?>

<?php get_header(); ?>
<section class="section s-hero s-hero--no-image">
</section>
<section class="section s-title s-title--full s-title--pink">
    <div class="wrapper">
        <div class="grid-center">
            <div class="title__content">
                <p>Fil d'arianne</p>
                <h1 class="title-primary"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="section s-text-image">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <div class="text_content">


                <h2 class="title-secondary">
                    <?php 
                $date =  custom_date_range(get_post_meta( get_the_ID(), 'mec_start_date', true ), get_post_meta( get_the_ID(), 'mec_end_date', true ));
                echo $date;

                ?>
                </h2>
                <p><?php echo $location["name"]; ?></p>
                <p><?php echo $location["address"]; ?></p>
                <p><?php the_content(); ?></p>
            </div>
            <div class="text__image">
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/temp/single.jpg"
                    alt="Logo Ville Estérel">
            </div>
        </div>

    </div>
</section>
<?php get_footer(); ?>