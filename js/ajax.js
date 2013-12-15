$(document).ready(function(){
  //Search button
      $("#ok").click(function()
               {
                if(($("#stto").val() == "") && ($("#stfrom").val() == ""))
               {
                $("#stto, #stfrom").fadeOut(200);
                $("#stto, #stfrom").fadeIn(200);
               }
               else if(($("#stfrom").val() == ""))
               {
                $("#stfrom").fadeOut(200);
                $("#stfrom").fadeIn(200);
               }
              else if(($("#stto").val() == ""))
               {
                $("#stto").fadeOut(200);
                $("#stto").fadeIn(200);
               }
               else
               {
               var gifimg = $("#ajax-loader");
               var stfrom = $("#stfrom").attr("value").split(":")[1].replace(" ", "");
               var stto = $("#stto").attr("value").split(":")[1].replace(" ", "");
               var name_stfrom = $("#stfrom").attr("value").split(":")[0].replace(" ", "");
               var name_stto = $("#stto").attr("value").split(":")[0].replace(" ", "");
               var date = $("#datepicker").attr("value");
               var timefrom = $("#timefrom").attr("value");
               var timeto = $("#timeto").attr("value");
               var placetype = $("#placetype").attr("value");
               var dataString = 'stfrom='+ stfrom + '&stto=' + stto + '&date=' + date + "&timefrom=" + timefrom + "&timeto=" + timeto + "&station_name=" + name_stfrom + " - " + name_stto + "&placetype=" + placetype;
               var parent = $(this);
               var out = $("#out");
               out.fadeOut(200);
               gifimg.fadeIn(100);
               var done = $.ajax({
               type: "GET",
               url: "codes_new.php",
               data: dataString,
               cache: false,
               });
               done.done(function(html)
               {
               out.html(html);
               out.fadeIn(200);
               gifimg.fadeOut(100);
               });
             }

           });

      //Reg button
      $("#reg_button").click(function()
               {
               var parent = $("#modalRegister");

               var user_name = $("#modalRegister input[name='user_name']");
               var user_sname = $("#modalRegister input[name='user_sname']");
               var user_email = $("#modalRegister input[name='user_email']");
               var user_pwd = $("#modalRegister input[name='user_pwd']");
               var user_repwd = $("#modalRegister input[name='user_repwd']");
               var user_phone = $("#modalRegister input[name='user_phone']");
               var user_phone_code = $("#phone_code");
               var user_city = $("#modalRegister input[name='user_city']");
               var capcha = $("#modalRegister input[name='capcha']");

               if(user_name.val().replace(/^\s+|\s+$/g, "") == "" || user_sname.val().replace(/^\s+|\s+$/g, "") == "" || user_email.val().replace(/^\s+|\s+$/g, "") == "" || user_pwd.val().replace(/^\s+|\s+$/g, "") == "" || user_repwd.val().replace(/^\s+|\s+$/g, "") == "")
               {
                /*$("#modalRegister .errorMsg").css("color","red");
                $("#modalRegister .errorMsg").text("Будь ласка, заповніть всі поля з * !");
                $("#modalRegister .errorMsg").fadeIn(300);*/
                if(user_name.val().replace(/^\s+|\s+$/g, "") == "")
                {
                user_name.css("color","red");
                user_name.val("Заповніть це поле");
                }
                if(user_sname.val().replace(/^\s+|\s+$/g, "") == "")
                {
                user_sname.css("color","red");
                user_sname.val("Заповніть це поле");
                }
                if(user_email.val().replace(/^\s+|\s+$/g, "") == "")
                {
                user_email.css("color","red");
                user_email.val("Заповніть це поле");
                }
                if(user_pwd.val().replace(/^\s+|\s+$/g, "") == "")
                {
                user_pwd.css("color","red");
                user_pwd.val("Заповніть це поле");
                }
                if(user_repwd.val().replace(/^\s+|\s+$/g, "") == "")
                {
                user_repwd.css("color","red");
                user_repwd.val("Заповніть це поле");
                }
                if(capcha.val().replace(/^\s+|\s+$/g, "") == "")
                {
                capcha.css("color","red");
                capcha.val("Заповніть це поле");
                }
                setTimeout(function(){
                if(user_name.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                user_name.css("color","black");
                user_name.val("");
                }
                if(user_sname.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                user_sname.css("color","black");
                user_sname.val("");
                }
                if(user_email.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                user_email.css("color","black");
                user_email.val("");
                }
                if(user_pwd.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                user_pwd.css("color","black");
                user_pwd.val("");
                }
                if(user_repwd.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                user_repwd.css("color","black");
                user_repwd.val("");
                }
                if(capcha.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                capcha.css("color","black");
                capcha.val("");
                }
                }, 1500);
               }
               else
               {
                if(user_pwd.val().replace(/^\s+|\s+$/g, "").length<8)
                {
                $( "#dialog>p" ).text("Довжина пароля повинна бути мінімум 8 символів");
                $( "#dialog" ).dialog();
                }
                else
                {
                if(user_pwd.val().replace(/^\s+|\s+$/g, "") != user_repwd.val().replace(/^\s+|\s+$/g, ""))
                {
                $( "#dialog>p" ).text("Паролі не співпадають");
                $( "#dialog" ).dialog();
                }
                else
                {
                var reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
                if(!reg.test(user_email.val()))
               {
                $( "#dialog>p" ).text("Введіть e-mail, а не будь-що!");
                $( "#dialog" ).dialog();
               }

                else{
               var dataStringReg = 'user_name=' + user_name.val() + '&user_sname=' + user_sname.val() + '&user_email=' + user_email.val() + '&user_pwd=' + user_pwd.val() + '&user_repwd=' + user_repwd.val() + '&user_city=' + user_city.val() + '&user_phone=38' + user_phone_code.val() + user_phone.val().replace("-","").replace("-","").replace("\"","").replace("\'","") + '&capcha=' + capcha.val();
              var res = $.ajax({
               type: "POST",
               url: "registration.php",
               data: dataStringReg,
               status: 200,
               statusText: "OK",
               cache: false,
              });

            res.done(function(datas)
               {
                if(datas.indexOf("true") == 0)
                {
                 $("#emailcodeConf").val(user_email.val());
                 
                 user_name.val("");
                 user_sname.val("");
                 user_pwd.val("");
                 user_repwd.val("");
                 user_email.val("");
                 user_phone.val("");
                 user_city.val("");
                 capcha.val("");

                $("#modalAuthConf").css("opacity","1")
                $("#modalAuthConf").css("-webkit-transform","translate(0px,0px)");
                $("#modalAuthConf").css("-moz-transform","translate(0px,0px)");
                $("#modalAuthConf").css("-ms-transform","translate(0px,0px)");
                $("#modalAuthConf").css("-o-transform","translate(0px,0px)");

                 setTimeout(function() {
                 $("#modalRegister").css("opacity","0");
                $("#modalRegister").css("-webkit-transform","translate(0px,-1000px)");
                $("#modalRegister").css("-moz-transform","translate(0px,-1000px)");
                $("#modalRegister").css("-ms-transform","translate(0px,-1000px)");
                $("#modalRegister").css("-o-transform","translate(0px,-1000px)");
                 } , 1000);
               }
               else
               {
               if(datas.indexOf("false") == 0)
               {
                $( "#dialog>p" ).text("Користувач з таким іменем та поштовою скринькою вже існує");
                $( "#dialog" ).dialog();
               }
                if(datas.indexOf("capcha") == 0)
                {
               $( "#dialog>p" ).text("Символи з малюнку введені невірно");
                $( "#dialog" ).dialog();
                }
             }
           
           });
           }
         }
         }
       }
           });

//Search
      $("#getsearch").click(function()
               {
               if(($("#stfrom").val() == "") || ($("#stto").val() == ""))
               {
                $("#stfrom, #stto").fadeOut(200);
                $("#stfrom, #stto").fadeIn(200);
               }
               else
               {
                $("#modalAuth .errorMsg").fadeOut(10);
               var email = $("#email");
               var pwd = $("#password");
               var stfromname = $("#stfrom").attr("value").split(":")[0].replace(" ", "");
               var sttoname = $("#stto").attr("value").split(":")[0].replace(" ", "");
               var stfrom = $("#stfrom").attr("value").split(":")[1].replace(" ", "");
               var stto = $("#stto").attr("value").split(":")[1].replace(" ", "");
               var date = $("#datepicker").attr("value");
               var timefrom = $("#timefrom").attr("value");
               var timeto = $("#timeto").attr("value");
               var placetype = $("#placetype").attr("value");
               var dataString = 'email=' + email.val() + '&password=' + pwd.val() + '&rout_d='+ stfrom + '-' + stto + '&rout_date=' + date + '&rout_time=' + timefrom + '-' + timeto + '&stnamedirection=' + stfromname + ' - ' + sttoname + "&placetype=" + placetype;
               var parent = $(this);
               if(email.val().replace(/^\s+|\s+$/g, "") == "" || pwd.val().replace(/^\s+|\s+$/g, "") == "")
               {
                 if(email.val().replace(/^\s+|\s+$/g, "") == "")
                {
                email.css("color","red");
                email.val("Заповніть це поле");
                }
                 if(pwd.val().replace(/^\s+|\s+$/g, "") == "")
                {
                pwd.css("color","red");
                pwd.val("Заповніть це поле");
                }
                setTimeout(function(){
                if(email.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                email.css("color","black");
                email.val("");
                }
                if(pwd.val().replace(/^\s+|\s+$/g, "") == "Заповніть це поле")
                { 
                pwd.css("color","black");
                pwd.val("");
                }
                }, 1500);
               }
               else{
               var done = $.ajax({
               type: "POST",
               url: "login.php",
               data: dataString,
               cache: false,
               });
               done.done(function(html)
               {
                $("#modalAuth .errorMsg").fadeIn(300);
              if(html.indexOf("login_false") == 0)
               {
                $( "#dialog>p" ).text("Такий користувач не існує!");
                $( "#dialog" ).dialog();
               }
              if(html.indexOf("login_true") == 0)
               {
                $("#email").val("");
                $("#password").val("");
                  setTimeout(function() {
                 $("#modalAuth").css("opacity","0");
                $("#modalAuth").css("-webkit-transform","translate(0px,-1000px)");
                $("#modalAuth").css("-moz-transform","translate(0px,-1000px)");
                $("#modalAuth").css("-ms-transform","translate(0px,-1000px)");
                $("#modalAuth").css("-o-transform","translate(0px,-1000px)");
                 } , 1000);

               }
              if(html.indexOf("login_limit") == 0)
               {
                $( "#dialog>p" ).text("У Вас вже є 3 активних запита. Дочекайтеся, поки один із запитів деактивується.");
                $( "#dialog" ).dialog();
               }
               });
            }
          }
           });


$("#getpwd").click(function()
               {
               var email = $("#emailgetpwd");
               var reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
              if(!reg.test(email.val()))
               {
                email.css("color","red");
                email.val("Вкажіть Е-mail, а не будь-що!");
                setTimeout(function(){
                email.css("color","black");
                email.val("");
                }, 1500);
               }
               else
               {
               var dataString = 'email='+ email.val();
               var done = $.ajax({
               type: "POST",
               url: "getpwd.php",
               data: dataString,
               cache: false,
               });
               done.done(function(html)
               {
                 email.val("");
              setTimeout(function() {
                 $("#modalRemPwd").css("opacity","0");
                $("#modalRemPwd").css("-webkit-transform","translate(0px,-1000px)");
                $("#modalRemPwd").css("-moz-transform","translate(0px,-1000px)");
                $("#modalRemPwd").css("-ms-transform","translate(0px,-1000px)");
                $("#modalRemPwd").css("-o-transform","translate(0px,-1000px)");
                 } , 1000);

           });
             }

          });

$("#getconfcode").click(function()
               {
               var email = $("#emailcodeConf").val();
               var code = $("#codeConf");
               var dataString = 'email='+ email + '&code=' + code.val();
               var done = $.ajax({
               type: "POST",
               url: "regconfirmation.php",
               data: dataString,
               cache: false,
               });
               done.done(function(html)
               {
                 if(html.indexOf("true") == 0)
                 {
                 setTimeout(function() {
                 $("#modalAuthConf").css("opacity","0");
                $("#modalAuthConf").css("-webkit-transform","translate(0px,-1000px)");
                $("#modalAuthConf").css("-moz-transform","translate(0px,-1000px)");
                $("#modalAuthConf").css("-ms-transform","translate(0px,-1000px)");
                $("#modalAuthConf").css("-o-transform","translate(0px,-1000px)");
                 } , 1000);
                $("#codeConf").val("");

                 }
                 else
                 {
                   $( "#dialog>p" ).text("Код невірний! Перевірте і спробуйте ще раз");
                   $( "#dialog" ).dialog();
                 }

              });

          });

$("#sendmessage").click(function()
               {
               var email = $("#contactname");
               var message = $("#message");
               var reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
              if(!reg.test(email.val()))
               {
                email.css("color","red");
                email.val("Вкажіть Е-mail, а не будь-що!");
                setTimeout(function(){
                email.css("color","black");
                email.val("");
                }, 1500);
               }
               else
               {
               var dataString = 'email='+ email.val() + '&message=' + message.val();
               var done = $.ajax({
               type: "POST",
               url: "contacts.php",
               data: dataString,
               cache: false,
               });
               done.done(function(html)
               {
                 message.val("");
              setTimeout(function() {
                 $("#modalContacts").css("opacity","0");
                $("#modalContacts").css("-webkit-transform","translate(0px,-1000px)");
                $("#modalContacts").css("-moz-transform","translate(0px,-1000px)");
                $("#modalContacts").css("-ms-transform","translate(0px,-1000px)");
                $("#modalContacts").css("-o-transform","translate(0px,-1000px)");
                 } , 1000);

           });
             }

          });

    });