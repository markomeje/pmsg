(function ($) {

	'use strict';

    $('.supporter-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'supporter-button', spinner: 'supporter-spinner', message: 'supporter-message'});
    });

})(jQuery);
