<?php

/*
 * Extract the name of the webfont and enqueue its style.
 */
function shoestrap_typography_webfont() {
  $webfont           = get_theme_mod( 'shoestrap_google_webfonts' );
  $webfont_weight      = get_theme_mod( 'shoestrap_webfonts_weight' );
  $webfont_character_set = get_theme_mod( 'shoestrap_webfonts_character_set' );

  $f = strlen( $webfont );
  if ($f > 3){
    $webfontname = str_replace( ' ', '+', $webfont );

  return '<link href="//fonts.googleapis.com/css?family=' . $webfontname . ':' . $webfont_weight . '&subset=' . $webfont_character_set . '" rel="stylesheet" type="text/css">';

  }
}


/*
 * Shown when the API key is bad. May want to revise to a more "shoebox-like" error function.
 */
function alert_bad_key() {
  ?>
    <div class="alert" style="margin: 20px;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Warning!</strong> Your google api key is invalid. Please update ~/lib/config.php->GOOGLE_FONTS_API_KEY with a valid key.
    </div>
  <?php
}

// Clean up the Google Webfonts variants to be human readable
function getSubsets($var) {
	$result = array();
	foreach ($var as $v) {
		if (strpos($v,"-ext")) {
			$name = ucfirst(str_replace("-ext"," Extended",$v));
		} else {
			$name = ucfirst($v);
		}
		array_push($result, array('id'=>$v, 'name'=>$name));
	}
	return array_filter($result);
}
// Clean up the Google Webfonts variants to be human readable
function getVariants($var) {
	$result = array();
	$italic = array();
	foreach ($var as $v) {
		$name = "";
		if ($v[0] == 1) {
			$name = 'Ultra-Light 100';
		} else if ($v[0] == 2) {
			$name = 'Light 200';
		} else if ($v[0] == 3) {
			$name = 'Book 300';
		} else if ($v[0] == 4 || $v[0] == "r" || $v[0] == "i") {
			$name = 'Normal 400';
		} else if ($v[0] == 5) {
			$name = 'Medium 500';
		} else if ($v[0] == 6) {
			$name = 'Semi-Bold 600';
		} else if ($v[0] == 7) {
			$name = 'Bold 700';
		} else if ($v[0] == 8) {
			$name = 'Extra-Bold 800';
		} else if ($v[0] == 9) {
			$name = 'Ultra-Bold 900';
		}
		if (strpos($v,"italic") || $v == "italic") {
			$name .= " Italic";
			$name = trim($name);
			array_push($italic, array('id'=>$v, 'name'=>$name));
		} else {
			array_push($result, array('id'=>$v, 'name'=>$name));
		}
	}
	array_push($result, array_pop($italic));
	return array_filter($result);
}

/*
 * If GoogleAPI key is set, call the API and enable Google Font dropdown, otherwise use the cached font list.
 */
function shoestrap_google_webfonts_array() {
	// Check if they have a valid API key and SSL on this box. Won't work without SSL.
	if(extension_loaded('openssl') && GOOGLE_FONTS_API_KEY != "") {
		$url = "https://www.googleapis.com/webfonts/v1/webfonts?key=".GOOGLE_FONTS_API_KEY;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = json_decode(curl_exec($ch));
		curl_close($ch);
		if ($result->error->code == 400) {
			// Bad API key
			add_action( 'wp_footer', 'alert_bad_key', 199 );
			return json_decode(file_get_contents(dirname(__FILE__).'/webfonts.json'));
		} else {
			$res = array();
			foreach ($result->items as $font) {
				$res[$font->family] = array(
					'variants' => getVariants($font->variants),
					'subsets' => getSubsets($font->subsets)
				);
			}
			return $res;
		}
	} else {
		// No API key specified
		return json_decode(file_get_contents(dirname(__FILE__).'/webfonts.json'));
	}
}