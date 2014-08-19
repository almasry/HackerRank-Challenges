
<?php

//	Utopian Tree
//	Submission by Peter S. Parker
//	Date: 2014-08- 
//	Written 2014-08-18 -> 19 in PHP
//	http://github.com/petersparker/
//	License: Share and Share Alike, but under no circumstances may this be presented as your own work
//	especialy to any Hacker Challenges
//
//
//  This program is my answer to the Hacker Challenge "Utopian Tree"
//  The full details of this Hacker Challenge are at:
//
// 		https://www.hackerrank.com/challenges/utopian-tree
//
//  Notes to the approach:
//
// 
//
//  BUGS: 
//

function GrowTree($Cycles) {
		$TreeHeight = 1;
		If ($Cycles == 0) return $TreeHeight; //Tree did not grow
		for ($i=1; $i=$Cycles; $i++) { 
			If (($Cycles%2) == 1) {
				$TreeHeight *= 2;
			} else { //End Then
				$TreeHeight += 1;
			} // End Else
		} // End For
		return $TreeHeight;
}

//  Main

	// Declare Array to hold up to 20 values for the problem
	$InputArray = array(0,1,2,3,4,5,6,7,8,9,10);	

	// Open Input File
	$InputFileHandle = fopen("php://stdin","r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$TestCases = fgets($InputFileHandle);
	$InputArray[0] = $TestCases; 

	// Get the rest of the records
	$ppp=1;
	while(!feof($InputFileHandle)) {
		$InputArray[$ppp] = fgets($InputFileHandle);
		$ppp+=1;
	};	//End While

	// Close File
	fclose($InputFileHandle);

	// Open a file for writing
	$OutPutFileHandle = fopen("php://stdout","w") or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
	fseek($OutPutFileHandle, 0);
	
	// Main processing Loop, this is where we loop thru the records and solve each one
	for ($iii=1; $iii<=$TestCases; $iii++){
		$TreeHeight = (GrowTree($InputArray[$iii])) . "\n";
		fwrite($OutPutFileHandle, $TreeHeight);
	};	//End For

	// Close the file for writing
	$OutPutFileHandle = fclose($OutPutFileHandle);

// End Main

?>
