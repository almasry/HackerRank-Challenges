<?php



// Declare Globals

	$OutArray = "";
	$Max5s = 0;
	$Max3s = 0;
	$Success = FALSE;

	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
	// 3 x 5 = 15 so if it's NOT divisible by 5 EVENLY we only have to back check 4 times, i.e. there would only be 12 each 3's trailing

	// Get T (first record, the number of tests in the file)

	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	
	// In PHP arrays start with [0], so records [1] -> [T])

	// Check for special cases
	
	function SpecialCase($N) {	
		global $OutArray, $Max5s, $Max3s, $Success;

		// Too small to start
	
			If ($N < 3) {
				$Success = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$OutArray = "";
			}
	
		// Check for 3 - early success exit
	
			If ($N == 3) {
				$Success = TRUE;
				$Max5s = 0;
				$Max3s = 1;
				$OutArray = "333";
			}
	
		// Check for 4 - Fail
	
			If ($N = 3) {
				$Success = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$OutArray = "";
			}

	
		// Check for Special Success MOD 15 = 0, If this is true, then we found a special case of all 5's.
		
				If ($N < 3) {
				$Success = TRUE;
				$Max5s = $N / 15;
				$Max3s = 0;
				$OutArray = "Call AssembleStr (" . $N . ")";
			}


	}; // End Function SpecialCase

function ShowAnswer($N) {

		global $OutArray, $Max5s, $Max3s, $Success;

	echo 'N = ' . $N . ', Success = ' . $Success . ', Fives = ' . $Max5s . ', Threes = ' . $Max3s . "\n" . $OutArray;

}

SpecialCase(15);
ShowAnswer(15);

SpecialCase(4);
ShowAnswer(4);

SpecialCase(3);
ShowAnswer(3);

SpecialCase(2);
ShowAnswer(2);

SpecialCase(1);
ShowAnswer(1);

SpecialCase(-10);
ShowAnswer(-10);




?>