
<?php

//	Hackerank File Handlers
// 	HackerRank seems to have certain characteristics about their files. 
//  One is that they use the first entry to set up information about what is contained in the rest of the file.
// 	Rather than write statis arrays for each program, this program is designed to dynamically determine what needs to be buit on the fly, and build it.
// 	It will use some constants 
//
//	Submission by Peter S. Parker
//	Date: 2014-08- 
//	Written 2014-08-18 -> 19 in PHP
//	http://github.com/petersparker/
//	License: Share and Share Alike, but under no circumstances may this be presented as your own work
//	especialy to any Hacker Challenges
//
//
//  This program is my answer to the Hacker Challenge "Utopian Tree"
//  The full details of this Hacker Challenge are at:
//
// 		https://www.hackerrank.com/challenges/utopian-tree
//
//  Notes to the approach:
//
// 
//
//  BUGS: 
//

function GetInputFileAndBuildArrays($A) {
	$GLOBALS['variable'] = something;

	// Open Input File
	$InputFileHandle = fopen("php://stdin","r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$TestCases = fgets($InputFileHandle);
	$InputArray[0] = $TestCases; 

	// Get the rest of the records
	// Redo this to Respect the given variable as well as EOF	
	$ppp=1; // Use a counter for the Array indexing

// Make this work both ways - EOF and # of Records as per step 1

	while(!feof($InputFileHandle)) {
		$InputArray[$ppp] = fgets($InputFileHandle);
		$ppp+=1;
	};	//End While

	// Close File
	fclose($InputFileHandle);

	return;
};

function WorkHorse() {

//	Main Loop - This is where the work gets done

};

function PutOutputFile($b) {
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

	// Write the Answers to the Otput File
	PutOutputFile($b);

// End Main

?>
