###Sherlock and the Beast - Solution Explanation
------------------------------------------------



We are trying to find the largest number with N Digits, where 1 <= N <= 100,000. 

- Therefore N is between 2...99,999 inclusive.

Each digit can be a 3 or a five.

- Since 5's are larger than 3's, we sill want to stack the 5's in first
- i.e. 55555333 will always be greater than 33355555

The solution maps to an equation of N = 5x + 3y

We are being given up to 20 numbers 'T' 'to Test, once we have tested all of them, we must sort thru them and pick the largest.

Pseudo Code:
	
	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
	// 3 x 5 = 15 so if it's NOT divisible by 5 EVENLY we only have to back check 4 times, i.e. there would only be 12 each 3's trailing

	Get T (first record, the number of tests in the file)

	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	
	// In PHP arrays start with [0], so records [1] -> [T])

	// Check for special cases
	
	function SpecialCase();
	{	
		// Too small to start
	
			If N < 3 exit - return: $Success = FALSE, $Max5s = 0, $Max3s = 0;
	
		// Check for 3 - early success exit
	
			If N == 3 Return: $Success = TRUE, $Max5s = 0, $Max3s = 1;
	
		// Check for 4 - Fail
	
			If N == 4 Return $Success = FALSE, $Max5s = 0, $Max3s = 0;
	
		// Check for Special Success MOD 15 = 0, If this is true, then we found a special case of all 5's.
		
			If N Mod 15 Return $Success = TRUE, $Max5s = N / 15, $Max3s = 0;
	}; // End Function SpecialCase
		
		
	// General Case
	
	Function GeneralCase ();
	{
		If N >= 5 then [Look for 5's]
			
			$Max5s = Integer( N / 5 )
			
			$Remainder = N Mod 5
			
			If $Remainder != 0
			
				Then (look for threes)
				
					If $Remainder mod 3 = 0
						
						Then 
							$Max3s = $Remainder / 3; 
							Return $Success = TRUE, $Max5s, $Max3s;
						Else 
							Return $Success = FALSE, $Max5s, $Max3s;
	};						
							

							
							
							//Try a lesser Number of 5's
							$Max5s -= $Max5s; // Decrement $Max5s
					
			
	
	// Assemble the answer

	Function Assemble();
	{
		$Fives = "";
		For ($iii=$Max5s; $iii<=$Max5s; $iii++)		{
			$Fives = $Fives + "55555";
		};
		
		$Threes = "";
		For ($iii=$Max3s; $iii<=$Max3s; $iii++)		{
			$Threes = $Threes + "55555";
		};
		$OutArray[TTT] = $Fives + $Threes;
		echo "$Outarray <br>";
	};
	---
	
	If $Fail = False 
			then
		
	
	sort array of answers, the highest one (last record) will be the answer
	
	
