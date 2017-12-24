/**
 * 
 * Scripts for the customizer range slider control
 *
 */
$( function() {

	var slider = $('.range-slider'),
	  	range  = slider.find('input'),
	  	value  = slider.find('.range-slider-value');

	slider.each(function(){
	    value.each(function(){
	      	var value = $(this).prev().attr('value');
	      	$(this).html(value);
			$(this).val(value);
	    });
	    range.on('input', function(){
	      	$(this).next(value).html(this.value);
	    });
	});
			  
});