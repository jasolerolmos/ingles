<?php
/* Funciones básicas
 * Jose Antonio Soler Olmos
 * jasolerolmos@gmail.com
 * 01-07-2011
 *
 */

function Url_Amigable($link){
	if($_SESSION['urls_amigables']==true){
		$link = str_ireplace(".php", "", $link);
	}
	return $link;
}