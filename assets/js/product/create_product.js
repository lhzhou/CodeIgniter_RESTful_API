(function($){
	color       = $(".color");
	size        = $(".size");
	color_size  = $(".color , .size");

	$(".color , .size").click(function(event) {
		colorObj = {};
		sizeObj = {};
		var i = 0 ;
		var j = 0 ;
		color.each(function(index, el) {
			if (this.checked == true) {
				colorObj[i] = {'name' : this.value};
				i++;
				
			};
		});

		size.each(function(index, el) {
			if (this.checked == true) {
				sizeObj[j] = {'name' : this.value};
				j++;
				
			};
		});
		color_file(colorObj,sizeObj);
		set_color_and_size_unit(colorObj,sizeObj);
	});
	

	function color_file (colorObj,sizeObj) {

		CS.post('ajax_form_upload_color_pic', {color: colorObj}).done(function(d) {
			$(".color_upload_file").html(d);
		});

		if( typeof(sizeObj[0]) == "undefined" ) {
			$(".set_color_and_size_unit").html('');
		};
	}

	function set_color_and_size_unit (colorObj,sizeObj) {
		CS.post('ajax_form_set_color_and_size_unit', {'color': colorObj , 'size':sizeObj}).always(function(d) {

			$(".set_color_and_size_unit").html(d);

			$(".product_count").change(function() {
				var total = 0;
				
				// 统计商品数量
				$(".product_count").each(function(index, el) {
					total = total + Number(this.value);
					$(".product_total").html(total);
				});


			});

		});
	}

	var addFormGroup = function (event) {
        event.preventDefault();

        var $formGroup = $(this).closest('.form-group');
        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
        var $formGroupClone = $formGroup.clone();

        $(this)
            .toggleClass('btn-success btn-add btn-danger btn-remove')
            .html('–');

        $formGroupClone.find('input').val('');
        $formGroupClone.find('.concept').text('Phone');
        $formGroupClone.insertAfter($formGroup);

        // var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
        // if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
        //     $lastFormGroupLast.find('.btn-add').attr('disabled', true);
        // }
    };

	var removeFormGroup = function (event) {
        event.preventDefault();

        var $formGroup = $(this).closest('.form-group');
        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

        // var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
        // if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
        //     $lastFormGroupLast.find('.btn-add').attr('disabled', false);
        // }

        $formGroup.remove();
    };

	var countFormGroup = function ($form) {
        return $form.find('.form-group').length;
    };

    $(document).on('click', '.btn-add', addFormGroup);
    $(document).on('click', '.btn-remove', removeFormGroup);
    

    $('input[name="select_input"]').click(function(event) {
    	if ($(this).val() == 'Y') {
    		$(".select_input_group").show();
    	}else{
    		$(".select_input_group").hide();
    	};
    });
})(jQuery, CS);
