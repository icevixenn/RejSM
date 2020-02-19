$(document).ready(function () {
/*
 * osobna funkcja walidacji nr PESEL
*/ 
    jQuery.validator.addMethod("pesel", function(value, element) {
    	var pesel = value.replace(/[\ \-]/gi, ''); 
    	if (pesel.length != 11) { return false; } else {
    	var steps = new Array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); 
    	var sum_nb = 0;
    	for (var x = 0; x < 10; x++) { sum_nb += steps[x] * pesel[x];}
    	sum_m = 10 - sum_nb % 10;
    	if (sum_m == 10) { sum_c = 0; } else { sum_c = sum_m;}
    	if (sum_c != pesel[10]) {	return false;}
    	}
    	return true;	
    	}, "Proszę o podanie prawidłowego numeru PESEL");    
/*
 * walidacja formularza rejestracji dla pacjenta
 */    
    $('#patient-form').validate({ 
    	'errorClass': 'ui-state-error-text',
        'highlight': function (element, errorClass) {
            $(element).addClass('ui-state-error');
        },
        'unhighlight': function (element, errorClass) {
            $(element).removeClass('ui-state-error');
          //  $(element).addClass('ui-state-checked'); na żółto się robi
        },
    	rules: {
    		pesel: {
                required: true,
                pesel: true
            },
            email1: {
                required: true,
                email: true
            },
            password1: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#password1"
            },
            consent1: "required"
        },
        messages: {
        	pesel: {
        		required: "Proszę podać PESEL",
        		pesel: "Proszę o podanie prawidłowego numeru PESEL"
        	},
        	email1: {
        		required: "Proszę podać adres e-mail",
        		email: "Proszę podać poprawny adres e-mail"
        	},
        	password1: {
        		required: "Proszę podać hasło",
        		minlength: "Hasło musi zawierać co najmniej 6 znaków"
        	},
        	confirm_password: {
        		required: "Proszę powtórzyć hasło",
        		minlength: "Hasło musi zawierać co najmniej 6 znaków",
        		equalTo: "Podane hasła muszą być identyczne"
        	},
        	consent1: "Proszę zaakceptować regulamin rejestracji"
        }
    });
    
});