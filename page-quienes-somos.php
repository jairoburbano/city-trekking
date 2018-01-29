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


$json = get_template_directory() . '/data/somos.json';
$json = file_get_contents($json);
$data = json_decode($json, true);
$context['data'] = $data;

Timber::render('somos.twig', $context);