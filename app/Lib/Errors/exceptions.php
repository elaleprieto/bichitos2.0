<?

class FaltaParametroException extends CakeException {
	protected $_messageTemplate = 'Database connection "%s" is missing, or could not be created.';

/**
 * Constructor
 *
 * @param string $message If no message is given 'Unauthorized' will be the message
 * @param string $code Status code, defaults to 401
 */
	public function __construct($message = null, $code = 401) {
			
		if (empty($message)) {
			$message = 'Falta algún parámetro';
		}
		parent::__construct($message, $code);
	}

}

?>