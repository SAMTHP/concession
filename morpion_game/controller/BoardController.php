<?php

define('BR', "<br>");

class BoardController
{
	// Properties
	private $cell_number;
	private $tab_cell;
	private const ALPHA = ["A","B","C","D","E","F","G","H","I"];
	private $tour;
	private $flag_tour;

	/**
	 *
	 * BoardController Construct
	 */
	public function __construct()
	{
		$this->cell_number;
		$this->tab_cell = [];
		$this->tour = 1;
		$this->flag_tour = false;
	}

	// This function allow to define how cells we want to have in the board game
	public function setCellNumber()
	{
		$number_of_cell = (int)readline(" Choisissez le plateau => 3(3*3), 6(6*6), 9(9*9) : ");
		if($number_of_cell % 3 == 0 AND $number_of_cell <= 9 ){
			$this->cell_number = $number_of_cell;
		} else {
			echo "Veuillez recommencer !\n";
			return self::setCellNumber();
		}
	}


	// This function return the cell numbers
	public function getCellNumber()
	{
		return $this->cell_number;
	}

	// This function generate a new cell table which is proportionate with the cell number which have been defined
	public function setTabCell($cell_number)
	{
		// Tab cell creation
			for($i=0;$i < $this->cell_number; $i++){
            	$this->tab_cell[$i] = array ();
            	for ($j=0; $j <$this->cell_number; $j++){
                	array_push ($this->tab_cell[$i], ["value" => " "]);
            	}
        	}
	}

	public function getTabCell()
	{
		return $this->tab_cell;
	}

	public function showBoard($tab_cell)
	{
		$num = $this->cell_number;

		// Creation of header
		$header = "     ";
		for($i=0;$i < $num; $i++){
			$header .= strval($i+1)."   ";
		}
		echo $header."\n";
		$here = 0;
		// Creation of
		for($i=0;$i<$num;$i++){
			$line = " ".self::ALPHA[$i]." | ";
			for($j=$here;$j<$num;$j++){
				for($v=0;$v<$num;$v++){
					$line .= $tab_cell[$j][$v]["value"]." | ";
				}
				$line .="\n";
				$here++;
				break;
			}

			echo $line;
		}
	}

	// This function insert the morpions in tabCell
	public function insertToCell($choice,$pion)
	{
		// Indexation of x
		$tab_index_x = [];
		for($i=0;$i<$this->cell_number;$i++){
			$letter = self::ALPHA[$i];
			for($e=0;$e<$this->cell_number;$e++){
				array_push($tab_index_x, [$letter => $e]);
			}
		}

		// Indexation of y
		$tab_index_y = [];
		for($i=0;$i<$this->cell_number;$i++){
			$letter = self::ALPHA[$i];
			array_push($tab_index_y, [$letter => $i]);
		}

		// String split of choice
		$chars_choice = str_split(strtoupper($choice));

		// Test if value of x is too big or too small
		if($chars_choice[1] > $this->cell_number || $chars_choice[1] <= "0"){
			echo "Veuillez mettre une valeur qui est présente dans la grille !\n";
			$this->flag_tour = false;
		}

		// Test if value of y exist
		if(in_array($chars_choice[0], self::ALPHA) == false){
			echo "La lettre choisie n'existe pas !\n";
		 	$this->flag_tour = false;
		}

		// Insertion of $pion in tab_cell
		foreach ($tab_index_x as $x) {
			foreach ($tab_index_y as $y) {
				foreach ($x as $letter_x => $value_x) {
					foreach ($y as $letter_y => $value_y) {
						if($letter_x == $chars_choice[0] && $value_x == ($chars_choice[1]-1)){
							if($letter_y == $chars_choice[0]){
								if( $this->tab_cell[$y["$letter_x"]][$value_x]["value"] != " " ){
									echo "Cette case est déjà prise !\n";
									$this->flag_tour = false;
								} else {
									$this->tab_cell[$y["$letter_x"]][$value_x]["value"] = $pion;
									$this->flag_tour = true;
								}
							}
						}
					}
				}
			}
		}

	}

	public function setTour()
	{
		if($this->flag_tour){
			$this->tour++;
		}
	}

	public function getTour()
	{
		return $this->tour;
	}

	public function showTour()
	{
		echo "Tour : ".$this->tour."\n";
	}

	public function getFlagTour()
	{
		return $this->flag_tour;
	}

	public function show()
	{
		//$tab_cell = $this->tab_cell;
		$num = $this->cell_number;

		// Creation of header
		$header = "     ";
		for($i=0;$i < $num; $i++){
			$header .= strval($i+1)."   ";
		}
		echo $header."\n";

		$here = 0;

		// Intialization of values from tab_cell in the board
		for($i=0;$i<$num;$i++){
			$line = " ".self::ALPHA[$i]." | ";
			for($j=$here;$j<$num;$j++){
				for($v=0;$v<$num;$v++){
					$line .= $this->tab_cell[$j][$v]["value"]." | ";
				}

				$line .="\n";
				$here++;
				break;
			}
			echo $line;
		}
	}

	public function initBoard()
	{
		// Board initialization
		for($i=0;$i < $this->cell_number; $i++){
            for ($j=0; $j <$this->cell_number; $j++){
                $this->tab_cell[$i][$j]["value"] = " ";
            }
        }
	}
}

// $board = new BoardController();
// $board->setCellNumber();
// $number = $board->getCellNumber();
// $board->setTabCell($number);
// $tab = $board->getTabCell();
// print_r($tab);
