<?php
/**
 * Template Name: Search Page
 *
 *
 * @package		teuber
 * @author		Jairo Burbano <jairo.aburbano@gmail.com>
 * @version		0.1.0
 */
$templates = array('search.twig', 'archive.twig', 'index.twig');
$context = Timber::get_context();
$context['title'] = 'Resultados para: ' . get_search_query();
$context['posts'] = Timber::get_posts();
Timber::render($templates, $context, 86400);
