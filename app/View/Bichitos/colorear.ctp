<fieldset>
	<legend>
		Color
	</legend>
	<article class="span1">
		<section>
			<form id="formulario">
				<div class="atributo">
					<label for="puerto">Selecciona un dispositivo</label>
					<select name="puerto" class="atributo">
						<option value="0">ACM0</option>
						<option value="1">COM1</option>
					</select>
				</div>
				<div class="atributo">
					<label for="direccion">Escribe una dirección</label>
					<input placeholder="Dirección" type="text" name="direccion" class="atributo" id="direccion" />
				</div>
				<div class="atributo">
					<label for="pin">Escribe un pin de salida</label>
					<input value="0" type="text" name="pin" class="atributo" id="pin" />
				</div>
				<div class="atributo">
					<label for="color">Escribe un color</label>
					<input placeholder="Color" type="text" name="color" class="atributo" id="color" />
				</div>
				<div class="atributo">
					<button type="button" id="boton_color" class="atributo">
						¡Asignar Color!
					</button>
				</div>
			</form>
		</section>
	</article>
	<aside class="span1 col">
		<p>
			<?= $this -> Html -> image('lamparita_on.svg', array('id' => 'lamparita_color', 'class' => 'lamparita')); ?>
		</p>
	</aside>
</fieldset>
<div id="mensaje">
	<h3>¡Bienvenido! Para empezar a jugar, haz clic sobre una lamparita...</h3>
</div>
<div id="loading">
	<?= $this -> Html -> image('load.gif'); ?>
</div>