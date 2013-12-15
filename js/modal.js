	$(document).ready(function(){

		$("#register, #registerAuth").click(function() {
 				$("#modalRegister").css("opacity","1")
 				$("#modalRegister").css("-webkit-transform","translate(0px,0px)");
 				$("#modalRegister").css("-moz-transform","translate(0px,0px)");
 				$("#modalRegister").css("-ms-transform","translate(0px,0px)");
 				$("#modalRegister").css("-o-transform","translate(0px,0px)");
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
 				$("#modalAuth").css("opacity","1")
 				$("#modalAuth").css("-webkit-transform","translate(0px,0px)");
 				$("#modalAuth").css("-moz-transform","translate(0px,0px)");
 				$("#modalAuth").css("-ms-transform","translate(0px,0px)");
 				$("#modalAuth").css("-o-transform","translate(0px,0px)");
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
 				$("#modalRemPwd").css("opacity","1")
 				$("#modalRemPwd").css("-webkit-transform","translate(0px,0px)");
 				$("#modalRemPwd").css("-moz-transform","translate(0px,0px)");
 				$("#modalRemPwd").css("-ms-transform","translate(0px,0px)");
 				$("#modalRemPwd").css("-o-transform","translate(0px,0px)");
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
 				$("#modalInstruction").css("opacity","1")
 				$("#modalInstruction").css("-webkit-transform","translate(0px,0px)");
 				$("#modalInstruction").css("-moz-transform","translate(0px,0px)");
 				$("#modalInstruction").css("-ms-transform","translate(0px,0px)");
 				$("#modalInstruction").css("-o-transform","translate(0px,0px)");
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
 				$("#modalContacts").css("opacity","1")
 				$("#modalContacts").css("-webkit-transform","translate(0px,0px)");
 				$("#modalContacts").css("-moz-transform","translate(0px,0px)");
 				$("#modalContacts").css("-ms-transform","translate(0px,0px)");
 				$("#modalContacts").css("-o-transform","translate(0px,0px)");
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
	});