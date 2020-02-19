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
    
    jQuery.validator.addMethod("year", function(value, element) {
		  return this.optional( element ) || /^(19|20)\d{2}$/.test( value );
		}, 'Proszę wprowadzić prawidłowy format daty. Przykład: "2014"');
    
    jQuery.validator.addMethod("sc_name", function(value, element) {
		  return this.optional( element ) || /^[a-zA-Z]{1}$/.test( value );
		}, 'Proszę wprowadzić prawidłowy format.');
    
    jQuery.validator.addMethod("sc_surname", function(value, element) {
		  return this.optional( element ) || /^[a-zA-Z]{2}$/.test( value );
		}, 'Proszę wprowadzić prawidłowy format.');
/*
 * walidacja formularza dodania nowego pacjenta
 */    
    $('#patient_add_form').validate({ 
    	'errorClass': 'ui-state-error-text',
        'highlight': function (element, errorClass) {
            $(element).addClass('ui-state-error');
        },
        'unhighlight': function (element, errorClass) {
            $(element).removeClass('ui-state-error');
          //  $(element).addClass('ui-state-checked'); na żółto się robi
        },
    	rules: {
    		sc_name: {
                required: true,
                rangelength: [1,1],
                sc_name: true
            },
            sc_surname: {
                required: true,
                rangelength: [2,2],
                sc_surname: true
            },
    		pesel: {
                required: true,
                pesel: true
            },
            year: {
            	required: true,
            	year: true
            }
        },
        messages: {
        	sc_name: {
        		required: "Proszę podać skrót",
        		rangelength: "Skrót imienia musi mieć 1 literę",
        		sc_name: "Skrót imienia musi mieć 1 literę"
        	},
        	sc_surname: {
        		required: "Proszę podać skrót",
        		rangelength: "Skrót nazwiska musi mieć 2 litery",
        		sc_surname: "Skrót nazwiska musi mieć 2 litery"
        	},
        	pesel: {
        		required: "Proszę podać PESEL",
        		pesel: "Proszę o podanie prawidłowego numeru PESEL"
        	}
        	,
        	year: {
        		required: "Proszę podać rok urodzenia pacjenta",
        		year: "Proszę wprowadzić prawidłowy format daty. Przykład: 1994"
        	}
        }
    });
    
});