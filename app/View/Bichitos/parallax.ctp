<?php
echo $this -> Html -> css(array("style3", "screen3"));
echo $this -> Html -> script(array("jquery-1.7.1.min",  "parallax"));

# Se cargan los estilos
// echo $this -> Html -> css('colorpicker/colorpicker');
echo $this -> Html -> css("minicolors/jquery.miniColors");

# Se cargan las librerías
// echo $this -> Html -> script('colorpicker/colorpicker');
echo $this -> Html -> script("minicolors/jquery.miniColors");

?>
<body id="body_parallax" >

	<!-- Menu de opciones -->
	<nav id="nav_parallax">
		<a id="nav-logo" >
			<?=$this -> Html -> image('cele/logo.png')?>
		</a>
		
		<ul id="ul_parallax">
			<!-- menu disenio -->		
			<li class="nav-item">
				<a href="#disenio" class="nav_a_parallax">
					<?=$this ->Html -> image('cele/botones/disenio.png', array('class' => 'menu_parallax'))?>
				</a>
			</li>

			<!-- menu sistemas -->
			<li class="nav-item">
				<a href="#sistemas" class="nav_a_parallax">
					<?=$this -> Html -> image('cele/botones/software.png', array('class' => 'menu_parallax'))?>
				</a>
			</li>
			
			<!-- menu electronica -->
			<li class="nav-item">
				<a href="#electronica" class="nav_a_parallax">
					<?=$this -> Html -> image('cele/botones/hardware.png', array('class' => 'menu_parallax'))?>
				</a>			
			</li>
			
			<!-- menu cultura libre -->
			<li class="nav-item">
				<a href="#culturaLibre" class="nav_a_parallax">
					<?=$this -> Html -> image('cele/botones/culturalibre.png', array('class' => 'menu_parallax'))?>
				</a>			
			</li>	
		</ul>
	</nav>
	
	<!-- Parallax -->
	<div class="back">
		<div class="back">
			<div class="middleback">
				<div class="middlefront">
					<div class="logo">
					</div>
				</div>
			</div>
		</div>
	
	<!-- Contenido principal -->
	<div id="content_parallax">

		<!-- contenido disenio -->			
		<section id="disenio">
			<header class="header_parallax">
				
				<?=$this -> Html -> image('cele/columna.png', array('class' => 'columna'))?>
				
				<!-- Lienzo para pintar el fondo de la estructura de disenio -->
				<canvas id="lienzo1" width="600" height="500">
				</canvas>	
				<?=$this -> Html -> image('cele/estructura.png', array('id' => 'estructura'))?>
				<?=$this -> Html -> image('cele/herramientas.png', array('id' => 'herramientas'))?>	
							
			</header>
			
		</section>	
	
		<!-- contenido sistemas-->		
		<section id="sistemas">
			<header class="header_parallax">
				<div >
					<?=$this -> Html -> image('cele/columna3.png', array('class' => 'columna'))?>	
					
					<!-- Lienzo para pintar el fondo de la estructura de sistemas-->
					<canvas id="lienzo2" width="600px" height="620px">
					</canvas>
					<?=$this -> Html -> image('cele/estructura.png', array('id' => 'estructura2'))?>	
					<?=$this -> Html -> image('cele/antena.gif', array('id' => 'antena'))?>							
			</header>
		</section>
		
		<!-- contenido electronica -->
		<section id="electronica">
			<header class="header_parallax">
				<div>
					<!-- Lienzo para pintar el fondo de la estrucutra de electronica -->
					<canvas id="lienzo3" width="600px" height="620px">
					</canvas>
					<?=$this -> Html -> image('cele/columna2.png', array('class' => 'columna'))?>	
					<?=$this -> Html -> image('cele/estructura.png', array('id' => 'estructura3'))?>	
					<?=$this -> Html -> image('cele/otrolado.gif', array('id' => 'lineasOtroLado'))?>		
				</div>
			</header>
		</section>

		<!-- contenido cultura libre -->
		<section id="culturaLibre">
			<header class="header_parallax">
				<div>
					<!-- Lienzo para pintar el fondo de la estructura de cultura libre -->
					<canvas id="lienzo4" width="600px" height="620px">
					</canvas>
					<?=$this -> Html -> image('cele/columna4.png', array('class' => 'columna'))?>	
					<?=$this -> Html -> image('cele/estructura.png', array('id' => 'estructura4'))?>
					<?=$this -> Html -> image('cele/acuarela.png', array('id' => 'acuarela'))?>	
				</div>
			</header>
		</section>

	</div>
</div>

<!-- Cuadrados de selección del color de las estructuras -->
	<div>
		<?php
			foreach ($bichitos as $bichito): ?>
			<div id="colorido<?=$bichito['Bichito']['id']?>">
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>"/>
			</div>
			<?php endforeach; ?>
	</div>
</body>