<?php
function anadir_soporte_menu(){
  add_menu_page('Ajustes plugin Añadir Imagen', //Título de la página
    'Tamaño imagen',	//Título del menú
    'administrator',	//Rol del que puede acceder
    'anadir_soporte_settings',	//Id de la página
    'anadir_soporte_page_settings', //Función que representa la página
    'dashicons-admin-generic');	//Icono
}

add_action('admin_menu','anadir_soporte_menu');	

function anadir_soporte_page_settings(){
	global $ancho, $alto;
	wp_enqueue_style( 'estilos_admin', plugins_url( 'css/anadir-imagen.css', __FILE__ ) );
?>
  <div id="opciones">
    <h2>Tamaño de la imagen a añadir</h2>
      <form method="POST" action="options.php">
        <?php
          settings_fields('tamano');
          do_settings_sections('tamano');
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

function anadir_soporte_settings(){
	register_setting('tamano','ancho');
	register_setting('tamano','alto');
}

add_action('admin_init', 'anadir_soporte_settings');

?>
