(function ($) {

	'use strict';

    $('.supporter-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'supporter-button', spinner: 'supporter-spinner', message: 'supporter-message'});
    });

    $('.login-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'login-button', spinner: 'login-spinner', message: 'login-message'});
    });

})(jQuery);
