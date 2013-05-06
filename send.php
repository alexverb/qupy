<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<title>Qupy.ru</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="form.js"></script>
<script>
$(document).ready(function() {
	var ser = $("form[name=feedback_form] input[name=name]").val();
	if(ser == '') {
			$("#one").removeClass().addClass('field invalid');
		}
		else {
			var reg = /[^a-zа-яё\s]/gim;
			var search_name = ser.search(reg);
			if(search_name == -1) {
				$("#one").removeClass().addClass('field valid');
			}
			else {
				$("#one").removeClass().addClass('field invalid');
			}
		}
		var sera = $("form[name=feedback_form] input[name=e-mail]").val();
		if(sera == '') {
			$("#two").removeClass().addClass('field invalid');
		}
		else {
			var rega = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/;
			var search_email = sera.search(rega);
			if(search_email == 0) {
				$("#two").removeClass().addClass('field valid');
			}
			else {
				$("#two").removeClass().addClass('field invalid');
			}
		}
});
</script>
</head>

<body>
<div id="wrap">
<div id="main" class="clearfix">
<div id="header">
	<ul class="nav">
		<li><a href="#">Портфолио</a></li>
		<li><a href="#">Услуги</a></li>
		<li><a href="#">Клиентам</a></li>
	</ul>
	<a href="#" class="logo" title="Qupy.ru - на главную"></a>
	<div class="phones">
		<div>тел.<span>8 (961) 77 32 48</span></div>
		<div>тел.<span>8 (961) 77 32 48</span></div>
	</div>
</div><!-- /#header -->

<div id="content" class="page-contacts">
	<h2>Форма обратной связи</h2>
	<div class="contacts-container">
		<?
			if(isset($_POST['name'])) {$name = $_POST['name'];if($name == '') {unset($name);}}
			if(isset($_POST['e-mail'])) {$email = $_POST['e-mail'];if($email == '') {unset($email);}}
			if(isset($_POST['subject'])) {$subject = $_POST['subject'];if($subject == '') {$subject = "No subject";}}
			if(isset($_POST['message'])) {$message = $_POST['message'];if($message == '') {unset($message);}}
			
					if(!isset($name)) {echo '<p class="error_info">Укажите свое имя!</p>';}
					if(!isset($email)) {echo '<p class="error_info">Укажите адрес эл-почты!</p>';}
					if(!isset($message)) {echo '<p class="error_info">Вы не написали сообщение!</p>';}					
					
			if(!isset($name)) {
				echo '
					<form class="contact-form" action="send.php" method="POST" name="feedback_form">
						<div class="field" id="one">
							<label for="name">Ваше имя:</label>
							<input id="name" type="text" placeholder="Ваше имя" name="name" value="'.$name.'">
						</div>
						<div class="field" id="two">
							<label for="email">Ваше е-майл:</label>
							<input id="email" type="text" placeholder="name@email.com" name="e-mail" value="'.$email.'">
						</div>
						<div class="field">
							<label for="subject">Тема:</label>
							<input id="subject" type="text" placeholder="RE: Тема" name="subject" value="'.$subject.'">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение:</label>
							<textarea id="message" placeholder="Доброго времени суток..." name="message">'.$message.'</textarea>
						</div>
						<input type="submit" class="submit" value="Отправить" />
					</form><!-- /.contact-form --> 
					<div class="contacts">
						<div class="callback">
							<h3>Позвонить нам:</h3>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
						</div>
						<div class="address">
							<h3>Наш адрес:</h3>
							<span class="city">г. Ростов-на-Дону</span>
							<span>ул. Горького 2/36</span>
							<span class="city">г. Самара</span>
							<span>ул. Горького 2/36</span>				
						</div>
						<div class="social">
							<a href="#" class="btn" id="fb" title="Наша группа в Facebook"></a>
							<a href="#" class="btn" id="tw" title="Следите за нами в Twitter"></a>
							<a href="#" class="btn" id="yt" title="Наш канал YouTube"></a>
							<a href="#" class="btn" id="soc" title=""></a>
						</div>
					</div><!-- /.contacts -->
				';
			}
			else {
				$search_name = preg_match('@[A-zА-я]@u',$name);
				if($search_name == 0) {
					echo '<p class="error_info">Имя должно содержать только буквы!</p>';
					echo '
					<form class="contact-form" action="send.php" method="POST" name="feedback_form">
						<div class="field" id="one">
							<label for="name">Ваше имя:</label>
							<input id="name" type="text" placeholder="Ваше имя" name="name" value="'.$name.'">
						</div>
						<div class="field" id="two">
							<label for="email">Ваше е-майл:</label>
							<input id="email" type="text" placeholder="name@email.com" name="e-mail" value="'.$email.'">
						</div>
						<div class="field ">
							<label for="subject">Тема:</label>
							<input id="subject" type="text" placeholder="RE: Тема" name="subject" value="'.$subject.'">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение:</label>
							<textarea id="message" placeholder="Доброго времени суток..." name="message">'.$message.'</textarea>
						</div>
						<input type="submit" class="submit" value="Отправить" />
					</form><!-- /.contact-form --> 
					<div class="contacts">
						<div class="callback">
							<h3>Позвонить нам:</h3>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
						</div>
						<div class="address">
							<h3>Наш адрес:</h3>
							<span class="city">г. Ростов-на-Дону</span>
							<span>ул. Горького 2/36</span>
							<span class="city">г. Самара</span>
							<span>ул. Горького 2/36</span>				
						</div>
						<div class="social">
							<a href="#" class="btn" id="fb" title="Наша группа в Facebook"></a>
							<a href="#" class="btn" id="tw" title="Следите за нами в Twitter"></a>
							<a href="#" class="btn" id="yt" title="Наш канал YouTube"></a>
							<a href="#" class="btn" id="soc" title=""></a>
						</div>
					</div><!-- /.contacts -->
				';   
				}
				else {
					if(!isset($email)) {
									   echo '
					<form class="contact-form" action="send.php" method="POST" name="feedback_form">
						<div class="field" id="one">
							<label for="name">Ваше имя:</label>
							<input id="name" type="text" placeholder="Ваше имя" name="name" value="'.$name.'">
						</div>
						<div class="field" id="two">
							<label for="email">Ваше е-майл:</label>
							<input id="email" type="text" placeholder="name@email.com" name="e-mail" value="'.$email.'">
						</div>
						<div class="field">
							<label for="subject">Тема:</label>
							<input id="subject" type="text" placeholder="RE: Тема" name="subject" value="'.$subject.'">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение:</label>
							<textarea id="message" placeholder="Доброго времени суток..." name="message">'.$message.'</textarea>
						</div>
						<input type="submit" class="submit" value="Отправить" />
					</form><!-- /.contact-form --> 
					<div class="contacts">
						<div class="callback">
							<h3>Позвонить нам:</h3>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
						</div>
						<div class="address">
							<h3>Наш адрес:</h3>
							<span class="city">г. Ростов-на-Дону</span>
							<span>ул. Горького 2/36</span>
							<span class="city">г. Самара</span>
							<span>ул. Горького 2/36</span>				
						</div>
						<div class="social">
							<a href="#" class="btn" id="fb" title="Наша группа в Facebook"></a>
							<a href="#" class="btn" id="tw" title="Следите за нами в Twitter"></a>
							<a href="#" class="btn" id="yt" title="Наш канал YouTube"></a>
							<a href="#" class="btn" id="soc" title=""></a>
						</div>
					</div><!-- /.contacts -->
				';
					}
					else {
						$template = '/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i';
						$search_email = preg_match($template, $email);
						if($search_email == 0) {
							echo '<p class="error_info">Недействительный E-mail!</p>';
											echo '
					<form class="contact-form" action="send.php" method="POST" name="feedback_form">
						<div class="field" id="one">
							<label for="name">Ваше имя:</label>
							<input id="name" type="text" placeholder="Ваше имя" name="name" value="'.$name.'">
						</div>
						<div class="field" id="two">
							<label for="email">Ваше е-майл:</label>
							<input id="email" type="text" placeholder="name@email.com" name="e-mail" value="'.$email.'">
						</div>
						<div class="field">
							<label for="subject">Тема:</label>
							<input id="subject" type="text" placeholder="RE: Тема" name="subject" value="'.$subject.'">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение:</label>
							<textarea id="message" placeholder="Доброго времени суток..." name="message">'.$message.'</textarea>
						</div>
						<input type="submit" class="submit" value="Отправить" />
					</form><!-- /.contact-form --> 
					<div class="contacts">
						<div class="callback">
							<h3>Позвонить нам:</h3>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
						</div>
						<div class="address">
							<h3>Наш адрес:</h3>
							<span class="city">г. Ростов-на-Дону</span>
							<span>ул. Горького 2/36</span>
							<span class="city">г. Самара</span>
							<span>ул. Горького 2/36</span>				
						</div>
						<div class="social">
							<a href="#" class="btn" id="fb" title="Наша группа в Facebook"></a>
							<a href="#" class="btn" id="tw" title="Следите за нами в Twitter"></a>
							<a href="#" class="btn" id="yt" title="Наш канал YouTube"></a>
							<a href="#" class="btn" id="soc" title=""></a>
						</div>
					</div><!-- /.contacts -->
				';
							
						}
						else {
							if(!isset($message)) {
												echo '
					<form class="contact-form" action="send.php" method="POST" name="feedback_form">
						<div class="field" id="one">
							<label for="name">Ваше имя:</label>
							<input id="name" type="text" placeholder="Ваше имя" name="name" value="'.$name.'">
						</div>
						<div class="field" id="two">
							<label for="email">Ваше е-майл:</label>
							<input id="email" type="text" placeholder="name@email.com" name="e-mail" value="'.$email.'">
						</div>
						<div class="field">
							<label for="subject">Тема:</label>
							<input id="subject" type="text" placeholder="RE: Тема" name="subject" value="'.$subject.'">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение:</label>
							<textarea id="message" placeholder="Доброго времени суток..." name="message">'.$message.'</textarea>
						</div>
						<input type="submit" class="submit" value="Отправить" />
					</form><!-- /.contact-form --> 
					<div class="contacts">
						<div class="callback">
							<h3>Позвонить нам:</h3>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
							<div class="phone">тел.<span>8 (961) 77 32 48</span></div>
						</div>
						<div class="address">
							<h3>Наш адрес:</h3>
							<span class="city">г. Ростов-на-Дону</span>
							<span>ул. Горького 2/36</span>
							<span class="city">г. Самара</span>
							<span>ул. Горького 2/36</span>				
						</div>
						<div class="social">
							<a href="#" class="btn" id="fb" title="Наша группа в Facebook"></a>
							<a href="#" class="btn" id="tw" title="Следите за нами в Twitter"></a>
							<a href="#" class="btn" id="yt" title="Наш канал YouTube"></a>
							<a href="#" class="btn" id="soc" title=""></a>
						</div>
					</div><!-- /.contacts -->
				';
							}
							else {
								$send_mail = mail("zakaz@qupy.ru",$subject, "Получено новое сообщение через форму обратной связи: \n Автор: $name \n E-mail: $email \n Текст сообщения: $message");
								if($send_mail == true) {
									echo '<p class="send_info">Сообщение успешно отправлено!</p>';
								}
								else {
									echo "Ошибка при отправке сообщения!";
								}
							}
						}
					}
				}
			}
		?>
	</div><!-- /.contacts-container -->
	<div class="container">
		<div class="content-block">
			<div class="timetable">
				<h2>График работы:</h2>
				<span>Пн-Пт: 9:30 - 18:30</span>
				<span>Сб, Вс - выходной</span>
			</div>
			<div class="payment">
				<h2>Мы принимаем:</h2>
				<img src="images/payment/icon-mastercard.png" />
				<img src="images/payment/icon-visa.png" />
				<img src="images/payment/icon-maestro.png" />
				<img src="images/payment/icon-webmoney.png" />
			</div>
		</div>
		<div class="content-block">
			<div class="map">
				<h2>Схема проезда:</h2>		
			</div>
		</div>
	</div>
</div><!-- /#content -->
</div><!-- /#main -->
</div><!-- /#wrap -->

<div id="footer">
	<div class="container">
		<ul class="nav">
			<li><a href="#">О сайте</a></li>
			<li><a href="#">Обратная связь</a></li>
			<li><a href="#">Портфолио</a></li>
			<li><a href="#">Сделать заказ</a></li>
		</ul>
		<div class="copyright">
			<span>Copyright &copy; 2012 QUPY.RU</span>
			<span>Любое копирование запрещено</span>
		</div>
		<div class="stats">
			<img src="" />
			<img src="" />
			<img src="" />
		</div>
	</div><!-- /.container -->
</div><!-- /#footer -->
</body>
</html>