/*
 * walidacja formularza rejestracji dla lekarza
*/  

$(document).ready(function () {

    $('#doctor-form').validate({
    	'errorClass': 'ui-state-error-text',
        'highlight': function (element, errorClass) {
            $(element).addClass('ui-state-error');
        },
        'unhighlight': function (element, errorClass) {
            $(element).removeClass('ui-state-error');
          //  $(element).addClass('ui-state-checked'); na żółto się robi
        },
    	rules: {
        	name: {
                required: true,
                minlength: 2
            },
            surname: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            pass_rep: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            consent: "required"
        },
        messages: {
        	name: {
        		required: "Proszę podać imię",
        		minlength: "Imię musi posiadać co najmniej 2 litery"
        	},
        	surname: {
        		required: "Proszę podać nazwisko",
        		minlength: "Nazwisko musi posiadać co najmniej 2 litery"
        	},
        	email: {
        		required: "Proszę podać adres e-mail",
        		email: "Proszę podać poprawny adres e-mail"
        	},
        	password: {
        		required: "Proszę podać hasło",
        		minlength: "Hasło musi zawierać co najmniej 6 znaków"
        	},
        	pass_rep: {
        		required: "Proszę powtórzyć hasło",
        		minlength: "Hasło musi zawierać co najmniej 6 znaków",
        		equalTo: "Podane hasła muszą być identyczne"
        	},
        	consent: "Proszę zaakceptować regulamin rejestracji"
        }
    });

});