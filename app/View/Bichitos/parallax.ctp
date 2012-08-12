<?php
echo $this -> Html -> css(array("style3", "screen3", "colorpicker", "layout"));
echo $this -> Html -> script(array("jquery-1.7.1.min", "colorpicker", "eye", "utils", "layout", "parallax", "canvas", "", "", "", "", "", ""));
?>
<!-- Menu de opciones-->
	<nav>
		<a id="nav-logo" href="#hello" >
			<?=$this -> Html -> image("cele/logo.png")?>
		</a>
		
		<ul>
			<!-- diseño -->		
			<li id="nav-1">
				<a href="#disenio" >
					<img class="menu" src="img/botones/diseño.png"></img>
				</a>
			</li>

			<li id="nav-2">
				<a href="#sistemas">
					<img class="menu" src="img/botones/software.png"></img>
				</a>
			</li>
			
			<li id="nav-3">
				<a href="#electronica">
					<img class="menu" src="img/botones/hardware.png"></img>
				</a>			
			</li>
			<li id="nav-4" class="off">
				<a href="#culturaLibre">
					<img class="menu" src="img/botones/culturalibre.png"></img>
				</a>			
			</li>	
		</ul>
		
	</nav>
<div class="back">
<div class="back">
	<div class="middleback">
		<div class="middlefront">
			<div class="logo">
			</div>
		</div>
	</div>
</div>
	
	<div id="contenido">
			
		<section id="disenio" style="min-height: 350px;">
			<header>
					
				<img src="img/columna.png" id="columna1"></img>
				<canvas id="lienzo" width="600" height="620">
				</canvas>	
				<img src="img/estructura.png" id="estructura"></img>
						
				<div >
					<div id="colorido1">					
						<div id="colorSelector">
		    				<div style="background-color: #ffffff">
		    				</div>
						</div>
					</div>
				</div>
				
				<img src="img/herramientas.png" id="herramientas"></img>		
							
			</header>
		
			<p>
			</p>
		
		</section>	
		
		<section id="sistemas" style="min-height: 350px;">
			<header>
				<div >
					<img src="img/columna3.png" id="columna2"></img>
					<canvas id="lienzo3" width="600px" height="620px">
					</canvas>
					<img src="img/estructura.png" id="estructura2"></img>	
					
					<img src="img/antena.gif" id="antena"></img>
					<div id="colorido2">
			    		<div id="colorSelector">
	   		 			<div style="background-color: #ffffff">
	    					</div>
		    			</div>
		    		</div>
					
			</header>
			<p>
			</p>
		</section>
		<section id="electronica" style="min-height: 350px;">
			<header>
			<!--					
					<div >
					<img src="img/columna2.png" id="columna3"></img>
					<img src="img/estructura.png" id="estructura"></img>	
					<img src="img/lineas.gif" id="lineas"></img>
					<img src="img/color.png" id="cuadradoColor3"></img>				
				</div>
-->	
				<div>
					<img src="img/columna2.png" id="columna3"></img>
					<img src="img/estructura.png" id="estructura3"></img>	
					<img src="img/otrolado.gif" id="lineasOtroLado"></img>	
					<div id="colorido3">					
						<div id="colorSelector">
	    					<div style="background-color: #ffffff">
	    					</div>
						</div>
					</div>	
				</div>
			</header>
			<p>
			</p>
		</section>

		<section id="culturaLibre" style="min-height: 350px;">
			<header>
			<div>
				<img src="img/columna4.png" id="columna4"></img>
				<img src="img/estructura.png" id="estructura4"></img>	
				<img src="img/acuarela.png" id="acuarela"></img>	
				<div id="colorido4">					
					<div id="colorSelector">
    					<div style="background-color: #ffffff">
    					</div>
					</div>
				</div>	
			</div>
			</header>
			<p>
			</p>	
		
		</section>

	</div>
</div>