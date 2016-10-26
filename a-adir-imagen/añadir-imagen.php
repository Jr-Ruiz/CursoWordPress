 <?php
 /**
	Plugin Name: Añadir Imagen
	Plugin URI: http://www.joseramonruiz.eu
	Description: Plugin para añadir una imagen a CPT usando el media uploader
	Version: 1.0
	Author: José Ramón Ruiz Rodríguez
	Author URI: http://www.joseramonruiz.eu
	License: MIT
**/

$ancho=220;
$alto=360;

function inicializar(){
	global $alto, $ancho; //RECORDAD que con global hacemos uso de variables declaradas fuera del ámbito de la función

	if(get_option('ancho')){
		$ancho= get_option('ancho');
	}

	if(get_option('alto')){
		$alto= get_option('alto');
	}
}

add_action("admin_init", "inicializar");

function añadir_soporte_imagenes(){
	global $ancho, $alto;
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'cartel', $alto, true );
}

add_action("admin_init", "añadir_soporte_imagenes");

function guardar_iamgen( $post_ID, $post, $update ) {
	global $post, $alto;
	
	if($post){
		$thumbID=get_post_thumbnail_id($post->ID);
		$imgDestacada=wp_get_attachment_image_src($thumbID,'cartel');
		$_POST['cartel']=$imgDestacada[0];
	}
}

add_action( 'save_post', 'guardar_imagen', 10, 3 );

include 'opciones.php';
?>
