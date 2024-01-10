<?php
/*
Template Name: Aller vers premier enfant
*/
$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order&sort_order=DESC");

if(get_field('page_de_redirection')) {
    wp_redirect(get_field('page_de_redirection'));
} else if ($pagekids) {
    $firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
} else {
    wp_redirect( home_url() );
}
?>