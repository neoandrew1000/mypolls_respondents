<!DOCTYPE html>
<html lang="en">

<!--
+++подключение шрифтов
___базовое форматирование
___базовые заливки и фоны
+__меню переключения
___svg
___img
___текст
___верстка
___тестирование
___постобработка, анимация
___добавление форм
___стили форм
___тестирование

-->

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="sass/build/css/jquery.fullpage.css" />
	<link rel="stylesheet" href="sass/build/css/style.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.2/jquery.fullPage.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>	
</head>
<body>
	<nav id="wrapMenu">
		<!-- Логотип с названием слева -->
	    <ul class="menu" id="logo">
		    <li><!-- LOGO SVG --></li>
		    <li><!-- LOGO DOMEN NAME --></li>
		</ul>
		<!-- Меню справа -->
		<ul class="menu" id="rightMenu">
			<li class="redirect"><a href="http">Вход для создателей</a></li>
			<li class="login"><a href="http">Войти</a></li>
			<li class="registration"><button onClick="getElementById('modalRegistration').removeAttribute('style');" type="button">Регистрация</button></li>
		</ul>
	</nav>	
	
</body>
</html>