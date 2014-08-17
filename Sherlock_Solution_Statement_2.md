###Sherlock and the Beast - Solution Explanation
------------------------------------------------



We are trying to find the largest number with N Digits, where 1 <= N <= 100,000. 

- Therefore N is between 2...99,999 inclusive.

Each digit can be a 3 or a five.

- Since 5's are larger than 3's, we sill want to stack the 5's in first
- i.e. 55555 333 will always be greater than 333 55555

The solution maps to an equation of N = 5x + 3y

We are being given up to 20 numbers 'T' 'to Test, once we have tested all of them, we must sort thru them and pick the largest.

Pseudo Code:
	
	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	
	// 3 x 5 = 15 so if it's NOT divisible by 5 EVENLY we only have to back check 4 times, i.e. there would only be 12 each 3's trailing

	Get T (first record, the number of tests in the file)

	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	
	// In PHP arrays start with [0], so records [1] -> [T])

	// Lets do this with MODULO Arithmetic (Divide and get remainders)
	
		If (($N % 3) == 0 ) // Nailed it! (This will succeed 1 out of 3 times)
		return / break;
		
		else
		
		$xxx=$N/3;
		
		// Loop x
		
		for (;$xxx>=0;$xxx--)	{
		
			// Loop y
			
			$yyy=;
				for ($yyy	;;){
					if ($xxx*3 + $yyy*5) = $n
						then
							return success;
				};
		};
		
		// both x and y loops searched, no answer found
		
			return fail;
		
		
		
	// Assemble the answer

	Function Assemble();
	{
		$Fives = "";
		For ($iii=$Max5s; $iii<=$Max5s; $iii++)		{
			$Fives = $Fives + "555";
		};
		
		$Threes = "";
		For ($iii=$Max3s; $iii<=$Max3s; $iii++)		{
			$Threes = $Threes + "33333";
		};
		$OutArray[TTT] = $Fives + $Threes;
		echo "$Outarray <br>";
	};
	---
	
	If $Fail = False 
			then
		
	
	sort array of answers, the highest one (last record) will be the answer
	
	
