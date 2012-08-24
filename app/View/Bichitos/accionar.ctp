<fieldset>
	<legend>
		Accionar
	</legend>
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
					<?php echo $this->element('direcciones'); ?>
				</div>
				<div class="atributo">
					<?php echo $this->element('colores'); ?>
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
			<?= $this -> Html -> image('lamparita_off.svg', array('id' => 'lamparita_index_off', 'class' => 'lamparita')); ?>
		</div>
	</aside>
</fieldset>
<?php echo $this -> element('mensaje'); ?>
