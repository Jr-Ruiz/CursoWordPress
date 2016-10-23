jQuery(document).ready(function($) {

//Deeply based on: https://webdesign.tutsplus.com/articles/super-simple-lightbox-with-css-and-jquery--webdesign-3528

	$('img').click(function(e) {

	var image_href = $(this).attr("src");

	if ($('#lightbox').length > 0) {
		$('#content').html('<img src="' + image_href + '" />');
		$('#lightbox').fadeIn('slow');
	}else {
		var lightbox = 
    			'<div id="lightbox">' +
    			'<p>Haz clic para cerrar</p>' +
      				'<div id="content">' + //insert clicked link's href into img src
        				'<img src="' + image_href +'" />' +
      				'</div>' +
    			'</div>';
    		 $('body').append(lightbox);
		 $('#lightbox').hide();
   		 $('#lightbox').fadeIn('slow');
  		}
	});

	$('body').on('click', '#lightbox', function() { 
	$('#lightbox').fadeOut('slow');
	});
});
