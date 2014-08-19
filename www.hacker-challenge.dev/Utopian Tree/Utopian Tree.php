
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

function GrowTree($BeginningHeight, $Years) {
		for ($i=1; $i <=$Years ; $i++) { 
			$BeginningHeight *= 2;
			$BeginningHeight += 1;
		} // End For
		return $TreeHeight;
}
//  Main

	// Declare Array to hold up to 20 values for the problem
	$TreeArray = array(0,1,2,3,4,5,6,7,8,9,10);	

	// Open Input File
	$InputFileHandle = fopen("php://stdin","r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$TestCases = fgets($InputFileHandle);
	$TreeArray[0] = $TestCases; 

	// Get the rest of the records
	$ppp=1;
	while(!feof($InputFileHandle)) {
		$TreeArray[$ppp] = fgets($InputFileHandle);
		$ppp+=1;
	};	//End While

	// Close File
	fclose($InputFileHandle);

	// Open a file for writing
	$OutPutFileHandle = fopen("php://stdout","w") or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
	fseek($OutPutFileHandle, 0);
	
	// Main processing Loop, this is where we loop thru the records and solve each one
	for ($iii=1;$iii<=$RecordsInFile;$iii++){
		$TreeHeight = (GrowTree($TreeArray[$iii])) . "\n";
		fwrite($OutPutFileHandle, $TreeHeight);
	};	//End For

	// Close the file for writing
	$OutPutFileHandle = fclose($OutPutFileHandle);

// End Main

?>
