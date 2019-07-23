<?php

class GameController
{
	// Properties
	private $tour;
	private const ALPHA = ["A","B","C","D","E","F","G","H","I"];
	public const PION = [
		"player_1" => "X",
		"player_2" => "O"
	];
	private $tab_gamer;
	private $tab_score;
	private $choice_1;
	private $choice_2;
	private $flag_player1;
	private $flag_player2;
	private $tab_victory_horizontal;
	private $tab_victory_vertical;
	private $tab_victory_diagonal1;
	private $tab_victory_diagonal2;
	private $tab_choices_player1;
	private $tab_choices_player2;

	public function __construct($name_player_1,$name_player_2)
	{
		$this->tour = 1;
		$this->tab_score = array(
			"player_1" => [
				"win" => 0,
				"loose" => 0
			],
			"player_2" => [
				"win" => 0,
				"loose" => 0
			]
		);
		$this->tab_gamer = array(
			"names_players" => [
				"player_1" => $name_player_1,
				"player_2" => $name_player_2
			],
			"pions" => [
				"player_1" => self::PION["player_1"],
				"player_2" => self::PION["player_2"]
			],
			"scoring" => $this->tab_score
		);
		$this->choice_1 = "";
		$this->choice_2 = "";
		$this->flag_player1 = false;
		$this->flag_player2 = false;
		$this->tab_victory_horizontal = array();
		$this->tab_victory_vertical = array();
		$this->tab_victory_diagonal1 = array();
		$this->tab_victory_diagonal2 = array();
		$this->tab_choices_player1_horizontal = array();
		$this->tab_choices_player1_vertical = array();
		$this->tab_choices_player2 = array();
	}

	public function getTabGamer()
	{
		return $this->tab_gamer;
	}

	public function showScore()
	{
		return $this->tab_score;
	}

	public function startGame($cell_number)
	{
		// Definition of gamers names

	}

	public function setChoice1()
	{
		echo $this->tab_gamer["names_players"]["player_1"]." : \n";
		$this->choice_1 = readline("Choisissez votre case => ");
		// echo "Tour n°".$this->tour."\n";
		// $this->tour++;
	}

	public function getChoice1()
	{
		return $this->choice_1;
	}

	public function setChoice2()
	{
		echo $this->tab_gamer["names_players"]["player_2"]." : \n";
		$this->choice_2 = readline("Choisissez votre case => ");
		// echo "Tour n°".$this->tour."\n";
		// $this->tour++;
	}

	public function getChoice2()
	{
		return $this->choice_2;
	}

	public function getTour()
	{
		return $this->tour;
	}

	 public function victoryMaster($cell_number,$tab_cell,$choice1,$choice2)
	 {
	 	$compare = null;
	 	$counter = 0;-
	 	$gagner = false;

	 	//vertical
	 	for($i=0;$i<$cell_number;$i++){

	 		$counter = 0;
	 		$compare = $tab_cell[$i][0]["value"];

	 		for($j=0;$j<$cell_number;$j++){
	 			if ($compare == $tab_cell[$i][$j]["value"] && $tab_cell[$i][$j]["value"] != " "){
	 				$counter++;
	 				$gagner == true;
	 			}
	 			elseif ($compare != $tab_cell[$i][$j]["value"] && $tab_cell[$i][$j]["value"] != " ") {
	 				$counter --;
	 				$gagner == false;
	 			}

	 			if ($counter == 3)
	 				break;
	 		}

	 		if ($counter == 3){
	 			$gagner = true;
	 			break;
	 		}

	 	}

	 	if ($gagner){
	 		echo "match gagner";
	 	}

	 	/*else {
	 		//vertical
	 		//copier le code et inverser les indices

	 		//aprs tu fais la meme chose

		 	if ($gagner){
		 		echo "match gagner";
		 	}

		 	else {
		 	//diagonal
	 		//copier le code et inverser les indices

	 		//aprs tu fais la meme chose

			 	if ($gagner){
			 		echo "match gagner";
			 	}
		 	}
	 	}*/
	 }

	public function victory($cell_number,$choice1,$choice2){

		// Creation of tab_victory_horizontal
		for($i=0;$i<$cell_number;$i++){
			$this->tab_victory_horizontal[$i] = array();
			for($e=0;$e<$cell_number;$e++){
				array_push($this->tab_victory_horizontal[$i], self::ALPHA[$i].($e+1));
			}
		}

		// print_r($this->tab_victory_horizontal);

		// Creation of tab_victory_vertical
		for($i=0;$i<$cell_number;$i++){
			$this->tab_victory_vertical[$i] = array();
			for($e=0;$e<$cell_number;$e++){
				array_push($this->tab_victory_vertical[$i], self::ALPHA[$e].($i+1));
			}
		}

		//print_r($this->tab_victory_vertical);

		// Creation of tab_victory_diagonal a1,b2,c3
		for($e=0;$e<$cell_number;$e++){
			array_push($this->tab_victory_diagonal1, self::ALPHA[$e].($e+1));
		}

		// Creation of tab_victory_diagonal c1,b2,a3
		$num = $cell_number;
		for($e=0;$e<$cell_number;$e++){
			array_push($this->tab_victory_diagonal2, self::ALPHA[$num-1].($e+1));
			$num--;
		}

		$count_identical_1_horizontal = 0;
		$count_identical_2_horizontal = 0;
		$count_identical_1_vertical = 0;
		$count_identical_2_vertical = 0;

		// Saving choices of players in tables
		if($choice1){
			array_push($this->tab_choices_player1_horizontal, strtoupper($choice1));
			array_push($this->tab_choices_player1_vertical, strtoupper($choice1));
			if(count($this->tab_choices_player1_horizontal) != 0){
				for($e=0;$e<$cell_number;$e++){
					for($i=0;$i<count($this->tab_choices_player1_horizontal);$i++){
						if($count_identical_1_horizontal <= $cell_number ){
							if($this->tab_choices_player1_horizontal[$i] == $this->tab_victory_horizontal[$e][$i]){
								$count_identical_1_horizontal += 1;
							}
						}
					}
				}
			}

			if (count($this->tab_choices_player1_vertical) != 0) {
				for($e=0;$e<$cell_number;$e++){
					for($i=0;$i<count($this->tab_choices_player1_vertical);$i++){
						if($count_identical_1_vertical <= $cell_number ){
							if($this->tab_choices_player1_vertical[$i] == $this->tab_victory_vertical[$i][$e]){
								$count_identical_1_vertical += 1;
								echo $count_identical_1_vertical."\n";
							}
						}
					}
				}
			}

			//print_r($this->tab_choices_player1_vertical);
		} elseif ($choice2) {
			array_push($this->tab_choices_player2, strtoupper($choice2));
			if (count($this->tab_choices_player2) != 0) {
				for($e=0;$e<$cell_number;$e++){
					for($i=0;$i<count($this->tab_choices_player2);$i++){
						if($count_identical_2_horizontal <= $cell_number ){
							if($this->tab_choices_player2[$i] == $this->tab_victory_horizontal[$e][$i]){
								$count_identical_2_horizontal += 1;
							}
						}
					}
				}
			}

			if (count($this->tab_choices_player2) != 0) {
				echo "Je rentre dans le vertical 2 \n";
				for($e=0;$e<$cell_number;$e++){
					for($i=0;$i<count($this->tab_choices_player2);$i++){
						if($count_identical_2_vertical <= $cell_number ){
							if($this->tab_choices_player2[$i] == $this->tab_victory_vertical[$i][$e]){
								$count_identical_2_vertical += 1;
							}
						}
					}
				}
			}
		}

		// Test if choices are the same with the tab victory horizontal

		// echo "Compteur 1 : ".$count_identical_1."\n";
		// echo "Compteur 2 : ".$count_identical_2."\n";

		// print_r($this->tab_choices_player1);
		// print_r($this->tab_victory_diagonal1);
		// print_r($this->tab_victory_diagonal2);

			if($count_identical_1_horizontal == $cell_number || $count_identical_1_vertical == $cell_number){
				$this->flag_player1 = true;
			} elseif($count_identical_2_horizontal == $cell_number || $count_identical_2_vertical == $cell_number) {
				$this->flag_player2 = true;
			}

		if($this->flag_player1){
			echo $this->tab_gamer['names_players']['player_1']." à gagné la partie !\n";
			$this->tab_gamer['scoring']['player_1']['win'] += 1;
			$this->tab_gamer['scoring']['player_2']['loose'] += 1;
		}

		if($this->flag_player2){
			echo $this->tab_gamer['names_players']['player_2']." à gagné la partie !\n";
			$this->tab_gamer['scoring']['player_2']['win'] += 1;
			$this->tab_gamer['scoring']['player_1']['loose'] += 1;
		}

	}

	public function victoryAnalysis($cell_number,$tab_cell,$tab_gamer)
	{
		$tab_victory_1 = array();
		$tab_victory_2 = array();

		for($i=0;$i<$cell_number;$i++){
			$tab_victory_1[$i] = array();
			$tab_victory_2[$i] = array();
		}

		for($y=0;$y<$cell_number;$y++){
			for($x=0;$x<$cell_number;$x++){
				if($tab_cell[$y][$x]["value"] == $tab_gamer['pions']['player_1']){
					array_push($tab_victory_1[array_search($tab_cell[$y][$x]["value"], $tab_cell[$y])], [$tab_cell[$y][$x]["value"]]);
				} elseif($tab_cell[$y][$x]["value"] == $tab_gamer['pions']['player_2']) {
					array_push($tab_victory_2[array_search($tab_cell[$y][$x]["value"], $tab_cell[$y])], [$tab_cell[$y][$x]["value"]]);
				}
			}
		}

		// print_r($tab_victory_1);
		// print_r($tab_victory_2);

		for($y=0;$y<$cell_number;$y++){
			if(count($tab_victory_1[$y]) == $cell_number){
				$this->flag_player1 = true;
			} elseif(count($tab_victory_2[$y]) == $cell_number) {
				$this->flag_player2 = true;
			}
		}

		if($this->flag_player1){
			echo $tab_gamer['names_players']['player_1']." à gagné la partie !\n";
			$tab_gamer['scoring']['player_1']['win'] += 1;
			$tab_gamer['scoring']['player_2']['loose'] += 1;
		}

		if($this->flag_player2){
			echo $tab_gamer['names_players']['player_2']." à gagné la partie !\n";
			$tab_gamer['scoring']['player_2']['win'] += 1;
			$tab_gamer['scoring']['player_1']['loose'] += 1;
		}
		//print_r($tab_gamer);
	}

	public function dashboard()
	{
		$g_1 = $this->tab_gamer['names_players']['player_1'];
		$g_2 = $this->tab_gamer['names_players']['player_2'];

		$v_1 = $this->tab_gamer['scoring']['player_1']['win'];
		$d_1 = $this->tab_gamer['scoring']['player_1']['loose'];

		$v_2 = $this->tab_gamer['scoring']['player_2']['win'];
		$d_2 = $this->tab_gamer['scoring']['player_2']['loose'];

		echo "          -----------\n";
		echo "          |  SCORE  |\n";
		echo "          -----------\n";
		echo "    $g_1          $g_2\n";
		echo "   -----------   -----------\n";
		echo "   |  V | D  |   |  V | D  |\n";
		echo "   -----------   -----------\n";
		echo "   |  $v_1 | $d_1  |   |  $v_2 | $d_2  |\n";
		echo "   -----------   -----------\n";
		echo "\n";
	}

	public function getFlagPlayer1()
	{
		return $this->flag_player1;
	}

	public function getFlagPlayer2()
	{
		return $this->flag_player2;
	}

	public function replay()
	{
		$this->tour = 0;
	}

}