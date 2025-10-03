<?php

/**
 * use this data format
 * 
 * @param string $uri
 * @return full url of the given file path
 */
// ------------------------------------------------------------------------
if ( ! function_exists('datetimethai')){
	function datetimethai($strDate){

		$strYear 			= date("Y",strtotime($strDate))+543;
		$strMonth			= date("n",strtotime($strDate));
		$strDay				= date("j",strtotime($strDate));
		$strHour			= date("H",strtotime($strDate));
		$strMinute			= date("i",strtotime($strDate));
		$strSeconds			= date("s",strtotime($strDate));
		$months_fullname 	= Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		$strMonthThai		= $months_fullname[$strMonth];

		return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
	}
}

/**
 * use this data format
 * 
 * @param string $uri
 * @return full url of the given file path
 */
// ------------------------------------------------------------------------
if ( ! function_exists('datethai')){
	function datethai($strDate){

		$strYear 			= date("Y",strtotime($strDate))+543;
		$strMonth			= date("n",strtotime($strDate));
		$strDay				= date("j",strtotime($strDate));
		$strHour			= date("H",strtotime($strDate));
		$strMinute			= date("i",strtotime($strDate));
		$strSeconds			= date("s",strtotime($strDate));
		$months_fullname 	= Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		$strMonthThai		= $months_fullname[$strMonth];

		return "$strDay $strMonthThai $strYear";
	}
}

/**
 * use this data format
 * 
 * @param string $uri
 * @return full url of the given file path
 */
// ------------------------------------------------------------------------
if ( ! function_exists('datethaishort')){
	function datethaishort($strDate){

		$strYear 			= date("Y",strtotime($strDate))+543;
		$strMonth			= date("n",strtotime($strDate));
		$strDay				= date("j",strtotime($strDate));
		$strHour			= date("H",strtotime($strDate));
		$strMinute			= date("i",strtotime($strDate));
		$strSeconds			= date("s",strtotime($strDate));
		$months_cut_name 	= Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
		$strMonthThai		= $months_cut_name[$strMonth];

		return "$strDay $strMonthThai $strYear";
	}
}
?>