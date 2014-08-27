<?php

	$InputFilePath = 'php://stdin';
	$OutputFilePath = 'php://stdout';

//  Main
	// Open Input File
		$InputFileHandle = fopen($InputFilePath,'r') or die ("Unable to open the Input file!");

	// Open the output file 
		$OutputFileHandle = fopen($OutputFilePath, 'w') or die ("Unable to open the Output file!");
;

	// Get the first input record (line), it contains the number of records(lines) to process
	// Convert it from a string to an Integer to insure the integrity of the loop counter
	// PHP can execute for loops with real/floating point numbers, this can cause undesireable side effects
		$NumRecordsToCheck = intval(fgets($InputFileHandle));

// Main Loop
	// Process each record (line) in a for loop
		for ($iii = 1 ; $iii <= $NumRecordsToCheck ; $iii++) {
			
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
					if (($value%2) == 1) { 		// detects whether a number is odd or even
						$OddNumbers++; 			// If Odd, increment the OddNumber Counter
					};
				};

			// Normally we would open the file outside of the "for" loop, but the instructions call for 
			// a single string of 3 chars (and does not specify a linefeed)
			// So we are opening and closing the file each time.
			// Opinion: This is not ideal

			// Open the output file 
			// $OutputFileHandle = fopen($OutputFilePath, 'w');

			// If the Odd Numbered elements are greater than one, then it is not a Palindrome
			if ($OddNumbers > 1) {
				$Answer = "NO";
				fwrite($OutputFileHandle, $Answer); // uses File Handle
				//fwrite($OutputFileHandle, $Answer, 2); // uses File Handle, char limits
				//file_put_contents('php://stdout', "NO"); // Uses File Name
				//echo "NO";	// Uses stdout
			} else {
				$Answer = "YES";
				fwrite($OutputFileHandle, $Answer); 		// uses File Handle
				//fwrite($OutputFileHandle, $Answer, 3); 	// uses File Handle, char limits
				//file_put_contents('php://stdout', "YES"); // Uses File Name
				//echo "YES";								// Uses stdout
			};
			// Close the Output File
			// Again, this is not the ideal location
				// fclose($OutputFileHandle);
		}; 	// End For $NumRecordsToCheck	
	
// Close Input File
	fclose($InputFileHandle);
// Normally we would close the Output file here
	fclose($OutputFileHandle);
	
// End Main

?>
