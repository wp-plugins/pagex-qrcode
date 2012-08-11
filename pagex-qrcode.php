<?php
/*
Plugin Name: Pagex QRcode
Plugin URI: http://www.pagex.com/plugins/
Description: Awesome QRCode Generator WordPress Plugin
Version: 1.0
Author: pagex
Author URI: http://www.pagex.com/
Contributors: cbengine
*/

function pagex_qrcode_shortcode($attr) {
	extract(shortcode_atts(array('message' => '', 'alt' => '', 'size' => '', 'align' => '', 'class' => ''), $attr));
	$current_uri = 'http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . '';
	$message = (empty($message) && $message !==0) ? $current_uri : strip_tags(trim($message));  
	$message = urlencode($message);
	$alt = (empty($alt) && $alt !==0) ? "" : strip_tags(trim($alt));        
	$size = (empty($size) && $size !==0) ? "80" : strip_tags(trim($size));
	$align = (empty($align) && $align !==0) ? "" : strip_tags(trim($align));
	$class = (empty($class) && $class !==0) ? "" : strip_tags(trim($class));
	$output = "";
	$image = 'https://chart.googleapis.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chld=H|0&chl=' . $message;
	if ($align == "right" || $align == "left") { $align = ' align="'.$align.'"'; }    
	if ($class != "") { $class = ' class="' . $class . '"'; }
	$output = '<img src="' . $image . '" alt="' . $alt . '" width="' . $size . '" height="' . $size . '"' . $align . $class . ' />';
	return $output;
}
add_shortcode('pagex-qrcode', 'pagex_qrcode_shortcode');