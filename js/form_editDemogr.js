// Edycja pól w tabeli Danych Demograficznych Pacjenta

$( function() {

	var dialog, 
	form = $("#formEditDemogr"),
	
    dialog = $( "#divEditDemogr" ).dialog({
      autoOpen: false,
      height: "auto",
      width: "auto",
      modal: true,
      'buttons': {

    	  "Edytuj Dane": {
    		  text: 'Edytuj Dane',
    		  class: 'btn btn-primary',
    		  click: function () {
    			  $('#formEditDemogr').submit();
    		  }
    	  },
    	  "Cofnij": {
    		  text: 'Cofnij',
    		  class: 'btn btn-secondary',
    		  click: function () {
    			  dialog.dialog( "close" );
    		  }
    	  },
        },

      close: function() {
        form[ 0 ].reset();
      }
    });
	

    $( "#editDemogr" ).button().on( "click", function() {
        dialog.dialog( "open" );
        
        var table = $('#demogr').DataTable();

        var mieszkanieLabel = table.rows().data()[3][1];
        if(mieszkanieLabel == 'Brak danych') var mieszkanie = "0";
        else if (mieszkanieLabel == 'Miasto') var mieszkanie ="1";
        else if (mieszkanieLabel == 'Wieś') var mieszkanie ="2";
        $("#mieszkanie").val(mieszkanie);
        $( "#mieszkanie" ).selectmenu();
       
        var porodyLabel = table.rows().data()[4][1];
        if(porodyLabel == 'Brak danych') var porody = "0";
        else if (porodyLabel == '0') var porody ="1";
        else if (porodyLabel == '1') var porody ="2";
        else if (porodyLabel == '2') var porody ="3";
        else if (porodyLabel == '3 lub więcej') var porody ="4";
        else if (porodyLabel == 'Nie dotyczy') var porody ="5";
        $("#porody").val(porody);
        $( "#porody" ).selectmenu();
        
        var pracaLabel = table.rows().data()[5][1];
        if(pracaLabel == 'Brak danych') var praca = "0";
        else if (pracaLabel == 'Tak') var praca ="1";
        else if (pracaLabel == 'Nie') var praca ="2";
        $("#praca").val(praca);
        $( "#praca" ).selectmenu();
        
        var plecLabel = table.rows().data()[6][1];
        if(plecLabel == 'Mężczyzna') var plec = "1";
        else if (plecLabel == 'Kobieta') var plec ="2";
        else if (plecLabel == 'Brak danych') var plec ="0";
        $("#plec").val(plec);
        $( "#plec" ).selectmenu();
        
        var recznoscLabel = table.rows().data()[7][1];
        if(recznoscLabel == 'Brak danych') var recznosc = "0";
        else if (recznoscLabel == 'Praworęczność') var recznosc ="1";
        else if (recznoscLabel == 'Leworęczność') var recznosc ="2";
        $("#recznosc").val(recznosc);
        $( "#recznosc" ).selectmenu();
        
        var SMLabel = table.rows().data()[8][1];
        if(SMLabel == 'Brak danych') var SM = "0";
        else if (SMLabel == 'Tak') var SM ="1";
        else if (SMLabel == 'Nie') var SM ="2";
        $("#SM").val(SM);
        $( "#SM" ).selectmenu();
        
        var rodzinaLabel = table.rows().data()[9][1];
        if(rodzinaLabel == 'Brak danych') var rodzina = "0";
        else if (rodzinaLabel == 'Panna / Kawaler') var rodzina ="1";
        else if (rodzinaLabel == 'Zamężna/Żonaty') var rodzina ="2";
        else if (rodzinaLabel == 'Rozwiedziony/a') var rodzina ="3";
        else if (rodzinaLabel == 'Wdowa/Wdowiec') var rodzina ="4";
        $("#rodzina").val(rodzina);
        $( "#rodzina" ).selectmenu();
        
        var wojewLabel = table.rows().data()[10][1];
        if(wojewLabel == 'Brak danych') var wojew = "0";
        else if (wojewLabel == 'Dolnośląskie') var wojew ="1";
        else if (wojewLabel == 'Kujawsko-Pomorskie') var wojew ="2";
        else if (wojewLabel == 'Lubelskie') var wojew ="3";
        else if (wojewLabel == 'Lubuskie') var wojew ="4";
        else if (wojewLabel == 'Łódzkie') var wojew ="5";
        else if (wojewLabel == 'Małopolskie') var wojew ="6";
        else if (wojewLabel == 'Mazowieckie') var wojew ="7";
        else if (wojewLabel == 'Opolskie') var wojew ="8";
        else if (wojewLabel == 'Podkarpackie') var wojew ="9";
        else if (wojewLabel == 'Podlaskie') var wojew ="10";
        else if (wojewLabel == 'Pomorskie') var wojew ="11";
        else if (wojewLabel == 'Śląskie') var wojew ="12";
        else if (wojewLabel == 'Świętokrzyskie') var wojew ="13";
        else if (wojewLabel == 'Warmińsko-Mazurskie') var wojew ="14";
        else if (wojewLabel == 'Wielkopolskie') var wojew ="15";
        else if (wojewLabel == 'Zachodniopomorskie') var wojew ="16";
        $("#wojew").val(wojew);
        $( "#wojew" ).selectmenu();
        
        var wyksztLabel = table.rows().data()[11][1];
        if(wyksztLabel == 'Brak danych') var wykszt = "0";
        else if (wyksztLabel == 'Podstawowe') var wykszt ="1";
        else if (wyksztLabel == 'Średnie') var wykszt ="2";
        else if (wyksztLabel == 'Wyższe') var wykszt ="3";
        $("#wykszt").val(wykszt);
        $( "#wykszt" ).selectmenu();
        
        var zarobekLabel = table.rows().data()[12][1];
        if(zarobekLabel == 'Brak danych') var zarobek = "0";
        else if (zarobekLabel == 'Nie pracuje') var zarobek ="1";
        else if (zarobekLabel == 'Pracuje') var zarobek ="2";
        else if (zarobekLabel == 'Renta') var zarobek ="3";
        else if (zarobekLabel == 'Emerytura') var zarobek ="4";
        $("#zarobek").val(zarobek);
        $( "#zarobek" ).selectmenu();

      });
       
    
  	}
	);