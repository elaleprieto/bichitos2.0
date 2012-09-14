<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="es" class="no-js">
	<!--<![endif]-->
	<head>
		<?php echo $this -> Html -> charset(); ?>
		<title> Colectivo Libre :: LibreLEDs :: <?php echo $title_for_layout; ?> </title>
		<?php
		echo $this -> Html -> meta('icon');

		echo $this -> Html -> css('cake.generic');
		echo $this -> Html -> css('style');
		echo $this -> Html -> css('default');

		# jQuery fallback
		echo $this -> Html -> script('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
		$jsLocal = '<script src="'.$this -> Html-> url('/', true).'js/jquery-1.7.1.min.js">x3C/script>';
		echo $this -> Html -> scriptBlock('window.jQuery || document.write(\''.$jsLocal.'\')');

		echo $this -> Html -> script('http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js');
		
		echo $this -> Html -> script('bichitos');

		echo $this -> fetch('meta');
		echo $this -> fetch('css');
		echo $this -> fetch('script');
		
		# Se define la ruta base
		echo $this -> Html -> scriptBlock('WEBROOT="'.$this -> Html-> url('/', true).'"');
		?>
	</head>
	<body class="cf">
		<div id="container">
			<header class="span2">
				<div class="inner cf">
					<h1 class="alt span1 head"> <?= $this -> Html -> image('bug128.png', array('class' => 'bug')); ?>
					LibreLEDs :: Bichitos Libres </h1>
					<!-- <nav class="span1 col">
						<ul class="cf">
							<li>
								<?= $this -> Html -> link('Inicio', array('controller' => 'bichitos', 'action' => 'index'), array('class' => 'alt')); ?>
							</li>
							<li>
								<?= $this -> Html -> link('Accionar', array('controller' => 'bichitos', 'action' => 'accionar'), array('class' => 'alt')); ?>
							</li>
							<li>
								<?= $this -> Html -> link('Colorear', array('controller' => 'bichitos', 'action' => 'colorear'), array('class' => 'alt')); ?>
							</li>
							<li>
								<?= $this -> Html -> link('Direccionar', array('controller' => 'bichitos', 'action' => 'direccionar'), array('class' => 'alt')); ?>
							</li>
							<li>
								<?= $this -> Html -> link('Parallax', array('controller' => 'bichitos', 'action' => 'parallax'), array('class' => 'alt')); ?>
							</li>
						</ul>
					</nav> -->
				</div>
			</header>
			<div id="content" class="cf">
				<?php echo $this -> Session -> flash(); ?>
				<?php echo $this -> fetch('content'); ?>
			</div>
			<footer>
				<div class="inner cf">
					<h1> <?= $this -> Html -> image('elefante a colores.svg', array('class' => 'elefante')); ?>
					Colectivo Libre :: 2012</h1>
				</div>
			</footer>
		</div>
		<?php echo $this -> element('sql_dump'); ?>
	</body>
</html>
