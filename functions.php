<?php
/**
 * Funciones y definiciones de Teuber
 *
 * @package		teuber
 * @author		Jairo Burbano <jairo.aburbano@gmail.com>
 * @version		0.1.0
 */

/****************************************
	Configuración Inicial del Tema
*****************************************/
require_once( get_template_directory() . '/lib/init.php');
require_once( get_template_directory() . '/lib/theme-functions.php');
require_once( get_template_directory() . '/lib/theme-helpers.php');
require_once( get_template_directory() . '/lib/theme-mails.php');

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyDDZJD5dym6r-3P1owE8QW1T-u-v422W6A';
});

/* * **************************************
  Funciones para Timber
 * *************************************** */
if (!class_exists('Timber')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });
    return;
}

class StarterSite extends TimberSite {

    function __construct() {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));
        parent::__construct();
    }

    function add_to_context($context) {
        $context['menu'] = new TimberMenu('top_header_menu');
        $context['menu_footer'] = new TimberMenu('footer_menu');
        $context['menu_lenguajes'] = new TimberMenu('lang_menu');
        $context['site'] = $this;
        $context['title_site'] = wp_title('-', false, 'right');
        //        $context['options'] = get_fields('options');
        return $context;
    }

    function add_to_twig($twig) {
        /* this is where you can add your own fuctions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());
        return $twig;
    }

}

new StarterSite();

/****************************************
	Funciones del tema propias
*****************************************/
// Función para el css
//$filemtime_css = filemtime(get_stylesheet_directory() . '/css/main.css');
//$context['filemtime_css'] = date ("Y\.m\.d\.His", $filemtime_css);
