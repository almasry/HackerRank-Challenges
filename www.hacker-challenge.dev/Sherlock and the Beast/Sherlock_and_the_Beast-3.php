
<?php

//	Sherlock and the Beast
//	Submission by Peter S. Parker
//	Date: 2014-08-18 
//	Written 2014-08-16 -> 18 in PHP
//	http://github.com/petersparker
//	License: Share and Share Alike, but under no circumstances may this be presented as your own work
//	especialy to any Hacker Challenges

// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
// The Optimal Case would be if (($N MOD 3) == 0) then we have found the quickest way for this $N

// Get T (first record, the number of tests in the file)

// Loop thru T numbers in file / array, starting with record (2 -> T+1)

// Declare Globals

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
		$DecentNumber = -1;
		return $DecentNumber;
		}	//	End Else
}

function AssembleString($N5, $N3){

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

	// Declare Array and fill Variables

	$FileArray = array(20,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);	

	//	OpenLocalFile
	$SFile = fopen("php://stdin","r") or die ("Unable to open file!");

	// Get first Record - The first record is the Number of records in the input file
	$T = fgets($SFile);
	$FileArray[0] = $T; 

	$ppp=1;
	while(!feof($SFile)) {
		$FileArray[$ppp] = fgets($SFile);
		$ppp+=1;
	};	//End While

	// Close File
	fclose($SFile);

	// Open a file for writing
	$OutPutHandle = fopen("php://stdout","w") or die ("Unable to open file!");
	
	$Linefeed = "\n";
	
	for ($iii=1;$iii<=$T;$iii++){
	$ToPrint = (GeneralCase($FileArray[$iii]));
	print($ToPrint);
	print($Linefeed);

	};	//End For
	// Close the file for writing

	$OutPutHandle = fclose($OutPutHandle);

// End Main

?>
