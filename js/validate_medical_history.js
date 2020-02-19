$(document).ready(function () {
/*
 * osobna funkcja walidacji daty
 * możliwość wpisania samego roku (4 cyfry) bądź roku z miesiącem
 * (4 cyfry "-" 2 cyfry)
 * TODO można jeszcze poprawić żeby tylko 0-9 + 10,11,12 w miesiącu walidację
*/ 
	jQuery.validator.addMethod("check_date", function(value, element) {
		  return this.optional( element ) || /^(\d{4}(-[0-1][1-9])?)$/.test( value );
		}, 'Proszę wprowadzić prawidłowy format daty. Przykład: "2014" bądź "2014-03"');
/*
 * walidacja formularza edycji medycznej historii pacjenta (wywiadu) 
*/  
    $('#med_history_form').validate({
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
                check_date: true
            },
            diagnosis_date: {
                required: true,
                check_date: true
            }
        },
        messages: {
        	I_symp_date:{
        		required: "Proszę podać datę"},
        	diagnosis_date:{
        		required: "Proszę podać datę"}
        }
    });
});

