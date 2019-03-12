(function($) {
	$(function() {
		/*
		 * Attaches the image uploader to the input field
		 */

		// Instantiates the variable that holds the media library frame.
		var meta_image_frame;

		// Runs when the image button is clicked.
		$(document).on({
			click: function(e) { /* better way to delegate 'on' future elements--using 'on' click of the document for 'meta-image-button' */

				$thisButton = $(this);
				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( meta_image_frame ) {
					meta_image_frame.open();
					return;
				}

				// Sets up the media library frame
				meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
					className: 'media-frame mc-media-frame',
					title: meta_image.title,
					button: { text:  'Insert' },
					library: { type: 'image' },
					multiple: false
				});

				// Runs when an image is selected.
				meta_image_frame.on('select', function(){

					// Grabs the attachment selection and creates a JSON representation of the model.
					var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
					// Sends the attachment URL to our custom image input field.
					$thisButton.siblings('input[type="text"], input.photourl').val(media_attachment.url);
					$thisButton.siblings('.thumbnail').html('<img src="' + media_attachment.url + '" alt="thumbnail" />');
					var codeStr = "[ccphoto id='" + media_attachment.id + "' orientation='" + media_attachment.orientation + "' /]";
					$thisButton.siblings('.cc-code').find('.insert-link').html(codeStr);
					$thisButton.siblings('input.code').val(codeStr);
				});

				// Opens the media library frame.
				meta_image_frame.open();

			}
		}, '.meta-image-button, .meta-media-button');

		// Runs when the shortcode button is clicked.
		$(document).on({
			click: function(e) { /* better way to delegate 'on' future elements--using 'on' click of the document for 'meta-image-button' */

				$thisButton = $(this);
				// Prevents the default action from occuring.
				e.preventDefault();

				tinymce.activeEditor.execCommand('mceInsertContent', false, $(this).text() );
				/*var textarea = $( '#wp-content-editor-container' ).find( 'textarea' );
				textarea.bind( 'updateInfo keyup mousedown mousemove mouseup', function() {
					var range = $( this ).textrange();
					console.log( range );
				});*/

			}
		}, '.insert-link');


	});
})(jQuery);
