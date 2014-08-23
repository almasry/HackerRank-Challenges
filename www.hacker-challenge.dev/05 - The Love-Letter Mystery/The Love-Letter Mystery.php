<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>05 - The Love-Letter Mystery PHP</title> 
</head>
<body>
<h2>05 - The Love-Letter Mystery PHP</h2>
<?php

//	05 - The Love-Letter Mystery


// Given to me:

//	$TestCases 				= Number of Records

//	$PalinArray 			= Palindrome Array".

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
	$Palindrome = ("String"); 	//	String
	$PalinArray = array();		//	Array of Char

// functions go here


//  Main

	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	//	Get first Record - The first record contains the Number of Test Cases
	//	in the file to process
	
	$NumRecordsToCheck = intval(fgets($InPutFileHandle));

	if (TestDebug == "ON") {
		echo "NumRecordsToCheck = '" . $NumRecordsToCheck . "'" . aNewLine;
	};	// Test and Debug
	

	// Do any analysis needed of the first line here. Often times HackerRank
	
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $NumRecordsToCheck ; $iii++) { 

		$PalinDrome = fgets($InPutFileHandle);

		if (TestDebug == "ON") {
			echo "PalinDrome Before = '" . $PalinDrome . "'" . aNewLine;
		};
		// Clean up the input - Strip whitespahe chars

		$PalinDrome = preg_replace("/[^a-zA-Z]/", "", $PalinDrome);

		
//		$PalinDromeSplit = str_split($PalinDrome);

		$PalinDromeSplit = str_split($PalinDrome);

		if ($iii<2) {
			$PalinDromeArray = $PalinDromeSplit;
			if (TestDebug == "ON") {
				var_dump($PalinDromeArray) . aNewLine;
			};

		} else {
			$PalinDromeArray = $PalinDromeSplit;
			if (TestDebug == "ON") {
				var_dump($PalinDromeArray) . aNewLine;
			};
		}
	}; 	// End For	



		if (TestDebug == "ON") {
			var_dump($PalinDromeArray);
		};

	$Answer = Null;

	// Call data handler HERE
	$Answer = count($PalinDromeArray);

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
