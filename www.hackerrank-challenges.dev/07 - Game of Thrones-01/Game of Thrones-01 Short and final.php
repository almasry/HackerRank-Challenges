<?php

// Define File i/o locations

$InputFilePath = 'php://stdin';
$OutputFilePath = 'php://stdout';

// Open Input File
	$InputFileHandle = fopen($InputFilePath,'r') or die ("Unable to open the Input file!");

// Open the output file 
	$OutputFileHandle = fopen($OutputFilePath, 'w') or die ("Unable to open the Output file!");
		
// Get the next record (line)
	$PalinDrome = fgets($InputFileHandle);

// Clean up the input - Strip any whitespace chars, including the trailing "\n"
	$PalinDrome = preg_replace("/[^a-zA-Z]/", "", $PalinDrome);

// Sort, Convert to Array & Count Identical Chars in the String;
	$PalinDromeArray = count_chars($PalinDrome,1);

// Reset the OddNumber Counter
	$OddNumbers=0;

// Evaluate the Array to find out how many odd numbers are in it
	foreach ($PalinDromeArray as $value) {
		if (($value%2) == 1) { 			// detects whether a number is odd or even
			$OddNumbers++; 				// If Odd, increment the OddNumber Counter
		};
	};

// If the Odd Numbered elements are greater than one, then it is not a Palindrome
	if ($OddNumbers > 1) {
		$Answer = "NO";
		fwrite($OutputFileHandle, $Answer); 	// uses File Handle
	} else {
		$Answer = "YES";
		fwrite($OutputFileHandle, $Answer); 	// uses File Handle
	};
// Close Input File
	fclose($InputFileHandle);
// Normally we would close the Output file here
	fclose($OutputFileHandle);
	
// End

?>
