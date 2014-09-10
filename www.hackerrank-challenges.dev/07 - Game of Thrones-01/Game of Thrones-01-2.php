
<?php

//	07 - HGame of Thrones-01


// Given to me:

//	$T - (TestCases) = Number of Records

//	$K - (PalinDrome) = Number of Cuts.

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
		define("TestDebug", "ON", TRUE); // Default is "ON", change to anything else for "OFF"
		define("FilesAreLocal", "LOCAL", TRUE);  // Default is "LOCAL", change to anything else for "Remote"
		define("ShowOutput", "YES", TRUE);// Default is "YES", change to anything else for "NO"
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
	$PalinDrome = 0;

// functions go here


//  Main

	// Open a file for writing
//	$OutPutFileHandle = fopen($OutputFilePath,'w') or die ("Unable to open Output file!");

	// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
//	fseek($OutPutFileHandle, 0);

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

		// Sort & Count Chars in the String;

		$PalinDromeArray = count_chars($PalinDrome,1);
		if (TestDebug == "ON") {
			var_dump($PalinDromeArray);
		};

		// Evaluate the Array to find oout how many odd numbers are in it
		
		$OddNumbers=0;

		foreach ($PalinDromeArray as $value) {
			if (($value%2) == 1) {
				$OddNumbers++;
			};
		};

		if ($OddNumbers > 1) {
			$Answer = "NO";	
			// file_put_contents("php:/stdout","NO");
			file_put_contents($OutputFilePath, "NO");
			// echo "NO";
		} else {
			$Answer = "YES";
        	file_put_contents($OutputFilePath, "YES");
		    // file_put_contents("php:/stdout","YES");
		    // echo "YES";
		};

		if (TestDebug == "ON") {
			echo aNewLine . "Is a PalinDrome = " . $Answer . aNewLine;
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
		fclose($OutPutFileHandle);
		};

	}; 	// End For $NumRecordsToCheck	

	// Close Files
	fclose($InPutFileHandle);
	// fclose($OutPutFileHandle);

// End Main


?>

