<?php

$OutArray = "";
$Max5s = 0;
$Max3s = 0;

	function AssembleStr($N5, $N3){
		global $OutArray;

		$Fives = "";
		For ($iii=1; $iii<=$N5; $iii++)		{
			$Fives = $Fives . "55555" . " ";
		};
		
		$Threes = "";
		For ($iii=1; $iii<=$N3; $iii++)		{
			$Threes = $Threes . "333" . " ";
		};
		$OutArray = $Fives . $Threes;
		echo "$OutArray <br>" . "\n";
	};
$OutArray="";
$Max5s = 4;
$Max3s = 3;
AssembleStr($Max5s, $Max3s);

$Max5s = 1;
$Max3s = 1;
AssembleStr($Max5s, $Max3s);

$Max5s = 11;
$Max3s = 0;
AssembleStr($Max5s, $Max3s);

$Max5s = 0;
$Max3s = 0;
AssembleStr($Max5s, $Max3s);

$Max5s = 0;
$Max3s = 2;
AssembleStr($Max5s, $Max3s);

?>
