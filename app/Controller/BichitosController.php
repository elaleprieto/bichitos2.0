<?php
App::uses('AppController', 'Controller');
/**
 * Bichitos Controller
 *
 * @property Bichito $Bichito
 */
class BichitosController extends AppController {

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
				App::import('Vendor', 'BichitoClass', array('file' => 'bichito.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');
				$accion = $this -> request -> data('accion');
				$pin = (isset($this -> request -> data['pin']) && ($this -> request -> data('pin') >= 0) && ($this -> request -> data('pin') <= 3)) ? $this -> request -> data('pin') : 0;

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0) && ($accion >= 0) && ($accion <= 1)) {
					# Se inicializa la clase
					$serial = new bichito();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> bichitoDefaultACM() : $puertoValido = $serial -> bichitoDefaultCOM();
					if (!$puertoValido) {
						throw new NotFoundException('Puerto Inválido', 401);
					}

					// borrar
					// $serial -> bichitoDefaultACM();

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
				App::import('Vendor', 'BichitoClass', array('file' => 'bichito.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');
				$color = $this -> request -> data('color');
				$pin = (isset($this -> request -> data['pin']) && ($this -> request -> data('pin') >= 0) && ($this -> request -> data('pin') <= 3)) ? $this -> request -> data('pin') : 0;

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0) && ($color >= 0) && ($color <= 255)) {
					# Se inicializa la clase
					$serial = new bichito();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> bichitoDefaultACM() : $puertoValido = $serial -> bichitoDefaultCOM();
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
				App::import('Vendor', 'BichitoClass', array('file' => 'bichito.class.php'));

				# Definición de variables
				$puerto = $this -> request -> data('puerto');
				$direccion = $this -> request -> data('direccion');

				# Se verifican los valores de las variables
				if (($puerto >= 0) && ($direccion >= 0)) {
					# Initialización de la clase
					$serial = new bichito();

					# Definición del Puerto de Salida
					# puerto = 0 >> ACM0 // puerto = 1 >> COM1
					$puerto == 0 ? $puertoValido = $serial -> bichitoDefaultACM() : $puertoValido = $serial -> bichitoDefaultCOM();
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

}
