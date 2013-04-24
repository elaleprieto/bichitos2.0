<?php
App::uses('AppController', 'Controller');
/**
 * Bichitos Controller
 *
 * @property Bichito $Bichito
 */
class BichitosController extends AppController {
	private $puertoUSB = 0;

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Bichito -> recursive = 0;
		$this -> set('bichitos', $this -> paginate());
	}

	/**
	 * desplegar es una Vista creada para el usuario final, contiene algunos pocos datos.
	 */
	public function desplegar() {
		$this -> Bichito -> recursive = 0;
		$this -> layout = 'desplegar';
		$campos = array('Bichito.id', 'Bichito.intensidadAzul', 'Bichito.intensidadRojo', 'Bichito.intensidadVerde');
		$bichitos = $this -> Bichito -> find('all', array('fields' => $campos));
		$this -> set('bichitos', $bichitos);
	}
	
	/**
	 * mobile es una Vista creada para el móvil, contiene algunos pocos datos.
	 */
	public function mobile() {
		$this -> Bichito -> recursive = 0;
		$this -> layout = 'mobile';
		$campos = array('Bichito.id', 'Bichito.intensidadAzul', 'Bichito.intensidadRojo', 'Bichito.intensidadVerde');
		$bichitos = $this -> Bichito -> find('all', array('fields' => $campos));
		$this -> set('bichitos', $bichitos);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Bichito -> id = $id;
		if (!$this -> Bichito -> exists()) {
			throw new NotFoundException(__('Bichito inválido'));
		}
		$this -> set('bichito', $this -> Bichito -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Bichito -> create();
			if ($this -> Bichito -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El bichito ha sido guardado'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('El bichito no pudo ser guardado. Por favor, intente nuevamente.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Bichito -> id = $id;
		if (!$this -> Bichito -> exists()) {
			throw new NotFoundException(__('Bichito inválido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Bichito -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El bichito ha sido guardado'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('El bichito no pudo ser guardado. Por favor, intente nuevamente.'));
			}
		} else {
			$this -> request -> data = $this -> Bichito -> read(null, $id);
		}
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Bichito -> id = $id;
		if (!$this -> Bichito -> exists()) {
			throw new NotFoundException(__('Bichito inválido'));
		}
		if ($this -> Bichito -> delete()) {
			$this -> Session -> setFlash(__('Bichito eliminado'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('El bichito no fue eliminado'));
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * accionar method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @throws CakeException
	 * @return void
	 */
	public function accionar() {
		if ($this -> request -> is('post')) {
			$this -> layout = 'ajax';

			# Se verifica que las variables requeridas estén definidas
			if (isset($this -> request -> data['puerto']) && isset($this -> request -> data['direccion']) && isset($this -> request -> data['accion'])) {
				# Se carga la clase requerida
				App::import('Vendor', 'EsclavoClass', array('file' => 'esclavo.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');
				$accion = $this -> request -> data('accion');
				$pin = (isset($this -> request -> data['pin']) && ($this -> request -> data('pin') >= 0) && ($this -> request -> data('pin') <= 3)) ? $this -> request -> data('pin') : 0;

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0) && ($accion >= 0) && ($accion <= 1)) {
					# Se inicializa la clase
					$serial = new esclavo();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> esclavoDefaultACM() : $puertoValido = $serial -> esclavoDefaultCOM();
					if (!$puertoValido) {
						throw new NotFoundException('Puerto Inválido', 401);
					}

					// borrar
					// $serial -> esclavoDefaultACM();

					# Se abre una conexión con el dispositivo para escritura
					$serial -> deviceOpen();

					# Se le envía la acción
					$serial -> accionar($direccion, $accion, $pin);

					// borrar
					// $serial -> colorear('20', '10', '1');
					// $serial -> accionar('20', '1', '1');

					# Se cierra la conexión con el dispositivo
					$serial -> deviceClose();
				}
			} else {
				throw new CakeException('Falta algún parámetro', 501);
			}
			$this -> render('default');
		}
	}

	/**
	 * colorear method
	 *
	 * @throws NotFoundException
	 * @throws CakeException
	 * @return void
	 */
	public function colorear() {
		if ($this -> request -> is('post')) {
			$this -> layout = 'ajax';

			# Se verifica que las variables requeridas estén definidas
			if (isset($this -> request -> data['puerto']) && isset($this -> request -> data['direccion']) && isset($this -> request -> data['color'])) {
				# Se carga la clase requerida
				App::import('Vendor', 'EsclavoClass', array('file' => 'esclavo.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');
				$color = $this -> request -> data('color');
				$pin = (isset($this -> request -> data['pin']) && ($this -> request -> data('pin') >= 0) && ($this -> request -> data('pin') <= 3)) ? $this -> request -> data('pin') : 0;

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0) && ($color >= 0) && ($color <= 255)) {
					# Se inicializa la clase
					$serial = new esclavo();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> esclavoDefaultACM() : $puertoValido = $serial -> esclavoDefaultCOM();
					if (!$puertoValido) {
						throw new NotFoundException('Puerto Inválido', 401);
					}

					# Se abre una conexión con el dispositivo para escritura
					$serial -> deviceOpen();

					# Se le envía el color
					$serial -> colorear($direccion, $color, $pin);

					# Se cierra la conexión con el dispositivo
					$serial -> deviceClose();
				}
			} else {
				throw new CakeException('Falta algún parámetro', 501);
			}
			$this -> render('default');
		}
	}

	/**
	 * colorin method
	 *
	 * @throws NotFoundException
	 * @throws CakeException
	 * @param puerto: ACM0 ó COM1
	 * @param direccion
	 * @param color: array(r,g,b)
	 * @return void
	 */
	public function colorin() {
		$this->autoRender = FALSE;
		// return TRUE;
		
		if ($this -> request -> is('post')) {
			$this -> layout = 'ajax';

			# Se verifica que las variables requeridas estén definidas
			if (isset($this -> request -> data['id']) && isset($this -> request -> data['color'])) {
				# Se carga la clase requerida
				App::import('Vendor', 'EsclavoClass', array('file' => 'esclavo.class.php'));

				# Definición de variables
				$this -> Bichito -> id = $this -> request -> data('id');
				$puerto = $this -> puertoUSB;
				$direccion = $this -> Bichito -> field('direccion');
				$color = $this -> request -> data('color');
				//$pin = (isset($this -> request -> data['pin']) && ($this -> request -> data('pin') >= 0) && ($this -> request -> data('pin') <= 3)) ? $this -> request -> data('pin') : 0;

				# Se verifican los valores de las variables
				if (($color['r'] >= 0) && ($color['r'] <= 255) && ($color['g'] >= 0) && ($color['g'] <= 255) && ($color['b'] >= 0) && ($color['b'] <= 255)) {
					# Se inicializa la clase
					$serial = new esclavo();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> esclavoDefaultACM() : $puertoValido = $serial -> esclavoDefaultCOM();
					if (!$puertoValido) {
						throw new NotFoundException('Puerto Inválido', 401);
					}

					# Se abre una conexión con el dispositivo para escritura
					$serial -> deviceOpen();

					# Se setean los colores
					$serial -> colorearRGB($direccion, $color);

					#Se prenden todas las luces de los bichitos
					$serial -> accionarRGB($direccion);

					# Se cierra la conexión con el dispositivo
					$serial -> deviceClose();

					# Se guardan los nuevos valores
					$this -> Bichito -> saveColores($color);
				}
			} else {
				throw new CakeException('Falta algún parámetro', 501);
			}
			$this -> render('default');
		}
	}

	/**
	 * direccionar method
	 *
	 * @throws NotFoundException
	 * @throws CakeException
	 * @return void
	 */
	public function direccionar() {
		if ($this -> request -> is('post')) {
			$this -> layout = 'ajax';

			# Verficiación de variables
			if (isset($this -> request -> data['puerto']) && isset($this -> request -> data['direccion'])) {
				# Se carga la clase requerida
				App::import('Vendor', 'EsclavoClass', array('file' => 'esclavo.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0)) {
					# Initialización de la clase
					$serial = new esclavo();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> esclavoDefaultACM() : $puertoValido = $serial -> esclavoDefaultCOM();
					if (!$puertoValido) {
						throw new NotFoundException('Puerto Inválido', 401);
					}

					# Se abre una conexión con el dispositivo para escritura
					$serial -> deviceOpen();

					# Se le envía el mensaje, en este caso la dirección
					$serial -> asignar_direccion($direccion);

					# Se cierra la conexión con el dispositivo
					$serial -> deviceClose();
				}
			} else {
				throw new CakeException('Falta algún parámetro', 501);
			}
			$this -> render('default');
		}
	}

	/**
	 * get_bichito($id): obtiene los datos del bichito.
	 * @param id: el bichito buscado.
	 */
	function get_bichito($id = null) {
		$this -> layout = 'ajax';
		if ($id) {
			# busco el bichito
			$this -> Bichito -> recursive = 0;
			$this -> set('bichito', $this -> Bichito -> findById($id));
		}
	}

	function parallax() {
		$this -> layout = 'layoutParallax';
		$this -> Bichito -> recursive = 0;
		$this -> set('bichitos', $this -> paginate());

	}

}
