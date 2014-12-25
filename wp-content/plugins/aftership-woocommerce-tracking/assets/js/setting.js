jQuery(function() {
	function set_aftership_tracking_provider(selected_couriers) {
		var couriers = sort_couriers(get_couriers());

//		console.log(couriers);

		jQuery.each(couriers, function(key, courier) {
//			console.log(courier.name);
			var str = '<option ';
			str += 'value="' + courier['slug'] + '" ';
			if (selected_couriers.hasOwnProperty(courier['slug'])) {
				str += 'selected="selected"';
			}
			str += '>' + courier['name'] + '</option>';
			jQuery('#couriers_select').append(str);
		});

		jQuery('#couriers_select').val(selected_couriers);
		jQuery('#couriers_select').chosen();
	}

	jQuery('#couriers_select').change(function() {
		var couriers_select = jQuery('#couriers_select').val();
		var value = (couriers_select) ? couriers_select.join(',') : '';
		jQuery('#couriers').val(value);
	});

	jQuery('#plugin').change(function() {
		if (jQuery(this).val() == 'aftership') {
			jQuery('#couriers').parent().parent().show();
		} else {
			jQuery('#couriers').parent().parent().hide();
		}
	})


	if (jQuery('#couriers')) {
		var couriers_select = jQuery('#couriers').val();
		var couriers_select_array = (couriers_select) ? couriers_select.split(',') : [];
		set_aftership_tracking_provider(couriers_select_array);

		if (jQuery('#plugin').val() != 'aftership') {
			jQuery('#couriers').parent().parent().hide();
		}
	}
});