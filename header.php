<?php
/**
 * Cabacera de la Página
 *
 * Nuestra todo el contenido hasta <body>
 *
 * @package		teuber
 * @author		Jairo Burbano <jairo.aburbano@gmail.com>
 * @version		0.1.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<!-- Blog Title -->
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Icons and Favicons -->
		<link rel="shortcut icon" href="<?php URL ?>" />
		<link rel="apple-touch-icon-precomposed" href="<?php URL ?>">
		<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
		<!-- RSS -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<!-- Scripts and CSS -->
		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
	</head>
	<body <?php body_class(); ?>>