<?php

	$InputFilePath = 'php://stdin';
	$OutputFilePath = 'php://stdout';

//  Main
	// Open Input File
	$InPutFileHandle = fopen($InputFilePath,'r') or die ("Unable to open Input file!");
	$NumRecordsToCheck = intval(fgets($InPutFileHandle));

	for ($iii = 1 ; $iii <= $NumRecordsToCheck ; $iii++) {
		$PalinDrome = fgets($InPutFileHandle);

        // Clean up the input - Strip whitespace chars
		$PalinDrome = preg_replace("/[^a-zA-Z]/", "", $PalinDrome);

		// Sort & Count Chars in the String;

		$PalinDromeArray = count_chars($PalinDrome,1);

        // Evaluate the Array to find oout how many odd numbers are in it
		$OddNumbers=0;

		foreach ($PalinDromeArray as $value) {
			if (($value%2) == 1) {
				$OddNumbers++;
			};
		};

        // If the Odd Numbered elements are greater than one, then it is not a Palindrome
		if ($OddNumbers > 1) {
			$Answer = "NO";
			echo "NO";	
		} else {
			$Answer = "YES";
			echo "YES";	
		};
	}; 	// End For $NumRecordsToCheck	
	// Close Files
	fclose($InPutFileHandle);
// End Main

?>

