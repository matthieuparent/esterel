<?php get_header(); ?>


<?php if( have_rows('gbi_types') ): ?>
<?php while( have_rows('gbi_types') ): the_row(); ?>
<?php include( locate_template('partials/gbi_builder/'. get_row_layout().'.php', false, false )); ?>
<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>