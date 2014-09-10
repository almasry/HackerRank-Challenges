<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>12 - Find Digits</title> 
</head>
<body>
<h2>12 - Find Digits</h2>
<?php

//	12 - Find Digits

// 	Given to me:

	//	$t_Testcases - Number of Testcases
	//	$
	//
 

// Declare Globals


//	Set up Files and variable debug
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
		define("TestDebug", "Off", TRUE);	// "ON" for TestDebug
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

	function EchoBug($A="", $B, $C) {
		// $A is the name of the variable
		// $B is the variable or array variable
		// $C is an integer for how many newlines to add for formatting / prettying up

		if (TestDebug == "ON") {
			
			if (is_array($B) == TRUE) {
				echo "$A = '" . aNewLine;
				var_dump($B);
				echo "'" . aNewLine;
			} else {
				echo "$A = '" . $B . "'";
				echo ($C == 1 ? aNewLine : ", ");
			};


			if ($C >=1) {
					for ($iii=1 ; $iii <= $C ; $iii++ ) { 
					 	echo aNewLine;
					 } 
				} else {
					echo ", ";
				};
		};
	};
	function EchoAnswer($A, $B, $C) {
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
			if ($C==1) {
					echo aNewLine;
				} else {
					echo ", ";
				};
		};
	};

//  Main

	// Open Files
	$InPutFileHandle = fopen(InputFilePath,'r') or die ("Unable to open Input file!");
	$OutPutFileHandle = fopen(OutputFilePath,'w') or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
		fseek($OutPutFileHandle, 0);

	//	Get first Record - The first record contains the Number of Test Cases
	//	in the file to process
	//  Use intval to strip off trailing "\n"
	$Testcases = intval(fgets($InPutFileHandle));
	EchoBug("Testcases", $Testcases, 1);
	
	// Do any analysis needed of the first line here.
	
	// walk thru the test cases one by one
	for ($iii = 1 ; $iii <= $Testcases ; $iii++) { 

		// Initialize Variables
		// $FinalAnswer needs to be reset each time thru the loop
			$FinalAnswer = 0;

		//	Read a Record

			$d_Digits = fgets($InPutFileHandle);
			EchoBug("GET d_Digits", $d_Digits, 1);

		// Strip the Newline \n
			$d_Digits = preg_replace("/[^a-zA-Z0-9]/", "", $d_Digits);
			EchoBug("STRIP d_Digits", $d_Digits, 1);

		// Convert to an array of chars
			$d_DigitsArray = str_split($d_Digits);
			EchoBug("ARRAY d_DigitsArray", $d_DigitsArray, 1);
		
		// Unique it 
			$d_DigitsArray = array_unique($d_DigitsArray);
			EchoBug("ARRAY d_DigitsArray", $d_DigitsArray, 1);
			
		// Do the Maths
		// For Each item in the array, check to see if it divides evenly (mod == 0) into the original number.
			$ArrayLength = sizeof($d_DigitsArray);
			foreach ($d_DigitsArray as $value) {
				if ($value != 0) {
					EchoBug("$value", $value, 1);
					if (($d_Digits % $value) == 0) { 
						$FinalAnswer += 1;
					};
				};
			}; // end ForEach

		// Write answer for each line of input
			fwrite($OutPutFileHandle, $FinalAnswer);
			fwrite($OutPutFileHandle, "\n");
			EchoAnswer("FinalAnswer", $FinalAnswer, 0);

	}; 	// End For $TestCases

		
	// Close Files
		fclose($InPutFileHandle);
		fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
