<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Service Lane PHP</title> 
</head>
<body>
<h2>Service Lane PHP</h2>
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
		define("TestDebug", "Off", TRUE);
		define("FilesAreLocal", "LOCAL", TRUE);
	// Set File Locations & Paths
		if (FilesAreLocal == "LOCAL") {
			$InputFilePath = 'LocalInputFile.txt';
			$OutputFilePath = 'LocalOutputFile.txt';
		} else {
			$InputFilePath = 'php://stdin';
			$OutputFilePath = 'php://stdout';
		};

	if (TestDebug == "ON") {

		echo "Debug ON " . aNewLine;
		if (FilesAreLocal == "LOCAL") { 
			echo "Files are LOCAL " . aNewLine;
		};
		date_default_timezone_set("America/Los_Angeles");
		echo "The time is " . date('Y-m-d H:i:s') . aNewLine;
	};

// Define the Array

	$ServiceLaneArray = array();
	$InputArray = array();
	$TemplineArray = array();

// functions go here

	function WalkThisLane($ServiceLaneArray, $EntryPoint, $eXitPoint) {
		
		$LowestValue = 3;

	  	for ($iii=$EntryPoint ; $iii <= $eXitPoint ; $iii++) {
	 		if  ($ServiceLaneArray[$iii] < $LowestValue) {
				$LowestValue = $ServiceLaneArray[$iii];
		 		};
		};
		return $LowestValue;
	};

//  Main

	// Open a file for writing
	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
	fseek($OutPutFileHandle, 0);
	
	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	// Get first Record - The first record contains the Length of the Freeway and the 
	// Number of Test Cases in the file to process
	
	$FirstLine = fgets($InPutFileHandle);
	$TemplineArray = explode(" ", $FirstLine); 
	$InputArray = $TemplineArray;

	// Do any analysis needed of the first line here. Often times HackerRank
	// wants you to take a value on the first line and use it for the number of records to process.

	// echo $InputArray[1];

	$LengthOfFreeway = intval($InputArray[0]);
	$TestCases = intval($InputArray[1]);
	
	// Test and Debug
	if (TestDebug == "ON") {
		echo "FirstLine = ";
		foreach ($TemplineArray as $value) {
			echo " '" . $value . "' ";
		};
		echo aNewLine . "LengthOfFreeway = '" . $LengthOfFreeway . "'". aNewLine;
		echo "TestCases = '" . $TestCases . "'" . aNewLine;
		
	};

	// Get 2nd record - The Service Lane width Data String

	$SecondLine = fgets($InPutFileHandle);
	$TemplineArray = explode(' ', $SecondLine);
	
	// Test and Debug
	if (TestDebug == "ON") {
		echo "SecondLine = '" . $SecondLine . "'" . aNewLine;
	};

	foreach ($TemplineArray as $value) {
		$value = intval($value);
		// If Debug ON
		if (TestDebug == "ON") {
			echo "'" . $value . "'   ";
		}
	};
	
	// If Debug ON
		if (TestDebug == "ON") {
			echo aNewLine;
		}
	

	$ServiceLaneArray = $TemplineArray;
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
for ($iii = 1 ; $iii <= $TestCases ; $iii++) { 

//	while(!feof($InPutFileHandle)) {

		$Answer = Null;
	
		$NextLine = fgets($InPutFileHandle);
		$GetEntryExit = explode(" ", $NextLine); 
		// Clean up the input
		$EntryPoint = intval($GetEntryExit[0]);
		$eXitPoint = intval($GetEntryExit[1]);
		
		if (TestDebug == "ON") {
				echo "Answer Reset = '" . $Answer . "', Entry = '" . $EntryPoint . "', eXit = '" . $eXitPoint . "'  ";
			};

		// Call data handler HERE
		$Answer = intval(WalkThisLane($ServiceLaneArray, $EntryPoint, $eXitPoint));

		if (TestDebug == "ON") {
			echo "Answer = '" . $Answer . "'" . aNewLine;
		};	// Test and Debug

		// Add a linefeed to $Answer
//		$Answer .= "\n";

		// Write the line
		fwrite($OutPutFileHandle, $Answer);
		fwrite($OutPutFileHandle, "\n");


	};	//End While

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main

?>

<h2>Done!</h2>

</body>
</html>
