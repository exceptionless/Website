(function() {
	var main = '.cycloneslider-template-thumbnails';
	
	jQuery(document).on('cycle-initialized', main+' .cycloneslider-slides', function( event, optionHash ) {
		
		jQuery(this).parent().next().find('li').eq(optionHash.currSlide).addClass('current'); /* Higlight first thumb */
		
	});
	
	jQuery(document).on('cycle-before', main+' .cycloneslider-slides', function( event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
		var i = optionHash.nextSlide;
		
		jQuery(this).parent().next().find('li').removeClass('current').eq(i).addClass('current');
		
		if(optionHash.dynamicHeight == "on" && ((optionHash.autoHeight+"").indexOf(":") == -1) ) jQuery(this).animate({height:jQuery(incomingSlideEl).outerHeight()}, optionHash.autoHeightSpeed, optionHash.autoHeightEasing); /* Autoheight when dynamic height is on and auto height is not ratio (eg. 300:250) */
		
	});

	jQuery(document).on('click', '.cycloneslider-thumbnails li', function(){
		var i = jQuery(this).index();
		
		jQuery(this).parents('.cycloneslider-thumbnails').prev().find('.cycloneslider-slides').cycle('goto', i);
	});

})();