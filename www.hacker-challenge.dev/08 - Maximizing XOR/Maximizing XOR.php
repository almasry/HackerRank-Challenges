<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>08 - Maximizing XOR PHP</title> 
</head>
<body>
<h2>08 - Maximizing XOR PHP</h2>
<?php

//	08 - Maximizing XOR


// Given to me:

//	$Lower - LowerEnd = Low Limit Value.
//	$Higher - LowerEnd = High Limit Value.

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
		define("ShowOutput", "YES", TRUE);
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

// functions go here

//  Main

// Open a file for writing
	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
	//	fseek($OutPutFileHandle, 0);

// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");

	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	while (!feof($InputFileHandle)) {

		$InputString = fgets($InPutFileHandle);

		if (TestDebug == "ON") {
			echo "InputString Before = '" . $InputString . "'" . aNewLine;
		};

		// Clean up the input - Strip whitespace chars
		// $InputString = preg_replace("/[^a-zA-Z]/", "", $InputString);
		$InputStringArray = explode(" ", $InputString);


		if (TestDebug == "ON") {
			echo "InputString After = '" . $InputStringArray . "'" . aNewLine;
		};

		// Break into Inputs
		$LLL = intval($InputStringArray[0]);
		$HHH = intval($InputStringArray[1]);

		if (TestDebug == "ON") {
			echo "Lower Limit = " . $LLL . ", Higher Limit = " . $HHH . aNewLine;
		};

		// Evaluate the XOR possibilities to find oout how many odd numbers are in it
		
		$MaxXOR=0;

		for ($iii=$LLL ; $iii <= $HHH ; $iii++) { 
			for ($jjj=iii; $jjj <= $HHH ; $jjj++) { 
				$MaxXOR = max($MaxXOR, ($iii xor $jjj)	
			};
		};


		if (TestDebug == "ON") {
			echo "MaxXOR = " . $MaxXOR . aNewLine;
		};


		// Open a file for writing
		$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

		// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
		fseek($OutPutFileHandle, 0);
		// Write the line

		fwrite($OutPutFileHandle, $Answer);
		fwrite($OutPutFileHandle, "\n");
		if (ShowOutput == "YES") {
			echo "fwrite = " . $Answer . aNewLine;
//		fclose($OutPutFileHandle);
		};

	}; 	// End While !feof($InputFileHandle)	

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
