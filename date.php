<?php 

$Cycle=date("Ym"); 
$Cycle1=date("Ym")-1; 
$Billcycle = array(array('cycle'=>$Cycle,'cycle1'=>$Cycle1));
print json_encode($Billcycle);
 ?>