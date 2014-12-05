<?php

/**
 * Formats a JSON string for pretty printing
 *
 * @param string $json The JSON to make pretty
 * @param bool $html Insert nonbreaking spaces and <br />s for tabs and linebreaks
 * @return string The prettified output
 * @author Jay Roberts
 */
function format_json($json, $html = false) {
	$tabcount = 0;
	$result = '';
	$inquote = false;
	$ignorenext = false;

	if ($html) {
		$tab = "&nbsp;&nbsp;&nbsp;";
		$newline = "<br/>";
	} else {
		$tab = "\t";
		$newline = "\n";
	}

	for($i = 0; $i < strlen($json); $i++) {
		$char = $json[$i];

		if ($ignorenext) {
			$result .= $char;
			$ignorenext = false;
		} else {
			switch($char) {
				case '{':
					$tabcount++;
					$result .= $char . $newline . str_repeat($tab, $tabcount);
					break;
				case '}':
					$tabcount--;
					$result = trim($result) . $newline . str_repeat($tab, $tabcount) . $char;
					break;
				case ',':
					$result .= $char . $newline . str_repeat($tab, $tabcount);
					break;
				case '"':
					$inquote = !$inquote;
					$result .= $char;
					break;
				case '\\':
					if ($inquote) $ignorenext = true;
					$result .= $char;
					break;
				default:
					$result .= $char;
			}
		}
	}

	return $result;
}



function imageDataFromFilePath($path)
	{

		$base64 = "";

        if($fp = fopen($path,"rb", 0)) 
        { 
            $image = fread($fp,filesize($path)); 
            fclose($fp); 
            $base64 = chunk_split(base64_encode($image)); 	   
		}

		return $base64;
	}


?>