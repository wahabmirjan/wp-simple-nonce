<?PHP
Class WPSimpleNonce {


	public static function createNonce($name='nonce')
	{
		if (is_array($name)) {
			if (isset($name['name'])) {
				$name = $name['name'];
			} else {
				$name = 'nonce';
			}
		}
		$session = WP_Session::get_instance();
		if (!array_key_exists('nonce',$session)) {
		  $session['nonce'] = array();
		}
		$session['nonce'][$name] = md5( wp_salt('nonce') . $name . microtime(true));
		return $session['nonce'][$name];
	}


	public static function createNonceField($name='nonce')
	{
		if (is_array($name)) {
			if (isset($name['name'])) {
				$name = $name['name'];
			} else {
				$name = 'nonce';
			}
		}

		$name   = filter_var($name,FILTER_SANITIZE_STRING);
		$nonce  = self::createNonce($name);

		return '<input type="hidden" name="' . $name . '" value="'.$nonce.'" />';
	}


	public static function checkNonce( $name, $value ) 
	{
		$session = WP_Session::get_instance();
		if (!isset($session['nonce'][$name])) {
		  return false;      
		}
		$returnValue = ($session['nonce'][$name] === $value);
		// just in case it doesn't get unset, let's fill it with garbage.
		$session['nonce'][$name] = md5(wp_salt('nonce') . $name . microtime(true) . $name . wp_salt('nonce'));
		unset($session['nonce'][$name]);
		$session->write_data();
		return $returnValue;
	}


}