<?php
function añadir_soporte_menu(){
  add_menu_page('Ajustes plugin Añadir Imagen', //Título de la página
    'Tamaño imagen',	//Título del menú
    'administrator',	//Rol del que puede acceder
    'añadir_soporte_settings',	//Id de la página
    'añadir_soporte_page_settings', //Función que representa la página
    'dashicons-admin-generic');	//Icono
}

add_action('admin_menu','añadir_soporte_menu');	

function añadir_soporte_page_settings(){
	global $ancho, $alto;
	wp_enqueue_style( 'estilos_admin', plugins_url( 'css/añadir-imagen.css', __FILE__ ) );
?>
  <div id="opciones">
    <h2>Tamaño de la imagen a añadir</h2>
      <form method="POST" action="options.php">
        <?php
          settings_fields('prueba');
          do_settings_sections('prueba');
        ?>
        
        <div>
          <label>Anchura de la imagen</label>
          <input type="text" name="ancho" id ="ancho" value="<?php echo $ancho; ?>" placeholder="220"/>
        </div>
        
        <div>
          <label>Altura de la imagen</label>
          <input type="text" name="alto" id ="alto" value="<?php echo $alto; ?>" placeholder="320"/>
        </div>

        <?php submit_button(); ?>
        
      </form>
    </div>

<?php	
}

function añadir_soporte_settings(){
	register_setting('prueba','ancho','intval');
	register_setting('prueba','alto','intval');
}

add_Action('admin_init', 'añadir_soporte_settings');

?>
