
jQuery(document).ready(function() {

    /*
        Fullscreen Background
    */
	$.backstretch("assets/img/bg.jpg");
	
	/*
	    Open / Close Menu 
	*/
	$('.hamburger-button button').on('click', function(){
		$('.top-menu').toggleClass('active');
		$(this).toggleClass('menu-closed');
	});
	
});
