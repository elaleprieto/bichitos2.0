<?php
App::uses('AppModel', 'Model');
/**
 * Bichito Model
 *
 */
class Bichito extends AppModel {
	public $order = "Bichito.id ASC";

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'direccion' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'intensidadAzul' => array(
			// 'numeric' => array(
				// 'rule' => array('numeric'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
		// 'intensidadRojo' => array(
			// 'numeric' => array(
				// 'rule' => array('numeric'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
		// 'intensidadVerde' => array(
			// 'numeric' => array(
				// 'rule' => array('numeric'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
	);
	
	/**
	 * Aquí se calculan y se agregan las potencias luego del find.
	 * @param results: resultados del find.
	 * @return results: resultados modificados.
	 */
	public function afterFind($results) {
	    foreach ($results as $key => $val) {
	        if (isset($val['Bichito']['intensidadRojo'])) {
	        	# Cálculo de Potencias por Color
	           	$results[$key]['Bichito']['potenciaRojo'] = $this->calculoPotencia($val['Bichito']['intensidadRojo']);
	            $results[$key]['Bichito']['potenciaVerde'] = $this->calculoPotencia($val['Bichito']['intensidadVerde']);
	            $results[$key]['Bichito']['potenciaAzul'] = $this->calculoPotencia($val['Bichito']['intensidadAzul']);
	            
				# Suma de Potencias
	            $results[$key]['Bichito']['potenciaTotal'] = $results[$key]['Bichito']['potenciaRojo'];
	            $results[$key]['Bichito']['potenciaTotal'] += $results[$key]['Bichito']['potenciaVerde'];
	            $results[$key]['Bichito']['potenciaTotal'] += $results[$key]['Bichito']['potenciaAzul'];
	        }
	    }
	    return $results;
	}
	
	/**
	 * Se calcula la Potencia a partir de la Intensidad actual.
	 * Se toma como potencia base 3 watts correspondiente a un dimmerizado de 255.
	 * Luego es una regla de tres simple. 
	 */
	public function calculoPotencia($intensidad) {
	    $potencia = 3;
		$dimmer = 255;
		
	    return $potencia * $intensidad / $dimmer;
	}
	
	public function saveColores($colores) {
		$this -> saveField('intensidadRojo', $colores['r']);
		$this -> saveField('intensidadVerde', $colores['g']);
		$this -> saveField('intensidadAzul', $colores['b']);
	}
}
