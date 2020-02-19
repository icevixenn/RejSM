$(document).ready(function () {
/*
 * osobna funkcja walidacji daty 
 */ 
    jQuery.validator.addMethod("year", function(value, element) {
		  return this.optional( element ) || /^(\d{4}(-[0-1][1-9])?)$/.test( value );
		}, 'Proszę wprowadzić prawidłowy format daty. Przykład: "2014" bądź "2014-03"');

/*
 * walidacja formularza dodania nowego pacjenta
 */    
    $('#patient_add_2_form').validate({ 
    	'errorClass': 'ui-state-error-text',
        'highlight': function (element, errorClass) {
            $(element).addClass('ui-state-error');
        },
        'unhighlight': function (element, errorClass) {
            $(element).removeClass('ui-state-error');
          //  $(element).addClass('ui-state-checked'); na żółto się robi
        },
    	rules: {
    		I_symp_date: {
                required: true,
                year: true
            },
            diagnosis_date: {
            	required: true,
            	year: true
            }
        },
        messages: {
        	I_symp_date: {
        		required: "Proszę podać datę pierwszych objawów",
        		year: "Proszę wprowadzić prawidłowy format daty. Przykład: 1994 bądź 2014-03"
        	}
        	,
        	diagnosis_date: {
        		required: "Proszę podać datę diagnozy",
        		year: "Proszę wprowadzić prawidłowy format daty. Przykład: 1994 bądź 2014-03"
        	}
        }
    });
    
});