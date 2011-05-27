jQuery(document).ready(function($){ 
    $(".column").sortable({
        connectWith: ".column",
		cursor: 'move', 
		cursorAt: { top: 13, left: 16 }, 
		tolerance: 'pointer',					
        update: function(event, ui){
			var columnId = 0;
            $(".column").each(function(index){
				var ajaxCal = contentSortingAction +'&'+'TxT3mobileModule%5Bcolumn%5D='+columnId+'&'+$(this).sortable("serialize") ;
				/*alert(ajaxCal);*/
				$.ajax({url:ajaxCal});	
				columnId++;
            })
        }
    });
    
    $(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").prepend("<span class='ui-icon ui-icon-minusthick'></span>").end().find(".portlet-content");
    
    $(".portlet-header .ui-icon").click(function(){
        $(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
        $(this).parents(".portlet:first").find(".portlet-content").toggle();
    });
    
    $(".column").disableSelection();
});

