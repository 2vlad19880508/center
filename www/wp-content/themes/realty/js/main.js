jQuery(function($) {
	if ($('.info-block').length>0) {
		$('.info-block-header').bind('click tap', function() {
			if($(this).hasClass('closed')) {
				$(this).removeClass('closed').addClass('opened');
				$(this).next().slideDown(500);			
			} else {
				$(this).removeClass('opened').addClass('closed');
				$(this).next().slideUp(500);	
			}
		});
	}
	$('.mobile-menu-btn').bind('click tap', function() {
		if ($('#main-nav').is(':hidden')) {
			$('#main-nav').slideDown(500);
			$(this).find('.glyphicon').removeClass('glyphicon-menu-hamburger').addClass('glyphicon-remove');
		} else {
			$('#main-nav').slideUp(500);
			$(this).find('.glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-menu-hamburger');
		}
	});

	if($('#main-filter').length>0) {
		$('[name=place-select]').bind('change', function() {
			$('.hidden-fields').find('input:visible').val('').hide();
			$('.hidden-fields').find('select:visible :first').attr("selected", "selected").hide();
			$('.hidden-fields').find('select:visible').hide();
			$('.hidden-fields').find('[name='+$('[name=place-select]:checked').val()+']').show();
		});
		$('[name=place-select]:checked').trigger('change');
	}
	if($('#application-form').length>0) {
		$('#place-select').bind('change', function() {
			$('.hidden-fields').find('input:visible').val('').hide();
			$('.hidden-fields').find('select:visible :first').attr("selected", "selected").hide();
			$('.hidden-fields').find('select:visible').hide();
			$('.hidden-fields').find('[name='+$(this).val()+']').show();
		});
		$('#place-select').trigger('change');
	}
	if($('#application-form').length>0) {
		$('[name=type]').bind('change', function() {
			x = $(this).find(':selected').data('value');
			if (x == 3 || x == 7 || x == 6) {
				$('#rooms_count:visible').hide();
				$('#rooms_count').find('input').val('');
			} else {
				$('#rooms_count:hidden').show();
			}
		});
		// $('[name=type]').trigger('change');
	}
	if($('#main-filter').length>0) {
		$('[name=estate-type]').bind('change', function() {
			if ($(this).val() == 3 || $(this).val() == 7 || $(this).val() == 6) {
				$('#rooms_count:visible').hide();
				$('#rooms_count').find('input').val('');
			} else {
				$('#rooms_count:hidden').show();
			}
		});
		// $('[name=estate-type]').trigger('change');
	}

	$("form").bind("submit", function() {
		$(this).find("input, select").filter(function(){ return !this.value; }).attr("disabled", "disabled");
		return true; 
	});
	
	$( "form" ).find("input, select").attr( "disabled", false );

});
window.onunload = function(){};