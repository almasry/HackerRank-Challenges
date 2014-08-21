<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Service Lane PHP</title> 
</head>
<body>

<?php

//	Hackerank File Handlers
// 	HackerRank seems to have certain characteristics about their files. 
//  One is that they use the first entry to set up information about what is contained in the rest of the file.
// 	Rather than write statis arrays for each program, this program is designed to dynamically determine what needs to be buit on the fly, and build it.
// 	It will use some constants 
//  
// Given to me:

//	$LengthOfFreeway 		= Length of Freeway - [1..]
//	$TestCases 				= Number of Test Cases - How many time we gonna do this?

//	$ServiceLaneArray 		= Array [1..$N] Integers indicating the width of the freeway at each point.

//	$EntryPoint				= Entry Point
//	$eXitPoint				= Exit Point

// Declare Globals

	// When TestDebug is TRUE THEN 
		// DO testing with local files, 
		// Turn ON debugging messages
	// ELSE FALSE 
		// use HackerRank file locations
		// Turn OFF debuggin messages

	// Since newlines vary from place to place, and sometimes require \n, <br>, or both, set up a global constant 
	// by default, constants are global
		define("aNewLine", "<br> \n");
		define("TestDebug", "ON", TRUE);
	
	// Set File Locations & Paths
		if (TestDebug == "ON") {
			$InputFilePath = 'LocalInputFile.txt';
			$GLOBALS['$OutputFilePath'] = 'LocalOutputFile.txt';
		} else {
			$GLOBALS['$InputFilePath'] = 'php://stdin';
			$GLOBALS['$OutputFilePath'] = 'php://stdout';
		};

	if (TestDebug == "ON") {
		echo "Debug ON " . aNewLine;
		date_default_timezone_set("America/Los_Angeles");
		echo date('Y-m-d H:i:s') . aNewLine;
	};

// Define the Array

	$ServiceLaneArray = array();

// functions go here

	function WalkThisLane($ServiceLaneArray, $EntryPoint, $eXitPoint) {
		
		$OldValue = 3;

	  	foreach ($ServiceLaneArray as $value) {
	 		if  ($value < $OldValue) {
				$OldValue = $value;
		 		};
		};
	};

//  Main

	// Open a file for writing
	$OutPutFileHandle = fopen($GLOBALS['$OutputFilePath'],"w") or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
	fseek($OutPutFileHandle, 0);
	
	// Open Input File
	$InputFileHandle = fopen($InputFilePath,"r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$FirstLine = fgets($InputFileHandle);
	$TempLine = explode(" ", $FirstLine); 
	$InputArray = $TempLine;

	// Do any analysis needed of the first line here. Often times HackerRank
	// wants you to take a value on the first line and use it for the number of records to process.

	$LengthOfFreeway = $InputArray[0];
	$TestCases = $InputArray[1];
	

	// Test and Debug
	if (TestDebug == "ON") {
		echo $FirstLine . aNewLine;
		print_r(explode(' ', $FirstLine, 0));
	};

	// Get 2nd record

	$SecondLine = fgets($InputFileHandle);
	$TempLine = explode(" ", $FirstLine); 
	$ServiceLaneArray = $TempLine;
	
	// Test and Debug
	if (TestDebug == "ON") {
		echo $SecondLine . aNewLine;
		print_r(explode(' ', $SecondLine, 0));
	};

	// Get the rest of the records	
	// Use a counter for the Array indexing
	$ppp=1; 

	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //

	while(!feof($InputFileHandle)) {
		$NextLine = fgets($InputFileHandle);
		$InputArray[$ppp] = explode(" ", $NextLine); 


	if (TestDebug == "ON") {
			echo "Entry = " . $Entry . "eXit = " . $eXit . $aNewLine;
		};

	// Call data handler HERE

	fwrite($OutPutFileHandle);

	if (TestDebug == "ON") {
		echo " File Written\n" . aNewLine;
	}		// Test and Debug
		if (TestDebug == "ON") {
		echo $NextLine . aNewLine;
		print_r(explode(' ', $FirstLine, 0));
		};

		$ppp+=1;
	};	//End While

	// Close Files
	fclose($InputFileHandle);




// End Main

?>

<h2>Done!</h2>

</body>
</html>
