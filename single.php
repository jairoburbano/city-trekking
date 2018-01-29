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


Timber::render('proyectos.twig', $context);