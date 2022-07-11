(function ($) {

	'use strict';

    $('.delete-news').on('click', function() {
        handleAjax({that: $(this), button: 'delete-news-button', spinner: 'delete-news-spinner'});    
    });

    

})(jQuery);
