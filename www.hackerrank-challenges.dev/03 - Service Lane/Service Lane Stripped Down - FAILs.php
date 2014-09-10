<?php

//	Hackerank File Handlers
// 	HackerRank seems to have certain characteristics about their files. 
//  One is that they use the first entry to set up information about what is contained in the rest of the file.
// 	Rather than write statis arrays for each program, this program is designed to dynamically determine what needs to be buit on the fly, and build it.
// 	It will use some constants 
//  
// Given to me:

//	$LengthOfFreeway 		= Length of Freeway
//	$TestCases 				= Number of Test Cases - How many time we gonna do this?

//	$ServiceLaneArray 		= Array [1..$N] Integers indicating the width of the freeway at each point.

//	$EntryPoint				= Entry Point
//	$eXitPoint				= Exit Point
	
// Set File Locations & Paths
	$InputFilePath = 'LocalInputFile.txt'; // 'php://stdin';
	$OutputFilePath = 'LocalOutputFile.txt'; // 'php://stdout';

// Define the Array

	$ServiceLaneArray = array();
	$InputArray = array();
	$TemplineArray = array();

//  Main

	// Open a file for writing
	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
	fseek($OutPutFileHandle, 0);
	
	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$FirstLine = fgets($InPutFileHandle);
	$TemplineArray = explode(" ", $FirstLine); 
	foreach ($TemplineArray as $value) {
		$TemplineArray = intval($TemplineArray);
	}
	$InputArray = $TemplineArray;

	// Do any analysis needed of the first line here. Often times HackerRank
	// wants you to take a value on the first line and use it for the number of records to process.

	$LengthOfFreeway = $InputArray[0];
	$TestCases = $InputArray[1];
	
	// Get 2nd record

	$SecondLine = fgets($InPutFileHandle);
	$TemplineArray = explode(' ', $SecondLine);
	foreach ($TemplineArray as $value) {
		$TemplineArray = intval($TemplineArray);
	}
	$ServiceLaneArray = $TemplineArray;
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //

	while(!feof($InPutFileHandle)) {
	
		$NextLine = fgets($InPutFileHandle);
		$GetEntryExit = explode(" ", $NextLine); 
		foreach ($TemplineArray as $value) {
			$TemplineArray = intval($TemplineArray);
		}
		$EntryPoint = $GetEntryExit[0];
		$eXitPoint = $GetEntryExit[1];

		// Call data handler HERE
		$LowestValue = 3;

	  	for ($iii=$EntryPoint ; $iii <= $eXitPoint ; $iii++) {
	 		if  ($ServiceLaneArray[$iii] < $LowestValue) {
				$LowestValue = $ServiceLaneArray[$iii];
		 		};
		};
		$LowestValue = intval($LowestValue) . "\n";
		fwrite($OutPutFileHandle, $LowestValue);

	};	//End While

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main

?>

