<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Untitled</title>
	<meta name="generator" content="BBEdit 10.5">
</head>
<body>


<?php

//	Sherlock and the Beast
//	Submission by Peter S. Parker
//	Date: 2014-08-17 
//	Written 2014-08-17 & 18 in PHP
//	http://github.com/petersparker
//	License: Share and Share Alike, but under no circumstances may this be presented as your own work
//	especialay to any Hacker Challenges



// Declare Globals

	$DecentNumber = "";
	$Max5s = 0;
	$Max3s = 0;
	$SolutionFound = FALSE;

	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
	// The Optimal Case would be if (($N MOD 3) == 0) then we have found the quickest way for this $N

	// Get T (first record, the number of tests in the file)

	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	

function GeneralCase($N) {
	global $DecentNumber, $Max5s, $Max3s, $SolutionFound;

//	Special Case: If MOD 3 = 0; THEN we Nailed it! (This will succeed 1 out of 3 times) 

		If (($N % 3) == 0 ) {
			$SolutionFound = TRUE;
			$Max5s = $N/3;
			$Max3s = 0;
			$DecentNumber = AssembleString($Max5s, $Max3s);
			return;
		} else {

//	General Case - We loop thru the possibilities of ($xxx * 3) + ($yyyyy * 5) = $N
//	$xxx is the 3 digit number "555" and $yyyyy is the 5 digit number "33333"

		//	Outer Loop $xxx	

		$xxx=round($N/3+1);		//	Limit of 3 chunked "555"s

		for (;$xxx>=0;$xxx--)	{
			// Inner Loop $yyyyy
			$yyyyy=round($N/5+1);		//	Limit of 5 chunked "33333"s
				for (;$yyyyy>=0;$yyyyy--){
		//			echo "xxx = " . $xxx . ", yyyyy = " . $yyyyy . "\n";	//	For testing
					if (($xxx * 3) + ($yyyyy * 5) == $N) {
						$SolutionFound = TRUE;
						$Max5s = $xxx;
						$Max3s = $yyyyy;
						$DecentNumber = AssembleString($Max5s, $Max3s);
						return;
					};	// End If
				};	//	End $yyyyy Loop
			};	//	End $xxx Loop
		
		// both x and y loops searched, no answer found
		echo "-1 Fail\n";
		$SolutionFound = FALSE;  //No Longer Used
		//	return fail;
		}	//	End Else
}

function AssembleString($N5, $N3){
	global $N, $DecentNumber;
	$Fives = "";
	For ($iii=1; $iii<=$N5; $iii++)		{
		$Fives = $Fives . "555" . " ";
	};
	$Threes = "";
	For ($iii=1; $iii<=$N3; $iii++)		{
		$Threes = $Threes . "33333" . " ";
	};
	$DecentNumber = $Fives . $Threes;
	echo "$DecentNumber \n";
};

//  Main

function OpenLocalFile() {
	$SherlockFile = fopen("../Sherlock and the Beast/Sherlock-Test-Data.txt", "r") or die("Unable to open file!");
	echo fread($SherlockFile,filesize("../Sherlock and the Beast/Sherlock-Test-Data.txt"));

//	while(!feof($SherlockFile)) {
//		echo fgets($SherlockFile) . "<br>";
//	}; //	End While
	fclose($SherlockFile);
};

//	$T = GetFirstRecord; // The first record is the Number of records in the input file
//	$T = 999;							// Use ($iii<=$T) for Testing all configs

//for ($iii=1;$iii<=$T;$iii++){
//	echo "Line " . $iii . " = ";
//	$PotentialDecentNumber = $iii;				// Use $iii for Testing all configs
//	GeneralCase($iii);							// Use $iii for Testing all configs
//};	//End For

// End Main

?>

</body>
</html>

