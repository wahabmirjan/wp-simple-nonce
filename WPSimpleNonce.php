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

		$nonce = md5( wp_salt('nonce') . $name . microtime(true));
		$this->storeNonce($nonce,$name);

		return $name;
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
		$name = filter_var($name,FILTER_SANITIZE_STRING);
		$nonce = self::fetchNonce($name);
		$returnValue = ($nonce===$value);
		return $returnValue;
	}


	public static function  storeNonce($nonce, $name)
	{
		if (empty($name)) {
			return false;
		}

		add_option('wp_simple_nonce_'.$name,$nonce);
		add_option('wp_simple_nonce_expires_'.$name,time()+86400);
		return true;
	}


	protected static function  fetchNonce($name)
	{
		$returnValue = get_option('wp_simple_nonce_'.$name);
		$nonceExpires = get_option('wp_simple_nonce_expires_'.$name);
		
		self::deleteNonce($name);
		
		if ($nonceExpires<time()+86400) {
			$returnValue = null;
		}

		return $returnValue;
	}


	public static function deleteNonce($name = '')
	{
		delete_option('wp_simple_nonce_'.$name);
		delete_option('wp_simple_nonce_expires_'.$name);
		return;
	}


	protected static function clearNonces($force=false)
	{
		if (!$force and rand(0,100)!==100) {
			return;
		}

		global $wpdb;
		$sql = 'SELECT option_id, 
		               option_name, 
		               option_value 
		          FROM ' . $wpdb->options . ' 
		         WHERE option_name like "wp_simple_nonce_expires_%"'
		$rows = $wpdb->get_results($sql);

		foreach ( $rows as $singleNonce ) 
		{
			if ($singleNonce->option_value>time()+86400) {
				$name = substr($singleNonce->option_name, 16);
				self::deleteNonce($name);
			}
		}

		return;

	}
}