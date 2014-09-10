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
		define("ShowOutput", "ON", TRUE);	// "YES" Just Show Answers
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

	function EchoBug($A="", $B, $C=1, $D=0) {
		// $A is the name of the variable
		// $B is the variable or array variable
		// $C is an integer for how many newlines to add for formatting / prettying up
		// $D is an optional force on (Show Answer)

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

		if (ShowOutput == "ON") {
			
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

	// Houston, We are go for Launch...

		EchoBug("Begin", "Blasting Off", 1);

	// xdebug_break();
	

	// Declare globals
		$StonesArray = NULL;
		$StonesArray = Array();
	
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

		//	Read three Records, convert to Integer to strip linefeeds "\n"

			$n_NumStones = intval(fgets($InPutFileHandle));
			EchoBug("n_NumStones", $n_NumStones, 0);

			$a_Diff = intval(fgets($InPutFileHandle));
			EchoBug("a_Diff", $a_Diff, 0);
			
			$b_Diff = intval(fgets($InPutFileHandle));
			EchoBug("b_Diff", $b_Diff, 1);

		// Do the Stepping Stone Steps
			$FirstStone = 0;

		//  Set up the loopWalker boundaries
			// The height of the array is 2 ^ (Stones - 1)
			$Maxjjj = pow(2,($n_NumStones - 1)); // Adjust for arrays starting with zero instead of one
			EchoBug("Maxjjj", $Maxjjj, 1);			
			// The Width of the array is the number of stones -1 to adjust for the fact that arrays start with zero
			$Maxkkk = $n_NumStones - 1; 
			EchoBug("Maxkkk", $Maxkkk, 1);			
			
			// Reset the width walker Array to empty
			$LastArray = NULL;
			$LastArray = array();
			EchoBug("LastArray", $LastArray, 1); // Should be empty

			for ($jjj=0; $jjj <= $Maxjjj; $jjj++) { 
				EchoBug("Outer Loop jjj", $jjj, 1);
				for ($kkk=0; $kkk<=$Maxkkk ; $kkk++) { 
						EchoBug("Coefficient of A (kkk)", $kkk, 1);
						EchoBug("Coefficient of B (n_NumStones - kkk)", ($n_NumStones - $kkk), 1);
						array_push($LastArray, ($a_Diff * $kkk) + ($b_Diff * ($Maxkkk - $kkk)));
						EchoBug("Last Array", $LastArray, 1);
				};	//	end for $kkk
				sort($LastArray);
				array_unique($LastArray);
				array_push($StonesArray, end($LastArray));
				EchoBug("Stones Array", $StonesArray, 1);
			};	//	end for $jjj
	}; 	// End For $TestCases

	//	Write Final Answer

// Dummy data for testing sort and unique
//		$StonesArray = $FinalAnswer;
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
