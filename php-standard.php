function aprs_passcode($call)
{
//	$call = strtoupper(substr($call, 0,strrpos($call,'-'))); // fix me

	$call = strtoupper($call);
	$hash = 0x73e2;
	$i = true;
	for ($x = 0; $x < strlen($call) + 1; $x++) {

		$nextChar = substr($call,$x,1);
		
		if ($i == true) {
			$hash = ($hash ^ (ord($nextChar) << 8));
		} else {
			$hash = ($hash ^ (ord($nextChar)));
		}
		$i = !$i;
	}
	return ($hash & 0x7fff);
}
