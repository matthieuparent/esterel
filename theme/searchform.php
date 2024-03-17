<form action="/" method="get">
    <input type="text" placeholder="Rechercher..." name="s" id="search" value="<?php the_search_query(); ?>" />
    <button type="image" alt="search">
        <img class="icon-search" src="<?php echo get_template_directory_uri() ?>/dist/assets/icons/search.svg" alt="">
    </button>
</form>