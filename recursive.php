<?php

// Construction d'un tableau qui va contenir les données que nous allons parcourir
$tab_pc = [
	"caracteristic" => [
		"processsor" => "intel i7",
		"graphic card" => "nvdia geforce 2000tx",
		"ram" => "32 go",
		"hard disk" => "6 to",
		"ssd" => "2 to",
		"system" => "linux",
	],
	"price" => [
		"color" => [
			"black" => "4559 €",
			"white" => "4669 €"
		]
	],
	"stores" => [
		"france" => [
			"montpellier" => [
				"media 2000" => [
					"stock_montpellier" => [
						"stock_white_montpellier" => 156,
						"stock_black_montpellier" => 99
					]
				]
			],
			"paris" => [
				"media 2000" => [
					"stock_paris" => [
						"stock_white_paris" => 122,
						"stock_black_paris" => 88
					]
				]
			]
		]
	]
];

// Création d'une function récursive
function recursive($tab){
	foreach($tab as $key => $value) {
		if(gettype($tab[$key]) == "array"){
			recursive($tab[$key]);
		} else {
			echo $key." : ";
			echo $value."\n";
		}
	}
}

recursive($tab_pc);

?>
