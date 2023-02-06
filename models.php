<?php
namespace models;

class Battle{
	public $game;			
	public $turn;			
	public $board;			
	public $you;			
	
	public function __construct(){
		$this->game = new game();
		$this->turn = 0;
		$this->board = new board();
		$this->you = new snake();
	}

	public function getMove(){
		
	}
}

class game{
	public $id;
	public $ruleset;
	public $map;
	public $timeout;
	public $source;
}

class board{
	public $height;			
	public $width;			
	public $food = [];		
	public $snakes = [];
	public $hazards = [];
}

class snake{
	public int $id;				
	public $name;			
	public $health;			
	public $body = [];
	public $latency;
	public $head;	
	public $length;
	public $shout;
	public $squad;
	public $customizations;
}

class coordinates{
	public $x;				
	public $y;				
}

class Move{
	public $move;
}

class MoveTypes{
	public static $Right = "right";
	public static $Left = "left";
	public static $Up = "up";
	public static $Down = "down";
}
?>