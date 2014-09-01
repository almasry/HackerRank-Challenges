<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>10 - Manasa and Stones</title> 
</head>
<body>
<h2>10 - Manasa and Stones</h2>
<?php

//	10 - Manasa and Stones

// Given to me:

//	$t_Testcases - Number of Testcases
//	$n_NumStones - Total Number of Stones
//	$a-Diff - one integer of possible difference
//	$b_Diff - the other integer of possible difference
 

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
		define("TestDebug", "ON", TRUE);	// "ON" for TestDebug
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
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $Testcases ; $iii++) { 

		//	Read three Records

			$n_NumStones = intval(fgets($InPutFileHandle));
			EchoBug("n_NumStones", $n_NumStones, 0);

			$a_Diff = intval(fgets($InPutFileHandle));
			EchoBug("a_Diff", $a_Diff, 0);
			
			$b_Diff = intval(fgets($InPutFileHandle));
			EchoBug("b_Diff", $b_Diff, 1);

		// Do the Stepping Stone Steps
			$FirstStone = 0;
			$StonesArray = array(25, 20, 456, 43782,324,564,25, 20, 456, 43782,324,564,1,234,8,7546,212, "Dummy Data");
			
			for ($jjj=0; $jjj <= $n_NumStones; $jjj++) { 
				$Step
				for ($kkk=0; $kkk <=??? ; $kkk++) { 

				};	//	end for $kkk
				array_push($StonesArray, $kkk);
			};	//	end for $jjj
	}; 	// End For $TestCases

	//	Write Final Answer

		$StonesArray = array(25, 20, 456, 43782,324,564,25, 20, 456, 43782,324,564,1,234,8,7546,212);
		EchoBug("Stones Array", $StonesArray, 1);

		$StonesArray = array_unique($StonesArray);
		EchoBug("Final Answer", $StonesArray, 1);
		
		sort($StonesArray);
		EchoBug("Sorted Answer", $StonesArray, 1);
		
		$FinalAnswer = implode(" ", $StonesArray);

		if (ShowOutput == "YES") echo "<strong><em>";
		EchoAnswer("fwrite ", $FinalAnswer, 1);
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
