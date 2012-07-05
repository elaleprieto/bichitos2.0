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
			throw new NotFoundException(__('Invalid bichito'));
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
				$this -> Session -> setFlash(__('The bichito has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The bichito could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid bichito'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Bichito -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The bichito has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The bichito could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid bichito'));
		}
		if ($this -> Bichito -> delete()) {
			$this -> Session -> setFlash(__('Bichito deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Bichito was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function asignar_accion() {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> layout = 'ajax';
		$this -> set('request', $this -> request);
		
		# Se verifica que las variables requeridas estén definidas
		if ($this -> request -> data('puerto') && $this -> request -> data('direccion') && $this -> request -> data('accion')) {
			# Se carga la clase requerida
			// require ("bichito.class.php");
			// App::import('Vendor', 'bichito.class');
			App::import('Vendor', 'BichitoClass', array('file' => 'bichito.class.php'));

			# Definición de variables
			$puerto = $this -> request -> data('puerto');
			$direccion = $this -> request -> data('direccion');
			$accion = $this -> request -> data('accion');
			$pin = (isset($this -> request -> pin) && ($this -> request -> pin >= 0) && ($this -> request -> pin <= 3)) ? $this -> request -> pin : 0;

			# Se verifican los valores de las variables
			if (($puerto >= 0) && ($direccion >= 0) && ($accion >= 0) && ($accion <= 1)) {
				# Se inicializa la clase
				$serial = new bichito();

				# Definición del Puerto de Salida
				# puerto = 0 >> ACM0 // puerto = 1 >> COM1
				$puerto == 0 ? $serial -> bichitoDefaultACM() : $serial -> bichitoDefaultCOM();

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
		}

	}

}
