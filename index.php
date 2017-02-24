<!DOCTYPE html>
<html lang="en">

<!--
+++подключение fullpage.js
+++подключение шрифтов
+++базовое форматирование
+++базовые заливки и фоны
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

	<script>
		jQuery(document).ready(function($) {
			$("#fullpage").fullpage({
				sectionsColor:['gray','white','white','white','white','dimgray','gray'],
				anchors:['fistPage','secondPage','3rdPage','4thPage','5thPage','6thPage','7thPage'],
				menu:'#menu',
				scrollBar:false,
				//scrollOverflow:true,
				loopBottom:true,	
			});
		});	
	</script>


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
	<div id="fullpage">
		<div class="section" id="section1"></div>
		<div class="section" id="section2"></div>
		<div class="section" id="section3"></div>
		<div class="section" id="section4"></div>
		<div class="section" id="section5"></div>
		<div class="section" id="section6"></div>
		<div class="section" id="section7"></div>
	</div>
	
</body>
</html>