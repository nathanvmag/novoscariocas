
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Novos Cariocas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="NovosCariocas" />
	<meta name="keywords" content="" />
	<meta name="author" content="Nathan Vieira" />



  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body id = "body">
	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="header-inner">
					<h1><a href="index.php">Novos Cariocas<span>.</span></a></h1>
					<nav role="navigation">
						<ul>
							<li><a href="properties.php">Propiedades</a></li>
							<li class="call"><a href="tel://5521999999999"><i class="icon-phone"></i> +55 21 99999-9999</a></li>
							<li class="cta"><a href="contact.html">Contato</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<?php

	$servername = "localhost";
    $username = "u120627928_ncari";
    $pass = "24842288";
    $dbname ="u120627928_ncarj";
    $connect = new mysqli($servername,$username,$pass,$dbname);
    mysqli_set_charset($connect,"utf8") or die(mysqli_error($connect));
    $sql2 = "SELECT  `id` AS id,  `titulo` AS title,  `preço` AS price,  `negocio` AS neg,  `dpeq` AS dpeq, 
    		 `taman` AS taman,  `imgs` AS img
			FROM  `imoveis` 			
			WHERE 1
			ORDER BY RAND() ";
    $result = mysqli_query($connect, $sql2) or die(mysqli_error($conn));
    $imvs="";
	     if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{

				$imvs= $imvs. $row['id']."|".$row['title']."|".$row['price']."|".$row['neg']."|".$row['dpeq']."|".
				$row['taman']."|".$row['img']."ª";
			}
		}

		
	?>

	<aside id="fh5co-hero" clsas="js-fullheight">
	
		<div class="flexslider js-fullheight" id = "roler">
			<ul class="slides" id ="mainslide">		  
		   
		   	
		  	</ul>
	  	</div>
	</aside>
	<script>
	var data = "<?php echo $imvs;  ?>"
	var imvs = data.split("ª");	

	function createMainSlider(info){	
	var infs = info.split("|");
	var sell = infs[3]=="0"?"À venda":"Alugar";
	var img = infs[6].split("º")[0];
	var value = (parseInt(infs[2])).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	var a = " <li style='background-image: url("+img+");'> <div class='container'> <div class='col-md-12 text-center js-fullheight fh5co-property-brief slider-text'> <div class='fh5co-property-brief-inner'> <div class='fh5co-box'> <h3><a href='info.html?id="+infs[0]+"''>"+infs[1]+"</a></h3> <div class='price-status'> <span class='price'>"+value+" <a href='#' class='tag'>"+sell+"</a></span> </div> <p>"+infs[4]+"</p> <p class='fh5co-property-specification'> <span><strong>"+infs[5]+"</strong> m²</span> </p> <p><a href='info.html?id="+infs[0]+"' class='btn btn-primary'>Saiba Mais</a></p> </div> </div> </div> </div> </li>";
	document.getElementById("mainslide").innerHTML += a;
}
	createMainSlider(imvs[0]);
	createMainSlider(imvs[1]);
	createMainSlider(imvs[2]);
	</script>
	
	<div id="best-deal">
		<div class="container">
			<div class="row" id= "bestrow">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
					<h2>Ofereçendo as melhores ofertas da Novos Cariocas</h2>
					<p>Uma oportunidade única </p>
				</div>			


			</div>
		</div>
	</div>
<script>
	

	function createPropiete(info){
		var infs = info.split("|");
		var sell = infs[3]=="0"?"À venda":"Alugar";
		var img = infs[6].split("º")[0];
		var value = (parseInt(infs[2])).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

	var b = "<div class='col-md-4 item-block animate-box' data-animate-effect='fadeIn'> <div class='fh5co-property'><figure><img src='"+img+"' alt='' class='img-responsive'> <a href='info.html?id="+infs[0]+"' class='tag'>"+sell+"</a> </figure> <div class='fh5co-property-innter'> <h3><a href='info.html?id="+infs[0]+"'>"+infs[1]+"</a></h3> <div class='price-status'> <span class='price'>"+value+" </span> </div> <p>"+infs[4]+"</p> </div> <p class='fh5co-property-specification'> <span><strong>"+infs[5]+"</strong> m²</span>  </p> </div> </div>   ";
	document.getElementById("bestrow").innerHTML += b;
	}
	if (imvs[3]!=null)createPropiete(imvs[3]);
	if (imvs[4]!=null)createPropiete(imvs[4]);
	if (imvs[5]!=null)createPropiete(imvs[5]);


	</script>
	
	<div class="fh5co-section-with-image">
		
		<img src="images/ncariocas.png" alt="" class="img-responsive">
		<div class="fh5co-box animate-box  ">
			<h2>Segurança, Comforto &amp; Confiança </h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dicta magni amet atque doloremque velit unde adipisci omnis hic quaerat.</p>
			<p><a href="properties.php" class="btn btn-primary btn-outline with-arrow">Começar <i class="icon-arrow-right"></i></a></p>
		</div>
		
	</div>
	

	

	<div id="fh5co-agents">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading white animate-box" data-animate-effect="fadeIn">
					<h2>Nossa equipe</h2>
					<p>Prezando sempre para o conforto e a melhor experiência em nossa agência. </p>
				</div>
				<div class="col-md-4 text-center item-block animate-box" data-animate-effect="fadeIn">

					<div class="fh5co-agent">
						<figure>
							<img src="images/testimonial_person2.jpg" >
						</figure>
						<h3>Ricardo Cavalcanti</h3>
						<p>Consultor e captador de imóveis</p>
						<p>+5521999999999</p>
						<p><a href="#" class="btn btn-primary btn-outline">Contato</a></p>
					</div>
					
				</div>
				<div class="col-md-4 text-center item-block animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-agent">
						<figure>
							<img src="images/testimonial_person3.jpg" alt="">
						</figure>
						<h3>Nathan Magalhães</h3>
						<p>Responsável pela divulgação e manutenção web.</p>
						<p>+5524981387593</p>
						<p><a href="tel://5524981387593" class="btn btn-primary btn-outline">Contato</a></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	

	

	
	<footer id="fh5co-footer" role="contentinfo">
	
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>About Us</h3>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow btn-sm">I'm button <i class="icon-arrow-right"></i></a></p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Services</h3>
				<ul class="float">
					<li><a href="#">Web Design</a></li>
					<li><a href="#">Branding &amp; Identity</a></li>
					<li><a href="#">Free HTML5</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>
				<ul class="float">
					<li><a href="#">Free Bootstrap Template</a></li>
					<li><a href="#">Free HTML5 Template</a></li>
					<li><a href="#">Free HTML5 &amp; CSS3 Template</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
<h3>Redes socias</h3>
				<ul class="fh5co-social">					
					<li><a  target="_blank" href="https://www.facebook.com/Novos-Cariocas-496729110412835/"><i class="icon-facebook"></i></a></li>
					<li><a  target="_blank" href="mailto:novoscariocasimoveis@hotmail.com"><i class="icon-google-plus"></i></a></li>					
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p><p>&copy; 2018 All Rights Reserved.<span>Desenvolvido por Nathan Vieira de Magalhães <span><a target="_blank" href="https://nathanvmag.github.io"<p>Website </p></a> </p>	
					
			</div>
			
		</div>
	</footer>
	</div>
	
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

