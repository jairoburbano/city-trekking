<?php
/**
 * The front-page.php template file is used to render your site’s front page,
 * whether the front page displays the blog posts index (mentioned above) or a static page.
 */

if (!class_exists('Timber')) {
    _e('Timber not activated. Make sure you activate the plugin.', 'greenvic');
    return;
}

$context            = Timber::get_context();
$post               = new TimberPost();
$context['post']    = Timber::get_posts();

// Publications pagination : https://github.com/timber/timber/wiki/Pagination#what-if-im-not-using-the-default-query
$paged  = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

// News Posts
$ppp = intval(get_option('posts_per_page'));
$news_q_args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $ppp,
    'order'             => 'DESC',
    'orderby'           => 'date',
    'paged'             => $paged
);

/* THIS LINE IS CRUCIAL */
/* in order for WordPress to know what to paginate */
/* your args have to be the defualt query */
wp_reset_query();
query_posts($news_q_args);
$news              = Timber::get_posts();
$context['news'] = $news;


$pagination                 = Timber::get_pagination();
$context['pagination']      = $pagination;

Timber::render('arriendo.twig', $context);