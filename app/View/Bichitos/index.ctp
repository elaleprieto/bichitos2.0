	<fieldset>
	<legend>Inicio</legend>
	<article class="span1">
		<section>
			<form id="formulario">
				<div class="atributo">
					<label for="puerto">Selecciona un dispositivo</label>
					<select id="puerto" name="puerto" class="atributo">
						<option value="0">ACM0</option>
						<option value="1">COM1</option>
					</select>
				</div>
				<div class="atributo">
					<label for="direccion">Escribe una dirección</label>
					<input id="direccion" placeholder="Dirección" type="text" name="direccion" class="atributo" />
				</div>
				<div class="atributo">
					<label for="pin">Escribe un pin de salida</label>
					<input value="0" type="text" name="pin" class="atributo" id="pin" />
				</div>
				<div class="atributo">
					<button type="button" id="boton_prender" class="atributo">
						¡Prender!
					</button>
					<button type="button" id="boton_apagar" class="atributo">
						¡Apagar!
					</button>
				</div>
			</form>
		</section>
	</article>
	<aside class="span1 col">
		<div id="lampara">
			<img src="img/lamparita_off.svg" class="lamparita" id="lamparita_index_off"/>
		</div>
	</aside>
</fieldset>
	<div id="mensaje">
		<h3>¡Bienvenido! Para empezar a jugar, haz clic sobre una lamparita...</h3>
	</div>
	<div id="loading">
		<img src="img/load.gif"/>
	</div>
