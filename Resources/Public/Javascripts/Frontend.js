$(document).bind("mobileinit", function(){
    $.extend($.mobile, {
        loadingMessage: 'Seite wird geladen',
        defaultTransition: 'fade',  
        allowCrossDomainPages: true,
        ajaxEnabled:true,
        ajaxLinksEnabled:true,  
    });
    
    $('div').live('pageshow',function(event, ui){
    	// Hyphenate
        $('span.hyphenate').hyphenate();
    }); 
    
    $('div.gallery-page').live('pageshow', function(e){
		
    	// Re-initialize with the photos for the current page
    	$("div.gallery a", e.target).photoSwipe();
    	return true;
    	
    })    
});