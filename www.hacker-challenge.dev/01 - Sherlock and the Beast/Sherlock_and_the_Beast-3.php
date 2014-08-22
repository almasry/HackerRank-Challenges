
<?php

//	Sherlock and the Beast
//	Submission by Peter S. Parker
//	Date: 2014-08-18 
//	Written 2014-08-16 -> 18 in PHP
//	http://github.com/petersparker/
//	License: Share and Share Alike, but under no circumstances may this be presented as your own work
//	especialy to any Hacker Challenges
//
//
//  This program is my answer to the Hacker Challenge "Sherlock and the Beast"
//  The full details of this Hacker Challenge are at:
//
// 		https://www.hackerrank.com/contests/sep13/challenges/sherlock-and-the-beast
//
//  Notes to the approach:
//
//  The General Case is solved by looping thru to find the largest valued combination of 3x + 5y = N
//
//  An Impirical inspection of the data set shows that there is a solution for all cases larger than x + y
//  i.e, all cases wherein the number is (3 + 5) = 8 or larger.
//
//  Be Greedy, get as many 5's as you can up front. That will give you the largest permutation of the number.
//  There is a Special Case when the input number is evenly divisible by 3.
//    (($N MOD 3) == 0) tests for this nicely. 
//    This will occur 1 out of every 3 cases, i.e, any number divisible by 3.
//    No looping will be required, Just divide by 3 and send the answer back.  
// 
//  Get T (first record, the number of tests in the file)
//  Loop thru T numbers in file / array, starting with record (2 -> T+1)
// 

//  BUGS: As of 2014-08-18 Bugs are resolved
//

function GeneralCase($N) {
		
		//	Special Case: If MOD 3 = 0; THEN we Nailed it! (This will succeed 1 out of 3 times) 
		If (($N % 3) == 0 ) {
			$Max5s = $N/3;
			$Max3s = 0;
			$DecentNumber = AssembleString($Max5s, $Max3s);
			return $DecentNumber;
		} else {

		//	General Case - We loop thru the possibilities of ($xxx * 3) + ($yyyyy * 5) = $N
		//	$xxx is the 3 digit number "555" and $yyyyy is the 5 digit number "33333"

		//	Outer Loop $xxx	

		$xxx=round($N/3+1);		//	Limit of 3 chunked "555"s

		for (;$xxx>=0;$xxx--)	{
			// Inner Loop $yyyyy
			$yyyyy=round($N/5+1);		//	Limit of 5 chunked "33333"s
				for (;$yyyyy>=0;$yyyyy--){
	
					if (($xxx * 3) + ($yyyyy * 5) == $N) {
						$Max5s = $xxx;
						$Max3s = $yyyyy;
						$DecentNumber = AssembleString($Max5s, $Max3s);
						return $DecentNumber;
					};	// End If
				};	//	End $yyyyy Loop
			};	//	End $xxx Loop
		
		// both x and y loops searched, no answer found  - return FAIL as a -1
		$DecentNumber = '-1';
		return $DecentNumber;
		}	//	End Else
}


function AssembleString($N5, $N3){

	// This procedure constructs the string data.
	// The string data can be very large, up to a max of 100,000 Chars.

	$Fives = "";
	for ($iii=1; $iii<=$N5; $iii++)		{
		$Fives = $Fives . "555";
	};
	$Threes = "";
	for ($iii=1; $iii<=$N3; $iii++)		{
		$Threes = $Threes . "33333";
	};
	$DecentNumber = $Fives . $Threes;
	return $DecentNumber;
};

//  Main

	// By the Contest Parameters, 1 <= $T <= 20
	// Therefore we need an array to hold up to 20 values, and $T. 
	// Declare Array to hold up to 20 values for the problem
	$FileArray = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);	

	// Open Input File
	$SFile = fopen("php://stdin","r") or die ("Unable to open Input file!");

	// Get first Record - The first record is the Number of records in the file to process
	$T = fgets($SFile);
	$FileArray[0] = $T; 

	// Get the rest of the records
	$ppp=1;
	while(!feof($SFile)) {
		$FileArray[$ppp] = fgets($SFile);
		$ppp+=1;
	};	//End While

	// Close File
	fclose($SFile);

	// Open a file for writing
	$OutPutHandle = fopen("php://stdout","w") or die ("Unable to open Output file!");
	// Reset the Output File to the Beginning, else an extra Linefeed gets injected.
	fseek($OutPutHandle, 0);
	
	// Main processing Loop, this is where we loop thru the records and solve each one
	for ($iii=1;$iii<=$T;$iii++){
		$ToPrint = (GeneralCase($FileArray[$iii])) . "\n";
		fwrite($OutPutHandle, $ToPrint);
	};	//End For

	// Close the file for writing
	$OutPutHandle = fclose($OutPutHandle);

// End Main

?>
