<?php if(isset($_POST['pass'])){
		if(md5($_POST['pass']) == '57e2d94e1b124ff5512b3900395fab92'){	 echo "111";	
			$_SESSION['logged'] = true;
			redirect('adm.php');
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">		
	</head>
	<body>
		<div class="wrapper">
			
				<div class="langs">
					<img src="img/it.png"> <img src="img/en.png"> <img src="img/ru.png">
				</div>
			<div class="header">
				<div>
				<h1>Consulenza Indipendenza</h1>
				e competenza sono le chiavi di volta che contraddistinguono il nostro operato !
Oltre 20 specialisti al vostro servizio per consulti personalizzati
				</div>
			</div>
			<div class="menu">
				<a href="#">chi siamo</a>
				<a href="#">chi siamo</a>
				<a href="#">chi siamo</a>
				<a href="#">chi siamo</a>
				<a href="#">chi siamo</a>
			</div>
			<div class="main">
				<div class="content">
					<h2>Lasci che sia un broker sperimentato ed efficente
a negoziare per lei le migliori condizioni !</h2>
				
				<p>Attore di primo piano nell’ambito della mediazione in assicurazioni, l’Agenzia Mendes è presente nei cantoni : Ginevra, Ticino, Vaud e Friborgo.</p>

<p>Oltre 20 consulenti suddivisi sui territori di svizzera romanda e Ticino prodigano con competenza i propri consigli negli ambiti dell'assicurazione malattia,
degli investimenti alternativi nonchè dei prestiti ipotecari e del credito al consumo oltre ai più classici e ben noti prodotti assicurativi.
Lasci che sia un broker sperimentato ed efficente
a negoziare per lei le migliori condizioni !</p>


<p>Fra le nostre competenze, siamo anche a sua disposizione per gestire dalla "A" alla "Z" i suoi contratti: nuove conclusioni, disdette, corrispondenza varia così
da liberare il suo tempo che potrà così dedicare ad altro...; un unico referente e consulente per tutte le sue polizze, in presso qualunque compagnia assicurativa 
possano essere, le semplifichera semplicemente la vita !</p>
				</div>
				<div class="contacts">
					<h2>Contatto</h2>
					<div>
<pre>
Elena Khamadianova

arlicona@gmail.com

</pre>
					</div>
				</div>
			</div>
			<div class="footer">
				&copy; 2016 Elena Khamadianova | Design Maestro Studio
			</div>
		</div>	
	</body>
</html>	