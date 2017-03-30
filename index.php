<?php

	require_once ('core/init.php');
?>

<!DOCTYPE html>
<html lang="en">

<!--
+++подключение fullpage.js
+++подключение шрифтов
+++базовое форматирование
+++базовые заливки и фоны
+++меню 
+++svg
+++img
+++текст
+++верстка
+++тестирование
+++постобработка, анимация
___добавление форм
___стили форм
___тестирование

-->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
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
				afterLoad:function(link,index) {
					if(index == 1) {
						$("#section1").animate({'opacity':'1'},700);
					}
					if(index == 2) {
						$("#section2 h2").animate({'opacity':'1'},300);
						$("#section2 img").animate({'opacity':'1'},600);
						$("#section2 h3").animate({'opacity':'1'},600);
						$("#section2 h5").animate({'opacity':'1'},900);
					}
					if(index == 3) {
						$("#section3 img").animate({'opacity':'1'},400);
						$("#section3 h3").animate({'opacity':'1'},800);
						$("#section3 h5").animate({'opacity':'1'},900);
					}		
					if(index == 4) {
						$("#section4 p").animate({'opacity':'1'},300);
						$("#section4 .hr").animate({'opacity':'1'},900);
						$("#section4 img").animate({'opacity':'1'},1600);
					}	
					if(index == 5) {
						$("#section5 h1").animate({'opacity':'1'},300);
						$("#section5 .arrow").animate({'opacity':'1'},400);
						$("#section5 #centerUl").animate({'opacity':'1'},500);
						$("#section5 .wrapLiSection5").animate({'width':'80%'},600);
					}	
					if(index == 6) {
						$("#section6 h3").animate({'opacity':'1'},300);
						$("#section6 .hr").animate({'opacity':'1'},800);
						$("#section6 p").animate({'opacity':'1'},500);
					}						

				}




			});

			// скрипт отправки формы без ребута страницы
		$('#register-form').on('submit', function(e) {
        	e.preventDefault();
        	$.ajax({
            	url : 'register.php',
           		type: "POST",
           		dataType:'json',
            	data: $(this).serialize(),
            	success: function (data) {

            		if (data === "true"){

            			$("#response").html("Вы зарегестрированы и теперь можете войти!");
            			$("#register-form").remove();

            		}else{
            			
                		$("#response").html(data);
                	}
            	},
            	error: function (jXHR, textStatus, errorThrown) {
                	alert(errorThrown);
            	}
        	});
    	});
		});	
	</script>


<body>

<!-- модальное окно регистрации -->
<div id="modalRegistration" style="display:none;">
   	<div class="overlay">
     	<div class="visible">
     	<button type="button" onClick="getElementById('modalRegistration').style.display='none';">закрыть</button>
       	<h2>Заголовок окна</h2>
          	<div class="content">
          		<!-- поле для ответа от сервера -->
          	   <div id = "response">
          	   </div>
          	   <form id= "register-form">
					<form id= "register-form">
					<div class="field">
						<label for = "usrnam">Username</label>
						<input type="text" name="usrnam" id="usrnam" value="<?php echo escape(Input::get("usrnam"))?>" autocomplete="off" >
					</div>

					<div class="field">
						<label for ="password">Password</label>
						<input type ="password" name="password" id="password"> characters and numbers
					</div>	
					
					<div class="field">
						<label for ="password_again">Password Again</label>
						<input type ="password" name="password_again" id="password_again">
					</div>	

					<div class="field">
						<label for ="frname">Frst name</label>
						<input type ="text" name="frname" id="frname" value="<?php echo escape(Input::get("frname"))?>">
					</div>	

					<div class="field">
						<label for ="lsname">Last name</label>
						<input type ="text" name="lsname" id="lsname" value="<?php echo escape(Input::get("lsname"))?>">
					</div>	

					<div class="field">
						<label for ="eml">Email</label>
						<input type ="text" name="eml" id="eml" value="<?php echo escape(Input::get("eml"))?>" >test@test.com
					</div>	

				 	<div class="field">
						<label for ="phne">Phone +7</label>
						<input type ="text" name="phne" id="phne" value="<?php echo escape(Input::get("phne"))?>">1231231231
					</div>
					<input type = "hidden" name = "token" value="<?php echo escape(Session::get('token')) ?>">
					<input type ="submit" value = "register">
				</form>	      		
          	</div>
        </div>
    </div>
</div>

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
					<li>       </li>
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
								<li class="verticalFlexMargin">
									
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
								<li class="verticalFlexMargin">
									
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
							<li class="verticalFlexMargin">
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
							<li class="verticalFlexMargin">
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
		<div class="section" id="section4">
			<ul class="verticalFlex" id="baseSection4Ul">
				<li class="hr"><div></div></li>
				<li class="textSection4"><p>Многим компаниям необходимо получать свежую<br> информацию о своих покупателях: настоящих или <br>будущих; тестировать новинки; продвигать бренды;<br> улучшать сферу услуг. Для этого они выбирают нас.</p></li>
				<li class="numberOfResp">
					<ul class="horizontalFlex">
						<li><img src="img/color1.png" alt=""></li>
						<li>
							<ul class="verticalFlex">
								<li><p><b>9999</b> респондентов <br> пользуются <u>MyPolls.ru!</u></p></li>
								<li class="hr"><div></div></li>
							</ul>
						</li>
						<li><img src="img/color2.png" alt=""></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="section" id="section5">
			<ul class="verticalFlex" id="baseSection5Ul">
				<li><h1>Это очень просто</h1></li>
				<li><img src="svg/arrow.svg" alt="" class="arrow"></li>
				<li class="wrapLiSection5">
					<ul class="horizontalFlex">
						<li>
							<ul class="verticalFlex">
								<li><img src="svg/icon1.svg" alt=""></li>
								<li><p><a href="">Зарегистрируйтесь</a> и заполните ваш<br> профиль полностью<br> на 100%</p></li>
							</ul>
						</li>
						<li>
							<ul class="verticalFlex" id="centerUl">
								<li><img src="svg/icon2.svg" alt=""></li>
								<li><p>Заполните анкеты:<br> приглашения к опросам<br> будут приходить на почту <br> и в личный кабинет</p></li>
							</ul>
						</li>
						<li>
							<ul class="verticalFlex">
								 <li><img src="svg/icon3.svg" alt=""></li>
								<li><p>Вам начисляется <br> денежное вознограждение<br> за заполнение каждой<br> анкеты</p></li>
							</ul>
						</li>
					</ul>

				</li>
			</ul>
		</div>
		<div class="section" id="section6">
			<ul class="verticalFlex">
				<li><h3>ОЧЕНЬ ВЫГОДНО</h3></li>
				<li class="hr"><div></div></li>
				<li><p>Стандартная анкета в среднем занимает 5-7 минут вашего времени и приносит от 15 и более рублей дохода. Согласитесь, очень удобно: в перерывах между основными делами еще и зарабатывать?</p></li>
				<li class="hr"><div></div></li>
			</ul>
		</div>
		<div class="section" id="section7"></div>
	</div>
	
</body>
</html>