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
		define("TestDebug", "ON", TRUE);				//	Set to "ON" to turn on debugging messages, not a good idea when doing remote
		define("FilesAreLocal", "LOCAL", TRUE);			//	Set to "LOCAL" to use local files for testing
		define("ShowOutput", "YES", TRUE);				//	Set to "YES" to show fwrite output
	// Set File Locations & Paths
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

	function OpenTheOutPutFile() {
		$OutPutFileHandle = fopen(OutputFilePath,'w') or die ("Unable to open Output file!");
		// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
			//	fseek($OutPutFileHandle, 0);
		return $OutPutFileHandle;
	};	//	End Function OpenTheOutPutFile

	function OpenTheInPutFile() {
		$InPutFileHandle = fopen(InputFilePath,'w') or die ("Unable to open Input file!");
		return $InPutFileHandle;
	};	// End Function OpenTheInPutFile

	function DebugVerbosly($A="", $B=0, $C="FALSE") {
		// $1 is the name of the variable
		// $2 is the variable
		// $3 is a boolean: TRUE to write a newline
		if (TestDebug == "ON") {
			echo "$A = $B";
			if ($C="TRUE") {
				echo aNewLine;
			};
		};
	};

	function UsersTime() {
		date_default_timezone_set("America/Los_Angeles");
		echo "The time is " . date('Y-m-d H:i:s') . aNewLine;	
	};

//  Main

// Open a file for writing
	$OutPutFileHandle = fopen(OutputFilePath,'w') or die ("Unable to open Output file!");

// Open Input File
	$InPutFileHandle = fopen(InputFilePath,'r') or die ("Unable to open Input file!");
	
// Make this work both ways - EOF and # of Records as per step 1
// ## Add to this to Respect the given variable as well as EOF ## //

	$LowBoundary = intval(fgets($InPutFileHandle));
	$HighBoundary = intval(fgets($InPutFileHandle));
	
	if (TestDebug == "ON") {
		echo "Lower Limit = " . $LowBoundary . ", Higher Limit = " . $HighBoundary . aNewLine;
	};

	// Evaluate the XOR possibilities to find out how many odd numbers are in it
	
	// The lowest possible value of an XOR'd number is Zero, Set the Default below Zero 
	// to be able to see if it worked.
	
	$MaxXOR=-1;
	
	if (TestDebug == "ON") {
		echo "MaxXOR = " . $MaxXOR . aNewLine;
	};

	for ($iii=$LowBoundary ; $iii <= $HighBoundary ; $iii++) { 
		for ($jjj=$iii; $jjj <= $HighBoundary ; $jjj++) { 
			$Temp = $iii ^ $jjj;
			$MaxXOR = max($MaxXOR, $Temp);
			if (TestDebug == "ON") {
				echo '$iii = ' . $iii . ', $jjj = ' . $jjj . ", MaxXOR = " . $MaxXOR . aNewLine;
			};
		};
	};

	$Answer = $MaxXOR;

	fwrite($OutPutFileHandle, $Answer);
	fwrite($OutPutFileHandle, "\n");
	if (ShowOutput == "YES") {
		echo "fwrite = " . $Answer . aNewLine;
	};

// Close Files
	fclose($InPutFileHandle);
	fclose($OutPutFileHandle);

// End Main


?>

<h2>Done!</h2>

</body>
</html>
