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

		$PalinDrome = fgets($InPutFileHandle);

		if (TestDebug == "ON") {
			echo "PalinDrome Before = '" . $PalinDrome . "'" . aNewLine;
		};
		
		// Clean up the input - Strip whitespace chars

		$PalinDrome = preg_replace("/[^a-zA-Z]/", "", $PalinDrome);
		
		if (TestDebug == "ON") {
			echo "PalinDrome After = '" . $PalinDrome . "'" . aNewLine;
		};
		
		
//		$PalinDromeSplit = str_split($PalinDrome);

		$PalinDromeArray = str_split($PalinDrome);

		
		if (TestDebug == "ON") {
			var_dump($PalinDromeArray) . aNewLine;
		};

		// Process the String
		// My Non Standard solution - Since what they are asking for is the number of ops necessary to do
		// this, and NOT for us to actually do the operation, my solution only finds the necessary number 
		// of steps, and does not tke them.

		// To construct a palindrome their way, one must only use the 'reduce' ability. This makes it easy.
		// By comparing the beginning letter to the end letter, and subtracting the numeric (ASCII) value, 
		// you get difference between them, and the absolute value of theat number is the number of steps required.

		// This is NOT a general Solution

		// get the first element of the array
		// get the last element of the array
		// compare them numerically
		// Take the absolute value
		// Add the result to ops required
		// Keep going until you hit the middle of the string


		$Answer = 0;	// Reset the answer for each Input Record
		$OpsRequired = 0; // Reset the $OpsRequired for each Letter Pair
		$FarEnd = count($PalinDromeArray); // Since arrays start with 0, we must decrement the value of the last element of the array
		$Halfway = intval($FarEnd / 2) - 1; // Stop in the middle where we meet
		$FarEnd -= 1;

		for ($jjj=0 ; $jjj <= $Halfway ; $jjj++) { 
			$OpsRequired = abs(ord($PalinDromeArray[$jjj]) - ord($PalinDromeArray[$FarEnd-$jjj]));
			if (TestDebug == "ON") {
				echo "Ops this Pair = " . $OpsRequired . "   ";
			};

			$Answer += $OpsRequired;

			if (TestDebug == "ON") {
				echo "Answer = '" . $Answer . "'" . aNewLine;
			};	// Test and Debug

		};	// End For
			// Write the line
			fwrite($OutPutFileHandle, $Answer);
			fwrite($OutPutFileHandle, "\n");

	}; 	// End For	

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
