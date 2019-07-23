<?php

require 'controller/GamerController.php';
require 'controller/GameController.php';
require 'controller/BoardController.php';

// Creation of gamers
$player_1 = new GamerController();
$player_2 = new GamerController();

// Get names of gamers
$name_player_1 = $player_1->getName();
$name_player_2 = $player_2->getName();

// Game start
$game = new GameController($name_player_1,$name_player_2);

// Board creation
$board = new BoardController();

// Board cell choice
$board->setCellNumber();
$number_of_cell = $board->getCellNumber();

// Creation of tab_cell
$board->setTabCell($number_of_cell);

// Get tab_cell
$tab = $board->getTabCell();

// Show dashboard && board game
$game->dashboard();
$board->showBoard($tab);

// Start party
$tab_gamer = $game->getTabGamer();
$pion_1 = $tab_gamer['pions']['player_1'];
$pion_2 = $tab_gamer['pions']['player_2'];
//print_r($tab);
while($board->getTour() <= ($number_of_cell) || !$game->getFlagPlayer1() || !$game->getFlagPlayer2()){

	$board->showTour();
	$game->setChoice1();
	$choice1 = $game->getChoice1();
	$choice2 = null;
	$board->insertToCell($game->getChoice1(),$pion_1);
	while($board->getFlagTour() == false){
		$game->setChoice1();
		$board->insertToCell($game->getChoice1(),$pion_1);
	}
	$tab = $board->getTabCell();
	$board->setTour();
	$board->show();
	$game->victoryMaster($number_of_cell,$tab,$choice1,$choice2);


	$board->showTour();
	$game->setChoice2();
	$choice1 = null;
	$choice2 = $game->getChoice2();
	$board->insertToCell($game->getChoice2(),$pion_2);
	while($board->getFlagTour() == false){
		$game->setChoice2();
		$board->insertToCell($game->getChoice2(),$pion_2);
	}
	$board->setTour();
	$board->show();
	$tab = $board->getTabCell();
	$game->victoryMaster($number_of_cell,$tab,$choice1,$choice2);
}

$game->dashboard();

?>