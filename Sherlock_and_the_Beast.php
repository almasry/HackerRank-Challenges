<?php


// Declare Globals

	$OutArray = "";
	$Max5s = 0;
	$Max3s = 0;
	$Success = FALSE;

	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
	// The Optimal Case would be if (($N MOD 5) == 0) then we have found the quickest way for this $N

	// 3 x 5 = 15 so if it's NOT divisible by 5 EVENLY we only have to back check a max of  4 times, i.e. there would only be 12 each 3's trailing

	// Get T (first record, the number of tests in the file)

	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	
	// In PHP arrays start with [0], so records [1] -> [T])

	// Check for special cases
	
	function SpecialCase($N) {	
		global $OutArray, $Max5s, $Max3s, $Success;

		switch ($N) {

		// Bizzare Zero Anomaly - in a for loop, "0" fails to be less than any positive integer, and matches 3. Lets just trap it out.
			// This is NOT detecting Zero!
			Case ($N == 0):
				$Success = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$OutArray = "Special Case - ZERO - FAIL";
				break;

		// Too small to start

			Case ($N <= 2):
				$Success = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$OutArray = "Special Case - Less than 3 digits - FAIL";
				break;
	
		// Check for 3 - early success exit

			Case ($N == 3):
				$Success = TRUE;
				$Max5s = 0;
				$Max3s = 1;
				$OutArray = "Special Case Three Found - 333";
				break;
	
		// Check for 4 - Fail
	
			Case ($N == 4):
				$Success = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$OutArray = "Special Case = Equals 4 - FAIL";
				break;
	
		// Check for Special Success MOD 5 = 0, If this is true, then we found a special case of all 5's.
		
			Case (($N % 5) == 0):
				$Success = TRUE;
				$Max5s = $N / 5;
				$Max3s = 0;
				$OutArray = "Call AssembleString (Max5s = " . $Max5s . ", Max3s = 0)" . "\n";
				break;

			default:
				
				$Success = NULL;
				$OutArray = "Not a Special Case - Walk it";
		//		GeneralCase ($N)
				break;
		}

	}; // End Function SpecialCase

function ShowAnswer($N) {

	global $OutArray, $Max5s, $Max3s, $Success;

	$SuccessAsAString = ($Success) ? 'Yes' : 'No';

	echo 'N = ' . $N . ', Success = ' . $SuccessAsAString . ', Fives = ' . $Max5s . ', Threes = ' . $Max3s . "\n" . $OutArray . "\n\n";

}
	function AssembleStr($N5, $N3){
		global $OutArray;

		$Fives = "";
		For ($iii=1; $iii<=$N5; $iii++)		{
			$Fives = $Fives . "55555" . " ";
		};
		
		$Threes = "";
		For ($iii=1; $iii<=$N3; $iii++)		{
			$Threes = $Threes . "333" . " ";
		};
		$OutArray = $Fives . $Threes;
		echo "$OutArray <br>" . "\n";
	};

for ($iii=1;$iii<=100;$iii++){

	SpecialCase($iii);
	ShowAnswer($iii);

};


?>