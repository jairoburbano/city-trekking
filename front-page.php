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
$context['post']    = $post;

$news_q_args = array(
    'post_type'         => 'tours',
    'category_name'     => 'featured',
    'post_status'       => 'publish',
    'orderby'             => 'rand',
    'posts_per_page'    => 6
);

/* THIS LINE IS CRUCIAL */
/* in order for WordPress to know what to paginate */
/* your args have to be the defualt query */
wp_reset_query();
query_posts($news_q_args);
$news            = Timber::get_posts();
$context['news'] = $news;

$testimonials_q_args = array(
    'post_type'         => 'testimonios_post',
    'post_status'       => 'publish',
    'posts_per_page'    => -1
);

/* THIS LINE IS CRUCIAL */
/* in order for WordPress to know what to paginate */
/* your args have to be the defualt query */
wp_reset_query();
query_posts($testimonials_q_args);
$testimonials            = Timber::get_posts();
$context['testimonials'] = $testimonials;

Timber::render('home.twig', $context);