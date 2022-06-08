(function ($) {

	'use strict';

    $('.delete-staff').on('click', function() {
        handleAjax({that: $(this), button: 'staff-button', spinner: 'staff-spinner'});    
    });

})(jQuery);
