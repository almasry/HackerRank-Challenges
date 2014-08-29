<?php
    
//  Main

// Open a file for writing
	$OutPutFileHandle = fopen('php://stdout','w') or die ("Unable to open Output file!");

// Open Input File
	$InPutFileHandle = fopen('php://stdin','r') or die ("Unable to open Input file!");
	
// Make this work both ways - EOF and # of Records as per step 1
// ## Add to this to Respect the given variable as well as EOF ## //

	$LowBoundary = intval(fgets($InPutFileHandle));
	$HighBoundary = intval(fgets($InPutFileHandle));
	
// Evaluate the XOR possibilities to find out how many odd numbers are in it

// The lowest possible value of an XOR'd number is Zero, Set the Default below Zero 
// to be able to see if it worked.

	$MaxXOR=-1;
	
	for ($iii=$LowBoundary ; $iii <= $HighBoundary ; $iii++) { 
		for ($jjj=$iii; $jjj <= $HighBoundary ; $jjj++) { 
			$Temp = $iii ^ $jjj;
			$MaxXOR = max($MaxXOR, $Temp);
		};
	};

// Write the answer

	$Answer = $MaxXOR;

	fwrite($OutPutFileHandle, $Answer);
//	fwrite($OutPutFileHandle, "\n");
	
// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main

?>
