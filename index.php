<?php
/**
 * Archivo principal.
 *
 * Aquí se muestra todo lo que se ve en la portada de la página
 *
 * @package		teuber
 * @author		Jairo Burbano <jairo.aburbano@gmail.com>
 * @version		0.1.0
 */
if (!class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin.';
    return;
}

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['foo'] = 'bar';
$templates = array('index.twig');
if (is_home()) {
    array_unshift($templates, 'home.twig');
}
Timber::render($templates, $context, 86400);
