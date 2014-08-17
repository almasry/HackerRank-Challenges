<?php

$OutArray[1] = "";
$Max5s = 0;
$Max3s = 0;

	function Assemblestr(TTT){
		global $OutArray, $Max5s, $Max3s;

		$Fives = "";
		For ($iii=$Max5s; $iii<=$Max5s; $iii++)		{
			$Fives = $Fives + "55555";
		};
		
		$Threes = "";
		For ($iii=$Max3s; $iii<=$Max3s; $iii++)		{
			$Threes = $Threes + "333";
		};
		$OutArray[TTT] = $Fives + $Threes;
		echo "$Outarray <br>";
	};
$OutArray[1] "";
$Max5s = 5;
$Max3s = 3;
Assemblestr(1);

?>
