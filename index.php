<?php

//Precondition: Numbers between 1 and 3999

class RomanNumberValueAndAmount {
	public $value;
	public $amount;

	public function __construct($value) {
		$this->value = $value;
		$this->amount = 0;
	}
}

function printNChars(string $char,int $n) {
	for($i = 0; $i < $n; ++$i) {
		echo $char;
	}
}


function printRomanNumber(array $roman_numbers) {
	$prev_roman_number = '';
	foreach($roman_numbers as $index => $roman_number) {
		if($roman_number->amount > 0 && $roman_number->amount < 4) printNChars($index,$roman_number->amount);
		else if($roman_number->amount == 4) echo $index.$prev_roman_number; 
		$prev_roman_number = $index;
	}
	echo ' ';
}


function printIntToRoman(int $number) {
	$roman_numbers = [
		'M' => new RomanNumberValueAndAmount(1000),
		'D' => new RomanNumberValueAndAmount(500),
		'C' => new RomanNumberValueAndAmount(100),
		'L' => new RomanNumberValueAndAmount(50),
		'X' => new RomanNumberValueAndAmount(10),
		'V' => new RomanNumberValueAndAmount(5),
		'I' => new RomanNumberValueAndAmount(1)
	];
	#not the most readable codelines but they save A LOT of lines :) Thx to RomanNumberAndAmount class
	foreach($roman_numbers as $index=>$roman_number) {
		$roman_numbers[$index]->amount =  intdiv($number,$roman_numbers[$index]->value);
		$number %= $roman_numbers[$index]->value;
	}
	$roman_numbers['I']->amount = $number;		#the rest of the value belongs to roman number I
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