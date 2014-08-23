<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Gem Elements PHP</title> 
</head>
<body>
<h2>Gem Elements PHP</h2>
<?php

//	Hackerank File Handlers
// 	HackerRank seems to have certain characteristics about their files. 
//  One is that they use the first entry to set up information about what is contained in the rest of the file.
// 	Rather than write statis arrays for each program, this program is designed to dynamically determine what needs to be buit on the fly, and build it.
// 	It will use some constants 
//  
// Given to me:

//	$TestCases 				= Number of Records

//	$ElementArray 			= Rocks composed of "Elements".

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

// Define the Array

	$ElementArray = array();

// functions go here


//  Main

	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	// Get first Record - The first record contains the Length of the Freeway and the 
	// Number of Test Cases in the file to process
	
	$RocksToCheck = intval(fgets($InPutFileHandle));

	if (TestDebug == "ON") {
		echo "RocksToCheck = '" . $RocksToCheck . "'" . aNewLine;
	};	// Test and Debug
	

	// Do any analysis needed of the first line here. Often times HackerRank
	// wants you to take a value on the first line and use it for the number of records to process.
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $RocksToCheck ; $iii++) { 

		$Element = fgets($InPutFileHandle);

		if (TestDebug == "ON") {
			echo "Element Before = '" . $Element . "'" . aNewLine;
		};
		// Clean up the input - Strip leading and trailing chars

		$Element = preg_replace("/[^a-zA-Z]/", "", $Element);

		$ElementArray[$iii-1] = $Element;

		if (TestDebug == "ON") {
			echo "Element After = '" . $Element . "'" . aNewLine;

		};

	}; 	// End For	

		if (TestDebug == "ON") {
			var_dump($ElementArray);
		};

	$Answer = Null;

	// Call data handler HERE
	$Answer = intval("222");

	if (TestDebug == "ON") {
		echo "Answer = '" . $Answer . "'" . aNewLine;
	};	// Test and Debug

	// Open a file for writing
	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
	fseek($OutPutFileHandle, 0);

	// Write the line
	fwrite($OutPutFileHandle, $Answer);
	fwrite($OutPutFileHandle, "\n");

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
