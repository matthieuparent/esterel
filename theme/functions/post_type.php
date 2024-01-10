<?php

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Actualités';
        $labels->singular_name = 'Actualité';
        $labels->add_new = 'Ajouter une actualité';
        $labels->add_new_item = 'Ajouter une actualité';
        $labels->edit_item = 'Éditer une actualité';
        $labels->new_item = 'Actualité';
        $labels->view_item = 'Voir l\'actulaité';
        $labels->search_items = 'Chercher une actualité';
        $labels->not_found = 'Aucune actualité';
        $labels->not_found_in_trash = 'No News found in Trash';
        $labels->all_items = 'Toutes les acutalité';
        $labels->menu_name = 'Actualités';
        $labels->name_admin_bar = 'Actualités';
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}