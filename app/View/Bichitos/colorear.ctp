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
					<?php echo $this -> element('direcciones'); ?>
				</div>
				<div class="atributo">
					<?php echo $this -> element('colores'); ?>
				</div>
				<div class="atributo">
					<label for="color">Escribe la intensidad</label>
					<input placeholder="Intensidad" type="text" name="color" class="atributo" id="color" />
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
<?php echo $this -> element('mensaje'); ?>