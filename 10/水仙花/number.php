<?php
for($i=100;$i<1000;$i++){
	$a=str_split($i);
	$b=pow($a[0],3)+pow($a[1],3)+pow($a[2],3);
	if($b==$i){
		echo "水仙花为".$i;
	}
}