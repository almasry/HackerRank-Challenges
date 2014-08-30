<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>09 - Chocolate Feast PHP</title> 
</head>
<body>
<h2>09 - Chocolate Feast PHP</h2>
<?php

//	09 - Chocolate Feast PHP

// Given to me:

//	$T - (TestCases) = Number of Records

//	$N - Money In Pocket 
//	$C - ChocPrice - The Price of each Chocolate
//	$M - WrapperDiscount
 

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
	$NumRecordsToCheck = intval(fgets($InPutFileHandle));

	EchoBug("NumRecordsToCheck", $NumRecordsToCheck, 1);

	// Do any analysis needed of the first line here.
	
	// Make this work both ways - EOF and # of Records as per step 1
	// ## Add to this to Respect the given variable as well as EOF ## //
	for ($iii = 1 ; $iii <= $NumRecordsToCheck ; $iii++) { 

		//	Read a Reocrd
		$LineToProcess = fgets($InPutFileHandle);
		$InputArray = explode(" ", $LineToProcess);

		//	Break it down into fields
			$N_MoneyToStart = $InputArray[0];	//	Money on Hand
			EchoBug("N_MoneyToStart", $N_MoneyToStart, 0);
			$C_ChocCost = $InputArray[1];	//	Cost per Chocolate
			EchoBug("C_ChocCost", $C_ChocCost, 0);
			// intval the last array item to get rid of the trailing "\n"
			$M_Wrappers_Reqd = intval($InputArray[2]);	//	Wrappers needed to get another piece of chocolate
			EchoBug("M_Wrappers_Reqd", $M_Wrappers_Reqd, 0);

		//	Do the wrappers carry over from trip to trip? 
		//	Looks like NO.

		//	Buy Chocolates with money on hand
			$Total_Chockos_On_Hand = intval($N_MoneyToStart / $C_ChocCost);
			EchoBug("Total_Chockos_On_Hand", $Total_Chockos_On_Hand, 0);
			$Wrappers_On_Hand = 0;
			EchoBug("Wrappers_On_Hand", $Wrappers_On_Hand, 1);
		//	Set up While Loop
			$New_Chockos = $Total_Chockos_On_Hand;
			EchoBug("New_Chockos", $New_Chockos, 1);

		//  Example: 11 Chockos to start with, 3 Wrappers required for more
				$Set_While_Loop_Ran = FALSE;
		while (($New_Chockos + $Wrappers_On_Hand) >= $M_Wrappers_Reqd) {
			//	We have enough to get more, so trade in Chockos and Wrappers for more
			
			//	If this fails the first time through, Use the $Total_Chockos_On_Hand
			//	as already set up above when we bought the first batch of Chockos
				$Set_While_Loop_Ran = true;
			// Convert New_Chockos on Hand to Wrappers and add to existing Wrappers
				$Wrappers_On_Hand += $New_Chockos;
				EchoBug("While - 1: Wrappers_On_Hand", $Wrappers_On_Hand, 1);
			// Get more Chockos
				$New_Chockos = intval ($Wrappers_On_Hand / $M_Wrappers_Reqd);
				EchoBug("While: New_Chockos", $New_Chockos, 1);

			// Keep Remaining Wrappers (MOD $M_Wrappers_Reqd)
				$Wrappers_On_Hand = ($Wrappers_On_Hand % $M_Wrappers_Reqd);
				EchoBug("While: Remaining Wrappers_On_Hand", $Wrappers_On_Hand, 1);

			// Keep a running total of all Chockos Bought & Traded
				$Total_Chockos_On_Hand += $New_Chockos; 
				EchoBug("While: Total_Chockos_On_Hand", $Total_Chockos_On_Hand, 0);

			 }; //	End While

		//	Write Final Answer

		$FinalAnswer = $Total_Chockos_On_Hand;
		if (ShowOutput == "YES") echo "<strong><em>";
		if (ShowOutput == "YES") echo ($Set_While_Loop_Ran ? "While Loop Ran" . aNewLine:"While Loop SKIPPED" . aNewLine);
		EchoAnswer("fwrite Total Chocolates", $FinalAnswer, 1);
		if (ShowOutput == "YES") echo "</strong></em>";
		fwrite($OutPutFileHandle, $FinalAnswer);
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
