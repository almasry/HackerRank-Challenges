<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>11 - Filling Jars PHP</title> 
</head>
<body>
<h2>11 - Filling Jars PHP</h2>
<?php

//	11 - Filling Jars PHP

// Given to me:

//	$N - Number of Infinite Jars to fill
//	$M - Number of Operations to Perform [in the following Records (Lines)]
//	$A - Index Start (Inclusive)
//	$B - Index End (Inclusive)
//	$K - Number of Kandies to fill the jar with
 

// Declare Globals

	// When TestDebug is TRUE THEN 
		// DO testing with local files, 
		// Turn ON debugging messages
	// ELSE FALSE 
		// use HackerRank file locations
		// Turn OFF debuggin messages

	// Since newlines vary from place to place, and sometimes require \n, <br>, or both, set up a global constant 
	// by default, constants are global
	//	Turn these OFF when running on on Hackerrank
		define("aNewLine", "<br> \n");
		define("TestDebug", "off", TRUE);	// "ON" for TestDebug
		define("FilesAreLocal", "LOCAL", TRUE);	// "LOCAL" for Local Files
		define("ShowOutput", "YES", TRUE);	// "YES" Just Show Answers
	// Set File Locations & Paths as constants / globals
		if (FilesAreLocal == "LOCAL") {
			define("InputFilePath", 'LocalInputFile.txt');
			define ("OutputFilePath", 'LocalOutputFile.txt');
		} else {
			define("InputFilePath", 'php://stdin');
			define ("OutputFilePath", 'php://stdout');
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

	function EchoBug($A="", $B, $C=1) {
		// $A is the name of the variable
		// $B is the variable or array variable
		// $C is a boolean: 0 (Zero) for FALSE, 1 for (True) - TRUE to write a newline

		if (TestDebug == "ON") {
			
			if (is_array($B) == TRUE) {
				echo "$A = '" . aNewLine;
				var_dump($B);
				echo aNewLine;
			} else {
				echo "$A = '" . $B . "' ";
			};

			echo ($C=1 ? aNewLine : ", ");
			if ($C="1") {
					echo aNewLine;
				} else {
					echo ", ";
				};
		};
	};
	function EchoAnswer($A="", $B, $C=1) {
		// $A is the name of the variable
		// $B is the variable or array variable
		// $C is a boolean: 0 (Zero) for FALSE, 1 for (True) - TRUE to write a newline

		if (ShowOutput == "YES") {
			
			if (is_array($B) == TRUE) {
				echo "$A = '" . aNewLine;
				var_dump($B);
				echo aNewLine;
			} else {
				echo "$A = '" . $B . "' ";
			};

			echo ($C=1 ? aNewLine : ", ");
			if ($C="1") {
					echo aNewLine;
				} else {
					echo ", ";
				};
		};
	};

//  Main

	// Open Files
	$InPutFileHandle = fopen(InputFilePath,'r') or die ("Unable to open Input file!");
	$OutPutFileHandle = fopen(OutputFilePath,'r') or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
		fseek($OutPutFileHandle, 0);

	//	Get first Record - The first record contains the Number of Test Cases
	//	in the file to process
	//  Use intval to strip off trailing "\n"
	$LineOne = fgets($InPutFileHandle);
	$LineOneArray = explode(" ", $LineOne);
	EchoBug("LineOneArray", $LineOneArray, 1);
	$NumJars = $LineOneArray[0];
	EchoBug("NumJars", $NumJars, 1);
	$NumOperations = intval($LineOneArray[1]);
	EchoBug("NumOperations", $NumOperations, 1);

	$KandiesTotal = 0;

	// Do any analysis needed of the first line here.
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $NumOperations ; $iii++) { 

		//	Read a Reocrd
		$LineToProcess = fgets($InPutFileHandle);
		$InputArray = explode(" ", $LineToProcess);

		//	Break it down into fields
			$a_IndexStart = $InputArray[0];	//	Money on Hand
			EchoBug("a_IndexStart", $a_IndexStart, 0);
			$b_IndexEnd = $InputArray[1];	//	Cost per Chocolate
			EchoBug("b_IndexEnd", $b_IndexEnd, 0);
			// intval the last array item to get rid of the trailing "\n"
			$k_Kandies = intval($InputArray[2]);	//	Wrappers needed to get another piece of chocolate
			EchoBug("k_Kandies", $k_Kandies, 0);

		// Do the Maths
			$JarsToFill = $b_IndexEnd - $a_IndexStart +1;
			$KandiesTotal += $JarsToFill * $k_Kandies;


	}; 	// End For $NumOperations

	//	Write Final Answer

		$FinalAnswer = intval($KandiesTotal / $NumJars);
		if (ShowOutput == "YES") echo "<strong><em>";
		EchoAnswer("fwrite Average Kandies", $FinalAnswer, 1);
		if (ShowOutput == "YES") echo "</strong></em>";
		fwrite($OutPutFileHandle, $FinalAnswer);
		fwrite($OutPutFileHandle, "\n");	

	// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
