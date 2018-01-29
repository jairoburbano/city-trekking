<?php
/**
 * Template para mostrar los errores 404
 *
 * @package		teuber
 * @author		Jairo Burbano <jairo.aburbano@gmail.com>
 * @version		0.1.0
 */
$context = Timber::get_context();
$context['title'] = "Error 404: Página No Encontrada";
$context['mensaje'] = "La página que buscas puede haber sido removida, cambiado de nombre, o temporalmente no está disponible.";
Timber::render('404.twig', $context, 86400);