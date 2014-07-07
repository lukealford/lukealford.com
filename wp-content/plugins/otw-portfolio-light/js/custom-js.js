jQuery(function(jQuery) {


	jQuery('#media-items').bind('DOMNodeInserted',function(){
		jQuery('input[value="Insert into Post"]').each(function(){
				jQuery(this).attr('value','Use This Image');
		});
	});

	jQuery('.custom_upload_image_button').click(function() {
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_image');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			classes = jQuery('img', html).attr('class');

                if(typeof classes != 'undefined')  // OTW Bugfix
                    id = classes.replace(/(.*?)wp-image-/, '');

                if(typeof classes == 'undefined'){
                    img = jQuery(html);
                    imgurl = img.attr('src');
                    classes = img.attr('class');
                    //classes = jQuery(html).attr('class');
                    if(typeof classes != 'undefined')
                        id = classes.replace(/(.*?)wp-image-/, '');
                }

	 //	    id = classes.replace(/(.*?)wp-image-/, '');
			formfield.val(id);
			preview.attr('src', imgurl);
			tb_remove();
		}
		return false;
	});

	jQuery('.custom_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
		jQuery(this).parent().siblings('.custom_upload_image').val('');
		jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
		return false;
	});

	jQuery('.repeatable-add').click(function() {
		field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
		fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');


		jQuery('input:hidden', field).val('noimage').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		})

		jQuery('input:button', field).val('Choose Image').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		})

		field.insertAfter(fieldLocation, jQuery(this).closest('td'))
		return false;
	});

	jQuery('.repeatable-remove').click(function(){
		jQuery(this).parent().remove();
		return false;
	});

	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});

});