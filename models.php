<?php
namespace models;

class Battle{
	private static $game;			
	private static $turn;			
	private static $board;			
	private static $you;
  private static $snakes;

public function load($data)
  {
    self::$board = $data->board;
    self::$you = $data->you;
    self::$turn = $data->turn;
    self::$game = $data->game;
  }

 public function inBoard()
  {
    $moves = array();
    $head = self::$you->head;
    $x_coord = (int) $head->x;
    $y_coord = (int) $head->y;
    $width = (int) self::$board->width;
    $height = (int) self::$board->height;
    if ($y_coord+1 < $height){
      array_push($moves, (object) ['x'=> $x_coord, 'y'=> $y_coord+1, 'name'=>'up']);
    }
    if ($y_coord-1 >= 0){
      array_push($moves, (object) ['x'=> $x_coord, 'y'=> $y_coord-1, 'name'=>'down']);
    }
    if ($x_coord-1 >= 0){
      array_push($moves, (object) ['x'=> $x_coord-1, 'y'=> $y_coord, 'name'=>'left']);
    }
    if ($x_coord+1 < $width){
      array_push($moves, (object) ['x' => $x_coord+1, 'y'=> $y_coord, 'name'=>'right']);
    }  
    return $moves;
  }

  public function snakeBodies()
  {
    $snakes = self::$board->snakes;
    $snakeBodies = array();
    foreach ($snakes as $snake){
      foreach ($snake->body as $snakeBodyElement){
        array_push($snakeBodies, $snakeBodyElement);
      }
    }
    return $snakeBodies;
  }

  //Return random move if null
  public function getMove()
  {
    $possibleNextMoveNames = array();
    foreach (self::inBoard() as $move){
      $moveCoords = (object) ['x'=> $move->x, 'y'=> $move->y];
      if ( ! in_array($moveCoords, self::snakeBodies())){
          array_push($possibleNextMoveNames, $move->name);
      }
    }
    return $possibleNextMoveNames[array_rand($possibleNextMoveNames)];
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