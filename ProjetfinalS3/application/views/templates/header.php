<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
	<head>
        <title><?php echo $title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="<?php	echo $description;	?>"/>
        <meta name="keywords" content="<?php echo $keywords;	?>"/>
		<link rel="stylesheet" href="<?php echo base_url('assets\css\main.css');?>" type="text/css"/>
	</head>
	<body class="is-preload right-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="">Takalo-Takalo</a></h1>
								
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="<?php echo site_url('Userlog/listObjet');?>">Accueil</a></li>
									<li><a href="<?php echo site_url('Userlog/listeProposition');?>">Proposition</a></li>
									<li><a href="<?php echo site_url('Userlog/ajout');?>">Ajouter produit</a></li>

									<li class="current"><a href="#">A la une</a></li>
									<li><a href="<?php echo site_url('welcome/deconnect');?>">Deconnexion</a></li>
								</ul>
							</nav>

					</header>
				</div>

			</div>
			<style>
				#logo {
					
					animation: color-change 5s ease-in-out infinite;
					}

					@keyframes color-change {
					0% {
						background-color: red;
					}
					20% {
						background-color: black;
					}
					40% {
						background-color: blue;
					}
					}

			</style>
			       
				   </body>
</html>


