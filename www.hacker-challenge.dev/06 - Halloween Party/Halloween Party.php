<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>06 - Halloween Party PHP</title> 
</head>
<body>
<h2>06 - Halloween Party PHP</h2>
<?php

//	06 - Halloween Party


// Given to me:

//	$T - (TestCases) = Number of Records

//	$K - (Kuts) = Number of Cuts.

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

// Define Variables

	$RecordsToCheck = intval("0");		//	Integer
	$Kuts = 0;

// functions go here


//  Main

	// Open a file for writing
	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
	fseek($OutPutFileHandle, 0);

	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	//	Get first Record - The first record contains the Number of Test Cases
	//	in the file to process
	
	$NumRecordsToCheck = intval(fgets($InPutFileHandle));

	if (TestDebug == "ON") {
		echo "NumRecordsToCheck = '" . $NumRecordsToCheck . "'" . aNewLine;
	};	// Test and Debug
	

	// Do any analysis needed of the first line here.
	
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $NumRecordsToCheck ; $iii++) { 

		$Kuts = intval(fgets($InPutFileHandle));

		if (TestDebug == "ON") {
			echo "Kuts = '" . $Kuts . "'" . aNewLine;
		};
		$HalfKuts = intval($Kuts / 2);
		if ($Kuts % 2 == 0) {	// If $Kuts is an ODD number
			$Answer = intval($HalfKuts * $HalfKuts);
		} else {
			$Answer = intval($HalfKuts * ($HalfKuts+1));
		};
		if (TestDebug == "ON") {
			echo "Answer = '" . $Answer . "'" . aNewLine;
		};	// Test and Debug

		// Write the line
			fwrite($OutPutFileHandle, $Answer);
			fwrite($OutPutFileHandle, "\n");

	}; 	// End For $NumRecordsToCheck	

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
