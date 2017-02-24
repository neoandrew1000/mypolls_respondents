<!DOCTYPE html>
<html lang="en">

<!--
+++подключение fullpage.js
+++подключение шрифтов
+++базовое форматирование
+__базовые заливки и фоны
+++меню 
+__svg
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
	<div id="fullpage">
		<div class="section" id="section1">
			<div class="sectionWrap">
				<div id="wrapMenu">
					<nav id="baseMenu"> <!-- конфликт, если прописать просто id="menu". не нашел в чем причина =( -->
						<!-- Логотип с названием слева -->
					    <ul class="menu" id="leftMenu">
						    <li><div></div></li>
						    <li><a href="http">MyPolls.ru</a></li>
						</ul>
						<!-- Меню справа -->
						<ul class="menu" id="rightMenu">
							<li class="redirect"><a href="http">Вход для создателей</a></li>
							<li class="login"><a href="http">Войти</a></li>
							<li class="registration"><button onClick="getElementById('modalRegistration').removeAttribute('style');" type="	button">		Регистрация</button></li>
						</ul>
					</nav>	
				</div>
			</div>
		</div>
		<div class="section" id="section2"></div>
		<div class="section" id="section3"></div>
		<div class="section" id="section4"></div>
		<div class="section" id="section5"></div>
		<div class="section" id="section6"></div>
		<div class="section" id="section7"></div>
	</div>
	
</body>
</html>