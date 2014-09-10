<?php

//	Hackerank File Handlers
// 	HackerRank seems to have certain characteristics about their files. 
//  One is that they use the first entry to set up information about what is contained in the rest of the file.
// 	Rather than write statis arrays for each program, this program is designed to dynamically determine what needs to be buit on the fly, and build it.
// 	It will use some constants 
//  



// Declare Globals

	// When TestDebug is TRUE THEN 
		// DO testing with local files, 
		// Turn ON debugging messages
	// ELSE FALSE 
		// use HackerRank file locations
		// Turn OFF debuggin messages
	
	$GLOBALS['TestDebug'] = TRUE;

	// Set File Locations & Paths
	if ($TestDebug = TRUE) {
		$GLOBALS['$InputFilePath'] = '';
		$GLOBALS['$OutputFilePath'] = '';
	} else {
		$GLOBALS['$InputFilePath'] = 'php://stdin';
		$GLOBALS['$OutputFilePath'] = 'php://stdout';
	};

	if ($TestDebug = TRUE) {
		echo "Debug ON";
	};

	$GLOBALS['variable'] = something;

	// Set up the Array
	$_2_Dimensional_Array = (0,0; 1,1);

function WalkThisArray($ArrayToWalk) {

	// Set Horizontal Array Index
	$iii = 0;

	// Arrays may not be even in size, So use a while loop
	// and test for the end of each line as you go

	//While != End of String
	While () {
		$jjj = 0;
		// get c
		// reset string counter
		$aaa = "";
		// Inner Loop
			While ($StringToParse != EOString) {
				if (GetnextChar) != $Delimiter {
					$aaa = $aaa . $NextChar;
				};
			};
		// put into array element [$iii]
		$ArrayLine[$iii] = $aaa;	
		// increment array counter
		$iii++;
	};
	return;
};

function GetInputFileAndBuild_2D_Array($A) {
	$GLOBALS['variable'] = something;

	// Open Input File
	$InputFileHandle = fopen("php://stdin","r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$FirstLine = fgets($InputFileHandle);
	
	$InputArray[0] = explode(" ", $FirstLine); 

	// Do any analysis needed of the first line here. Often times HackerRank
	// wants you to take a value on the first line and use it for the number of records to process.
	// ## Add to this to Respect the given variable as well as EOF ## //

	// Get the rest of the records	
	// Use a counter for the Array indexing
	$ppp=1; 

	// Make this work both ways - EOF and # of Records as per step 1

	while(!feof($InputFileHandle)) {
		$NextLine = fgets($InputFileHandle);
		$InputArray[$ppp] = explode(" ", $NextLine); 
		$ppp+=1;
	};	//End While

	// Close File
	fclose($InputFileHandle);

	return;
};



function WorkHorse() {

//	Main Loop - This is where the work gets done



};

function WriteOutputFile($b) {
	$GLOBALS['variable'] = something;
	// Open a file for writing
	$OutPutFileHandle = fopen("php://stdout","w") or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.

	// Call data handler HERE

	fseek($OutPutFileHandle, 0);
	// Close the file for writing
	$OutPutFileHandle = fclose($OutPutFileHandle);
	return;
};

//  Main

	// Declare Array to hold up to 20 values for the problem

	// Open Files, Get Data, Biuild Arrays
	GetInputFileAndBuildArrays($A);

	// Do the Work
	WorkHorse();	

	// Write the Answers to the Output File
	WriteOutputFile($b);

// End Main

?>
