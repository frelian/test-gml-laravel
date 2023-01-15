(function($){
    $(function(){

        $('.sidenav').sidenav();
        $('.parallax').parallax();
        $('select').formSelect();
        $('.tooltipped').tooltip({delay: 50});

        $('.showFilterSearch').click(function() {
            $( "#formFilterSearch" ).animate({
                height: 'toggle'
            }, 300);
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space
