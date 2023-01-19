<?php

//Precondition: Numbers between 1 and 3999

function printNChars($char,$n) {
	for($i = 0; $i < $n; ++$i) {
		echo $char;
	}
}


function printRomanNumber($roman_numbers) {
	$prev_roman_number = '';
	foreach($roman_numbers as $roman_number => $value) {
		if($value > 0 && $value < 4) printNChars($roman_number,$value);
		else if($value == 4) echo $roman_number.$prev_roman_number; 
		$prev_roman_number = $roman_number;
	}
	echo ' ';
}

function printIntToRoman(int $number) {
	$roman_numbers = [
		'M' => 0,
		'D' => 0,
		'C' => 0,
		'L' => 0,
		'X' => 0,
		'V' => 0,
		'I' => 0
	];
	if(intdiv($number,1000) > 0) {
		$roman_numbers['M'] = intdiv($number,1000);
		$number %= 1000; 
	}
	if(intdiv($number,500) > 0) {
		$roman_numbers['D'] = intdiv($number,500);
		$number %= 500;
	}
	if(intdiv($number,100) > 0) {
		$roman_numbers['C'] = intdiv($number,100);
		$number %= 100;
	}
	if(intdiv($number,50) > 0) {
		$roman_numbers['L'] = intdiv($number,50);
		$number %= 50;
	}
	if(intdiv($number,10) > 0) {
		$roman_numbers['X'] = intdiv($number,10);
		$number %= 10;
	}
	if(intdiv($number,5) > 0) {
		$roman_numbers['V'] = intdiv($number,5);
		$number %= 5;
	}
	
	$roman_numbers['I'] = $number;
	printRomanNumber($roman_numbers);
} 

printIntToRoman(140);
printIntToRoman(603);
printIntToRoman(2040);
printIntToRoman(55);
printIntToRoman(1000);
printIntToRoman(500);
printIntToRoman(3999); 
printIntToRoman(3);
printIntToRoman(1);