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

    $('.add-news-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-news-button', spinner: 'add-news-spinner', message: 'add-news-message'});
    });

    $('.edit-news-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-news-button', spinner: 'edit-news-spinner', message: 'edit-news-message'});
    });

    $('.update-news-status-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'update-news-status-button', spinner: 'update-news-status-spinner', message: 'update-news-status-message'});
    });

})(jQuery);
