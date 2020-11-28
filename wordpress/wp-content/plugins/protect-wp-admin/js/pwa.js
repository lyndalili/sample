/* admin js*/
jQuery(document).ready(function(){
	/* add image upload image button */
	jQuery(".upload_image").click(function() {	
	inputfieldId = jQuery(this).attr("data-id");
	formfield = jQuery("#"+inputfieldId).attr("name");
	tb_show( "", "media-upload.php?type=image&amp;TB_iframe=true" );
	return false;
	});
	window.send_to_editor = function(html) {
	imgurl = jQuery(html).attr('href');
	if(imgurl==undefined){ imgurl = jQuery(html).attr('src');}
	jQuery("#"+inputfieldId).val(imgurl);
	tb_remove();
   }
   // Add Color Picker to all inputs that have 'color-field' class
      jQuery('.color-field').wpColorPicker();
});
