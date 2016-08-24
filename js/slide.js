window.addEvent('domready', function() {
	var status = {
		'true': 'Less',
		'false': 'More'
	};
	
	//-vertical

	var myAboutSlide = new Fx.Slide('about_slide');
	myAboutSlide.hide();

	$('about_toggle').addEvent('click', function(e){
		e.stop();
		myAboutSlide.toggle();
	});
	
	// When Vertical Slide ends its transition, we check for its status
	// note that complete will not affect 'hide' and 'show' methods
	myAboutSlide.addEvent('complete', function() {
		$('about_status').set('html', status[myAboutSlide.open]);
	});
	
	var myCommentSlide = new Fx.Slide('slider_add_comment');
	myCommentSlide.hide();

	$('comment_toggle').addEvent('click', function(e){
		e.stop();
		myCommentSlide.toggle();
	});
	

});
