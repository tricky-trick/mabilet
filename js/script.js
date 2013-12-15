jQuery(document).ready(function(){

			$('#stfrom').autocomplete({source:'auto.php', minLength:2});
			$('#stto').autocomplete({source:'auto.php', minLength:2});
			var marg = $('#stfrom').height();
			$('.ui-menu').css('margin-top',(marg-10));
					$( "#datepicker" ).val($.datepicker.formatDate('dd-mm-yy', new Date()));
				    $( "#datepicker" ).datepicker({ dateFormat: "dd-mm-yy"});
					$( "#datepicker" ).datepicker( "option", "maxDate", "+44d" );
					$( "#datepicker" ).datepicker( "option", "minDate", "0d" );
					$( "#datepicker" ).datepicker( "option", "firstDay", 1 );
					$( "#datepicker" ).datepicker( "option", "monthNames", [ "Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень" ] );
					$( "#datepicker" ).datepicker( "option", "dayNamesMin", [ "Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"] );
			$("#change").click(function(){
				var stfromval = $('#stfrom').val();
				var sttoval = $('#stto').val();
				$('#stfrom').val(sttoval);
				$('#stto').val(stfromval);
			});
      $( "#timefrom option, #timeto option" ).each(function() {
      $(this).text($(this).val());
});

      var div = $('#headblock');
$(window).scroll(function(){
   var percent = $(document).scrollTop() / $(document).height();
   div.css('opacity', 1 - percent);
});

		});

function validatePhone(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  else{
    if(document.getElementById("user_phone").value.length == 3)
      document.getElementById("user_phone").value = document.getElementById("user_phone").value + "-";
    }
    if(document.getElementById("user_phone").value.length == 6){
      document.getElementById("user_phone").value = document.getElementById("user_phone").value + "-";
    }
}

/*function validateName(evt, id) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex_error = /[A-Z]|[a-z]/;
  var regex = /[А-Я]|[а-я]|[і]|[ї]|[І]|[Ї]\-|\:/;
  if(regex_error.test(key)){
  	document.getElementById(id).style.background = 'red';
  	document.getElementById(id).style.color = 'white';
  	document.getElementById(id).value = "Змініть мову клавіатури";
  	setTimeout(function() {
  		document.getElementById(id).value = "";
  		document.getElementById(id).style.color = 'black';
  		document.getElementById(id).style.background = 'white';
  	} , 2500);
  }
  else{
  	document.getElementById(id).style.background = 'white';
  	document.getElementById(id).style.color = 'black';
  }
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}*/

function validateName(evt, id) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
var regex_error = /[A-Z]|[a-z]|\{|\}|\[|\]|\:|\;|\"|\'|\<|\,|\>|\.|\||\\/;
  var regex = /[А-Я]|[а-я]|[і]|[ї]|[І]|[Ї]|[Ґ]|\-/;
  var result = '';
  if(regex_error.test(key)){
     var A = {};

    A["Q"]="Й";A["W"]="Ц";A["E"]="У";A["R"]="К";A["T"]="Е";A["Y"]="Н";A["U"]="Г";A["I"]="Ш";A["O"]="Щ";A["P"]="З";A["{"]="Х";A["}"]="Ї";A["|"]="Ґ";
    A["q"]="й";A["w"]="ц";A["e"]="у";A["r"]="к";A["t"]="е";A["y"]="н";A["u"]="г";A["i"]="ш";A["o"]="щ";A["p"]="з";A["["]="х";A["]"]="ї";A["\\"]="ґ";
    A["A"]="Ф";A["S"]="І";A["D"]="В";A["F"]="А";A["G"]="П";A["H"]="Р";A["J"]="О";A["K"]="Л";A["L"]="Д";A[":"]="Ж";A["\""]="Є";
    A["a"]="ф";A["s"]="і";A["d"]="в";A["f"]="а";A["g"]="п";A["h"]="р";A["j"]="о";A["k"]="л";A["l"]="д";A[";"]="ж";A["'"]="є";
    A["Z"]="Я";A["X"]="Ч";A["C"]="С";A["V"]="М";A["B"]="И";A["N"]="Т";A["M"]="Ь";A["<"]="Б";A[">"]="Ю";
    A["z"]="я";A["x"]="ч";A["c"]="с";A["v"]="м";A["b"]="и";A["n"]="т";A["m"]="ь";A[","]="б";A["."]="ю";

result = document.getElementById(id).value + A[key];
    
  }
  else{
    result += document.getElementById(id).value;
  }
  if( !regex.test(key) ) {
           theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  document.getElementById(id).value = result;
}