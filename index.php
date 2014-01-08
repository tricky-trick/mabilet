<?php
if (!isset($_COOKIE['trainWelcomeFrame'])) {
setcookie("trainWelcomeFrame","Hello!", time() + 3600*24*365);
}
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<link rel="stylesheet" href="css/style.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ajax.js"></script>
	<script src="js/modal.js"></script>
</head>
<body>
	<!-- Вікно авторизації-->
	<div id="modalAuth" class="modal">
		<a href class="closeModal" id="closeAuth"><img src="img/close.png"></a>
		<h3 style="width:100%; text-align:center;">Квиткове побажання</h3>
		<br>
			<ul style="list-style:none;">
				<li>
					<label for="user_email">E-mail:</label>
					<input name="user_email" id="email" class="input" type="email" maxlength="30">
				</li>
				<br>
				<br>
				<li>
					<label for="user_pwd">Пароль:</label>
					<input name="user_pwd" id="password" class="input" type="password" maxlength="30">
				</li>
				<br>
				<br>
				<li>
					<input type="submit" value="Вперед!" id="getsearch">
				</li>
				<br>
				<br>

			</ul>
			<br>
			<a href id="registerAuth">Новий користувач<a/>
			<a href id="getRemPwdModal">Забули пароль?<a/>

	</div>
<!-- Вікно реєстрації-->
	<div id="modalRegister" class="modal">
		<a href class="closeModal" id="closeRegister"><img src="img/close.png"></a>
		<h3 style="width:100%; text-align:center;">Новий користувач</h3>
			<ul style="list-style:none;">
				<li>
					<label for="user_name">Ім'я *</label>
					<input name="user_name" class="input" type="text" maxlength="30">
				</li>
				
				<br>
				<li>
					<label for="user_sname">Прізвище *</label>
					<input name="user_sname" class="input" type="text" maxlength="30">
				</li>
				<br>
				<br>
				<li>
					<label for="user_email">E-mail *</label> 
					<input name="user_email" class="input" type="email" maxlength="40">
				</li>
				
				<br>
				<li>
					<label for="user_pwd">Пароль *</label>
					<input name="user_pwd" class="input" type="password" maxlength="40" minlength="8">
				</li>
				
				<br>
				<li>
					<label for="user_repwd">Підтвердіть пароль *</label>
					<input name="user_repwd" class="input" type="password" maxlength="40" minlength="8">
				</li>
				<br>
				<br>
				
				<li>
					<label for="user_phone">Телефон: </label>

					<select id = "phone_code">
					  <option value="039">039</option>
					  <option value="050">050</option>
					  <option value="063">063</option>
					  <option value="066">066</option>
					  <option value="067">067</option>
					  <option value="068">068</option>
					  <option value="091">091</option>
					  <option value="092">092</option>
					  <option value="093">093</option>
					  <option value="094">094</option>
					  <option value="095">095</option>
					  <option value="096">096</option>
					  <option value="097">097</option>
					  <option value="098">098</option>
					  <option value="099">099</option>
					</select>
					<input id= "user_phone" name="user_phone" class="input" type="tel" maxlength="9" onkeypress="validatePhone(event)" value="">
				</li>
				
				<br>
				<li>
					<label for="contactname">Вкажіть символи *</label>
					<img style="border: 1px solid gray; background: url('img/bg_capcha.png'); background-size:100% 100%;" src ="capcha.php" height="40" />
					<input id="capcha" class = "input" type="text"  name="capcha" value="" required="required" maxlength="6" />
				</li>
				<br>
				
				<li>
					<input type="submit" value="ОК" id="reg_button">
				</li>

			</ul>

	</div>
		<!-- Вікно відновлення пароля-->
	<div id="modalRemPwd" class="modal">
		<a href class="closeModal" id="closeRemPwd"><img src="img/close.png"></a>
		<h3 style="width:100%; text-align:center;">Нагадати пароль</h3>
		<br>
		<p style="width: 90%; margin-left: 6.5%;">Будь-ласка введіть Ваш E-mail, що був вказаний при реєстрації.</p>
			
			<ul style="list-style:none;">
				<li>
					<label for="user_email">E-mail:</label>
					<input name="user_email" id="emailgetpwd" class="input" type="email" maxlength="30">
				</li>
				
		<p style="width: 100%;">Перевірте Вашу електронну скриньку для отримання паролю.</p>
				<br>
				<li>
					<input type="submit" value="Надіслати" id="getpwd">
				</li>

			</ul>
			<br>

	</div>

	<!-- Вікно підтвердження реєстрації-->
	<div id="modalAuthConf" class="modal">
		<a href class="closeModal" id="closeAuthConf"><img src="img/close.png"></a>
		<h3 style="width:100%; text-align:center;">Підтвердити реєстрацію</h3>
		<p style="width: 80%; margin-left: 11%; margin-right: 9%;">На Вашу поштову скриньку було відправлено листа з кодом. Будь ласка, вкажіть код в поле "Код" для підтвердження реєстрації.</p>
			<ul style="list-style:none;">
				<li>
					<label for="user_email">Ваш e-mail</label>
					<input name="user_email" id="emailcodeConf" class="input" type="email" maxlength="40" readonly style="user-select: none; background-color: #FAFAFA;">
				</li>
				<br>
				<br>
				<li>
					<label for="user_code">Код</label>
					<input name="user_code" id="codeConf" class="input" type="text" maxlength="7">
				</li>
				<br>
				<br>
				<li>
					<input type="submit" value="Надіслати" id="getconfcode">
				</li>

			</ul>
			<br>

	</div>

    <div id="modalInstruction" class="modal">
        <a href class="closeModal" id="closeInstruction"><img src="img/close.png"></a>
        <h3 style="width:100%; text-align:center;">Прості правила</h3>
        <p style="width:90%; margin-left:8%; font-size: 16px;">
1. Заповнити форму пошуку згідно Ваших вимог<br><br>
2. Підтвердити форму, натиснувши кнопку "Знайти квиток"<br><br>
3. Якщо потяг знайдено, Ви можете забронювати його, вибравши "Місця"<br><br>
4. В цьому випадку Ви будете спрямовані на офіційний сайт Укр-Залізниці, де Ви зможете забронювати або придбати квиток без комісії<br><br>
5. Якщо вільних квитків не було знайдено згідно Ваших пошукових даних, Ви можете створити "Квиткове побажання"<br><br>
6. Натисніть "Повідомити коли будуть місця", введіть Ваш логін та пароль або створіть нового користувача (якщо Ви попередньо не були зареєстровані)<br><br>
7. Перевірте Вашу поштову скриньку, на яку повинен надійти лист, про те, що "Квиткове побажання" було створене успішно<br><br>
8. Вуаля! Ви можете йти пити чай. Як тільки з'являться Ваші квитки, maBilet повідомить Вас про це листом<br></p>

    </div>

       <div id="modalContacts" class="modal">
        <a href class="closeModal" id="closeContacts"><img src="img/close.png"></a>
        <h3 style="width:100%; text-align:center;">Напишіть нам листа</h3>
        <div id="contact-wrapper"> 
            <div> 
            <label for="name"><strong>Ваш email *</strong></label> 
            <input name="contactname" type="email" id="contactname" value="" /> 
            </div> 
           <div> 
            <label for="message"><strong>Повідомлення *</strong></label> 
            <textarea rows="5" cols="50" name="message" id="message"></textarea> 
            </div> 
  
           <input type="submit" value="Надіслати" name="submit" id="sendmessage"/> 

           </div> 

    </div>
    <?php
if (!isset($_COOKIE['trainWelcomeFrame'])) {
?>
	<div id="modalWelcome" class="modal">
        <a href class="closeModal" id="closeWelcome"><img src="img/close.png"></a>
        <h3 style="width:100%; text-align:center;">Вітаємо на maBilet!</h3>
        <p style="width:90%; margin-left:8%; font-size: 16px;">Ви потрапили на перший в Україні "правильний" ресурс пошуку поїздів.<br><br>
Чому правильний? Тому що ми шукаємо поїзди замість Вас :) <br><br>
У нас тільки одне правило - Ви створюєте своє "квиткове побажання", а ми подбаєм про те, щоб воно було знайдено у найкоротші терміни. <br><br>
Отже, вперед!</p>

    </div>
    <?php
}
?>


<div id="headblock">
	<a href id="register">Реєстрація<a/> &nbsp&nbsp
	<a href id="how_to">Інструкція</a> &nbsp&nbsp
	<a href id="contacts">Контакти</a>
</div>
	<div id="main">
		<div class="group">
			<label for="stfrom">Звідки</label> <br>
			<input name="stfrom" id="stfrom" type="text" value="" autofocus="autofocus" onkeypress="validateName(event, 'stfrom')"/>
		</div>
		<img id="change" src="img/change.png">
		<div class="group">
			<label for="stfrom">Куди</label> <br>
			<input name="stto" id="stto" type="text" value="" onkeypress="validateName(event, 'stto')"/>
		</div>
		<br>
		<br>
		<select id = "placetype">
		  <option value="0" selected>Любий тип вагону</option>
		  <option value="1">Люкс</option>
		  <option value="2">Купе</option>
		  <option value="3">Плацкарт</option>
		  <option value="4">Загальні</option>
		</select>
		<input type="text" id="datepicker" value="" maxlength="10" readonly/>
		<select id="timefrom" style="margin-left: -2.3%">
			<option value="00:00" selected></option>
			<option value="00:30"></option>
			<option value="01:00"></option>
			<option value="01:30"></option>
			<option value="02:00"></option>
			<option value="02:30"></option>
			<option value="03:00"></option>
			<option value="03:30"></option>
			<option value="04:00"></option>
			<option value="04:30"></option>
			<option value="05:00"></option>
			<option value="05:30"></option>
			<option value="06:00"></option>
			<option value="06:30"></option>
			<option value="07:00"></option>
			<option value="07:30"></option>
			<option value="08:00"></option>
			<option value="08:30"></option>
			<option value="09:00"></option>
			<option value="09:30"></option>
			<option value="10:00"></option>
			<option value="10:30"></option>
			<option value="11:00"></option>
			<option value="11:30"></option>
			<option value="12:00"></option>
			<option value="12:30"></option>
			<option value="13:00"></option>
			<option value="13:30"></option>
			<option value="14:00"></option>
			<option value="15:00"></option>
			<option value="15:30"></option>
			<option value="16:00"></option>
			<option value="16:30"></option>
			<option value="17:00"></option>
			<option value="17:30"></option>
			<option value="18:00"></option>
			<option value="18:30"></option>
			<option value="19:00"></option>
			<option value="19:30"></option>
			<option value="20:00"></option>
			<option value="20:30"></option>
			<option value="21:00"></option>
			<option value="21:30"></option>
			<option value="22:00"></option>
			<option value="22:30"></option>
			<option value="23:00"></option>
			<option value="23:30"></option>
			<option value="23:59"></option>
		</select> - 
		<select id="timeto">
			<option value="00:00"></option>
			<option value="00:30"></option>
			<option value="01:00"></option>
			<option value="01:30"></option>
			<option value="02:00"></option>
			<option value="02:30"></option>
			<option value="03:00"></option>
			<option value="03:30"></option>
			<option value="04:00"></option>
			<option value="04:30"></option>
			<option value="05:00"></option>
			<option value="05:30"></option>
			<option value="06:00"></option>
			<option value="06:30"></option>
			<option value="07:00"></option>
			<option value="07:30"></option>
			<option value="08:00"></option>
			<option value="08:30"></option>
			<option value="09:00"></option>
			<option value="09:30"></option>
			<option value="10:00"></option>
			<option value="10:30"></option>
			<option value="11:00"></option>
			<option value="11:30"></option>
			<option value="12:00"></option>
			<option value="12:30"></option>
			<option value="13:00"></option>
			<option value="13:30"></option>
			<option value="14:00"></option>
			<option value="15:00"></option>
			<option value="15:30"></option>
			<option value="16:00"></option>
			<option value="16:30"></option>
			<option value="17:00"></option>
			<option value="17:30"></option>
			<option value="18:00"></option>
			<option value="18:30"></option>
			<option value="19:00"></option>
			<option value="19:30"></option>
			<option value="20:00"></option>
			<option value="20:30"></option>
			<option value="21:00"></option>
			<option value="21:30"></option>
			<option value="22:00"></option>
			<option value="22:30"></option>
			<option value="23:00"></option>
			<option value="23:30"></option>
			<option value="23:59" selected></option>
		</select>
		<br>
		<br>
		<input name="ok" id="ok" type="submit" value="Знайти квиток"/>
	</div>
	<img id="ajax-loader" src="img/ajax-loader.gif">
	<div id="out">
	</div>
	<br>
	<br>
<!--<div id="footer">
	<a href id="how_to">Інструкція</a> . 
	<a href id="contacts">Контакти</a>
</div>-->
<div id="dialog" title="Отакої">
	<p></p>
</div>
</body>
</html>