<?php
/**
	  Plugin Name: LightboxSimple
	  Plugin URI: http://www.joseramonruiz.eu
	  Description: Plugin para aplicar el efecto lightbox sencillo a las imaǵenes de un tema
	  Version: 1.0
	  Author: José Ramón Ruiz Rodríguez
	  Author URI: http://www.joseramonruiz.eu
	  License: MIT
**/

function estilos_lightbox() {
  wp_register_style( 'lightboxCSS',  plugin_dir_url( __FILE__ ) . 'css/lightboxsimple.css' );
  wp_enqueue_style( 'lightboxCSS' );
}

add_action( 'wp_enqueue_scripts', 'estilos_lightbox' );

function scripts_lightbox() {
  wp_register_script( 'lightboxJS',  plugin_dir_url( __FILE__ ) . 'js/lightboxsimple.js', array( 'jquery' ), false, true );
  wp_enqueue_script( 'lightboxJS' );
}

add_action( 'wp_enqueue_scripts', 'scripts_lightbox' );
?>
