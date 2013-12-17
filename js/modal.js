	$(document).ready(function(){
		 	/* $(".modal").each(function(){
		    		$(this).draggable();
		  });*/

		$("#register, #registerAuth").click(function() {
				var marginTop = $(document).scrollTop();
 				$("#modalRegister").css("opacity","1")
 				$("#modalRegister").css("-webkit-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRegister").css("-moz-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRegister").css("-ms-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRegister").css("-o-transform","translate(0px,"+marginTop+"px)");
 				return false;
 			});
 			$("#closeRegister").click(function() {
 				$("#modalRegister").css("opacity","0");
 				$("#modalRegister").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalRegister").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalRegister").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalRegister").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});

 		$('#out').on('click', '#getAuth', function () {
 				var marginTop = $(document).scrollTop();
 				$("#modalAuth").css("opacity","1")
 				$("#modalAuth").css("-webkit-transform","translate(0px,"+marginTop+"px)");
 				$("#modalAuth").css("-moz-transform","translate(0px,"+marginTop+"px)");
 				$("#modalAuth").css("-ms-transform","translate(0px,"+marginTop+"px)");
 				$("#modalAuth").css("-o-transform","translate(0px,"+marginTop+"px)");
 				return false;
 			});
 			$("#closeAuth").click(function() {
 				$("#modalAuth").css("opacity","0");
 				$("#modalAuth").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalAuth").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalAuth").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalAuth").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});
 			 $("#closeWelcome").click(function() {
 				$("#modalWelcome").css("opacity","0");
 				$("#modalWelcome").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalWelcome").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalWelcome").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalWelcome").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});

 			 $("#getRemPwdModal").click(function() {
 			 	var marginTop = $(document).scrollTop();
 				$("#modalRemPwd").css("opacity","1")
 				$("#modalRemPwd").css("-webkit-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRemPwd").css("-moz-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRemPwd").css("-ms-transform","translate(0px,"+marginTop+"px)");
 				$("#modalRemPwd").css("-o-transform","translate(0px,"+marginTop+"px)");
 				return false;
 			});
 			$("#closeRemPwd").click(function() {
 				$("#modalRemPwd").css("opacity","0");
 				$("#modalRemPwd").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalRemPwd").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalRemPwd").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalRemPwd").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});
 			
 			$("#closeAuthConf").click(function() {
 				$("#modalAuthConf").css("opacity","0");
 				$("#modalAuthConf").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalAuthConf").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalAuthConf").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalAuthConf").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});

 			 $("#how_to").click(function() {
 			 	var marginTop = $(document).scrollTop();
 				$("#modalInstruction").css("opacity","1")
 				$("#modalInstruction").css("-webkit-transform","translate(0px,"+marginTop+"px)");
 				$("#modalInstruction").css("-moz-transform","translate(0px,"+marginTop+"px)");
 				$("#modalInstruction").css("-ms-transform","translate(0px,"+marginTop+"px)");
 				$("#modalInstruction").css("-o-transform","translate(0px,"+marginTop+"px)");
 				return false;
 			});
 			$("#closeInstruction").click(function() {
 				$("#modalInstruction").css("opacity","0");
 				$("#modalInstruction").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalInstruction").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalInstruction").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalInstruction").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});

 			 $("#contacts").click(function() {
 			 	var marginTop = $(document).scrollTop();
 				$("#modalContacts").css("opacity","1")
 				$("#modalContacts").css("-webkit-transform","translate(0px,"+marginTop+"px)");
 				$("#modalContacts").css("-moz-transform","translate(0px,"+marginTop+"px)");
 				$("#modalContacts").css("-ms-transform","translate(0px,"+marginTop+"px)");
 				$("#modalContacts").css("-o-transform","translate(0px,"+marginTop+"px)");
 				return false;
 			});
 			$("#closeContacts").click(function() {
 				$("#modalContacts").css("opacity","0");
 				$("#modalContacts").css("-webkit-transform","translate(0px,-1000px)");
 				$("#modalContacts").css("-moz-transform","translate(0px,-1000px)");
 				$("#modalContacts").css("-ms-transform","translate(0px,-1000px)");
 				$("#modalContacts").css("-o-transform","translate(0px,-1000px)");
 				return false;
 			});

 			$(window).scroll(function(){
			   var marginTop = $(document).scrollTop();
			   $(".modal").each(function(){
			   	if($(this).css("opacity")==1)
			   	{
				   	$(this).css("-webkit-transform","translate(0px,"+marginTop+"px)");
	 				$(this).css("-moz-transform","translate(0px,"+marginTop+"px)");
	 				$(this).css("-ms-transform","translate(0px,"+marginTop+"px)");
	 				$(this).css("-o-transform","translate(0px,"+marginTop+"px)");
 				}
			   });
			});
	});