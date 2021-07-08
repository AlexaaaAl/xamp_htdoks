<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT title, date_create, detail_url FROM news_cards");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dataCards = $stmt->fetchAll();

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
  	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

	<style type="text/css" >
	    body {
	        font-family : 'Ubuntu', sans-serif;
	    }
	</style>
	<link rel="stylesheet" type="text/css" href="style.css" >
	<link rel="stylesheet" href="slider.css">

	<title>Заголовок</title>
</head>
<body>
<header>
	 <div class="block_menu ">
        <img class="logo_menu" src="img/logo.png" alt="logo">
        <ul class="info-menu-top">
				<li><a href=""><h6 class="h3-menu"><b>8(863)243-15-10</b></h6></a></li>
				<li><a href="">Ростов-на-Дону</a></li>  
		</ul> 
		<input type="checkbox" id="hmt" class="hidden-menu-ticker">
		<label class="btn-menu" for="hmt">
		    <span class="first"></span>
		    <span class="second"></span>
		    <span class="third"></span>
		</label>
		<ul class="hidden-menu">
			<li class="li-menu"><a href="" class="menu-item">Услуги</a></li>  
			<li class="li-menu"><a href="" class="menu-item">Портфолио</a></li>
			<li class="li-menu"><a href="" class="menu-item">Отзывы</a></li> 
			<li class="li-menu"><a href="" class="menu-item">Вакансии</a></li> 
			<li class="li-menu"><a href="" class="menu-item">Контакты</a></li> 
			<ul class="info-menu">
				<li><a href="" > <h3><b>8(863)243-15-10</b></h3></a></li>
				<li><a href="" >Ростов-на-Дону, <br/>Ленина, 21</a></li>  
				
			</ul> 
		</ul>
		
	</div>

</header>
<main>
	<div class="advertising" >	

		<h2 class="ubuntu"><b>
			Рекламно-информационное агентство
		</b>
		</h2>
		<p class="ubuntu" >
			Будем рады, если Вы обратитесь в наше Агентство. Мы готовы предложить Вам передовые решения для продвижения Вашего бизнеса.
		</p>
		<div id="results"> </div>
		<form action="" class="form" onsubmit="call()">
			<input id="number" name="number" class="from-input" type="text" placeholder="Номер телефона">
			<input type="button" value="Отправить" id="submit"  class="from-button"/>    
		</form>

		
	</div>
	<div class="news">
	<p ><h4 class="title-news"><b>Новости</b></h4></p>
	<div id="slider" class="slider">
		<div class="slider-content">
			<div class="slider-content-wrapper">
                <?php foreach(array_chunk($dataCards, 3) as $cardsPage):?>
                    <div class="slider-content__item image-1">
                        <?php foreach($cardsPage as $card):?>
                            <div class="card rounded-0" style="">
                                <div class="card-body">
                                    <h56 class="card-data"><?php echo $card['date_create'];?></h6>
                                    <p class="card-text" style="font-family : 'Roboto', sans-serif;"><b><?php echo $card['title'];?></b></p>
                                    <form action="<?php echo $card['detail_url'];?>" target="_blank">
                                        <button class="btn">Подробнее</button>
                                    </form>
                                </div>
                            </div>					
                        <?php endforeach;?>
                    </div>
                <?php endforeach;?>

			</div>
		</div>
	</div>
</div>
</main>
<footer>
	<div class="footer">
		<div class="footer-logo">
	      <img class="" src="img/logo.png" alt="logo">
	    </div>
	    <ul class="footer-menu">
	    	<li class="li"><a href="#" class="color-a">Услуги</a></li>
	    	<li class="li"><a href="#" class="color-a">Портфолио</a></li>
	    	<li class="li"><a href="#" class="color-a">Отзывы</a></li>
	    	<li class="li"><a href="#" class="color-a">Вакансии</a></li>
	    	<li class="li"><a href="#" class="color-a">Контакты</a></li>
	    </ul>
  </div>
</footer>
<script src="form_ajax.js"></script>
<script src="mask.js"></script>
<script src="script.js"></script>
</body>


</html>