<?php
function cryptoCesar($tab, $decalage){
	$crypto='';
	for ($i=0;$i<strlen($tab);$i++){
		$code = ord($tab[$i]);
		$crypt = $code + $decalage;
		$var = $tab[$i];

		if (ctype_lower($var) == 1){
			$end = 122;
			if ($crypt > 122){
				$res = $crypt - $end;
				$begin = 96;
				$newcrypt = $begin + $res;
				$crypto[$i] = chr($newcrypt);
			} else {
				$crypto[$i] = chr($crypt);
			}
		} else {
			$end = 90;
			// charactère spéciaux
			if ($crypt >= 0 && $crypt <= 47){
				$crypto[$i] = $tab[$i];
			} else if ($crypt > 90){
				$res = $crypt - $end;
				$begin = 64;
				$newcrypt = $begin + $res;
				$crypto[$i] = chr($newcrypt);
			} else {
				$crypto[$i] = chr($crypt);
			}
		}
	}
	echo $crypto;
}
cryptoCesar('What a string!', 5);
?>