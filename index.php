<!DOCTYPE html>
<html lang="en">

<!--
+++подключение fullpage.js
+++подключение шрифтов
+++базовое форматирование
+++базовые заливки и фоны
+++меню 
+__svg
+__img
___текст
+__верстка
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
				<ul class="verticalFlex">
					<li class="menuLi">
						<div id="wrapMenu">
							<nav class="horizontalFlex" id="baseMenu"> <!-- конфликт, если прописать просто id="menu". не нашел в чем причина =( -->
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
					</li>
					<li><h5>Сообщество свободного мнения. Оценивайте и выражайте свою точку зрения</h3></li>
					<li><h1>УЧАСТИЕ В ОНЛАЙН-ОПРОСАХ</h1></li>
					<li><h3>Присоединяйтесь, 9999 человек уже с нами</h2></li>
					<li></li>
				</ul>
			</div>
		</div>
		<div class="section" id="section2">
			<ul class="verticalFlex">
				<li><h2>В каких опросах Вы будете участвовать</h2></li>
				<li class="verticalFlex" id="verticalWrapUl">					
					<ul class="horizontalFlex" id="horizontalWrapUl">
						<li>							
							<ul class="verticalFlex">
								<li class="verticalFlex"><img src="img/sl2img1.jpg" alt=""></li>
								<li>
									
									<ul class="verticalFlex">
										<li><h3>Тестирование</h3></li>
										<li><h5>товаров, продуктов, услуг,<br> сервисов, рекламы, сайтов</h5></li>
									</ul>	

								</li>
							</ul>

						</li>
						<li>							
							<ul class="verticalFlex">
								<li class="verticalFlex"><img src="img/sl2img2.jpg" alt=""></li>
								<li>
									
									<ul class="verticalFlex">
										<li><h3>Профессиональные опросы</h3></li>
										<li><h5>для маркетологов, hr-специалистов, врачей,<br> преподавателей, госслужащих и др.</h5></li>
									</ul>									

								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="section" id="section3">	
			<div class="verticalFlex">				
				<ul class="horizontalFlex" id="horizontalWrapUl">
					<li>							
						<ul class="verticalFlex">
							<li class="verticalFlex"><img src="img/sl3img1.jpg" alt=""></li>
							<li>
								<ul class="verticalFlex">
									<li><h3>Создание научных работ</h3></li>
									<li><h5>по экономике, сельскому хозяйству, праву,<br>социологии и пр.</h5></li>
								</ul>	
							</li>
						</ul>
					</li>
					<li>							
						<ul class="verticalFlex">
							<li class="verticalFlex"><img src="img/sl3img2.jpg" alt=""></li>
							<li>
								<ul class="verticalFlex">
									<li><h3>Возникновение новых брендов</h3></li>
									<li><h5>названий, слоганов, товаров, <br>предложений и услуг</h5></li> <!-- количесвто строк у h5 должно быть отдинаковое количество -->
								</ul>								
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="section" id="section4"></div>
		<div class="section" id="section5"></div>
		<div class="section" id="section6"></div>
		<div class="section" id="section7"></div>
	</div>
	
</body>
</html>