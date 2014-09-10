<?php

// functions go here

	function OpenTheOutPutFile() {
		$OutPutFileHandle = fopen(OutputFilePath,'w') or die ("Unable to open Output file!");
		// Reset the Output File to the Beginning, else an extra Linefeed SOMETIMES gets injected.
			//	fseek($OutPutFileHandle, 0);
		return $OutPutFileHandle;
	};	//	End Function OpenTheOutPutFile

	function OpenTheInPutFile() {
		$InPutFileHandle = fopen(InputFilePath,'w') or die ("Unable to open Input file!");
		return $InPutFileHandle;
	};	// End Function OpenTheInPutFile

	function EchoBug($A="", $B, $C=1) {
		// $A is the name of the variable
		// $B is the variable or array variable
		// $C is a boolean: 0 (Zero) for FALSE, 1 for (True) - TRUE to write a newline

		if (TestDebug == "ON") {
			
			if (is_array($B) == TRUE) {
				var_dump($B);
			} else {
				echo "$A = '" . $B . "' ";
			};

			echo ($C=1 ? aNewLine : ", ");

			if ($C="1") {
					echo aNewLine;
				} else {
					echo ", ";
				};
		};
	};

	function UsersTime() {
		date_default_timezone_set("America/Los_Angeles");
		echo "The time is " . date('Y-m-d H:i:s') . aNewLine;	
	};

	function GetAnInputLine() {
		$InputString = fgets($InPutFileHandle);
	};

	function BreakDownInput() {
		// Chop input string into an array and strip unwanted chars
		// $InputArray = explode(" ", $InputString);
		// explode(delimiter, string)
	};

	function StripWhiteSpace() {
			// Clean up the input - Strip whitespace chars
			$LineToProcess = preg_replace("/[^a-zA-Z0-9]/", "", $LineToProcess);
	};

?>

