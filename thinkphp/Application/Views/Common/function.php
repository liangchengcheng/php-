<?php 

function getAge($year)
{
	$now=date('Y');
	if ($year>$now) {
		return '数据错误';
	}
	return $now-$year;
}

 ?>