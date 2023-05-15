<?php
declare(strict_types=1);

require_once dirname(__FILE__).'/BlackJack/CallBlackJack.php';
require_once dirname(__FILE__).'/Janken/CallJanken.php';

use Api\context\PHPBasic\Game\BlackJack\CallBlackJack;
use Api\Context\PHPBasic\Game\Janken\CallJanken;

class GameExecute
{
  public function Execute():void
  {
    echo 'ゲームを選択してください' . PHP_EOL . '[1]じゃんけん  [2]ブラックジャック' . PHP_EOL;
    $select = (trim(fgets(STDIN)));
    if ($select === '1') {
      $this->JankenExec();
    }
    elseif($select === '2') {
      $this->BlackJackExec();
    }
    else {
      $this->Execute();
    }
  }
  private function BlackJackExec():void
  {
    $exec = new CallBlackJack();
    $exec->nomalExecute();
  }
  private function JankenExec():void
  {
    $exec = new CallJanken();
    $exec->execute();
  }

}

$game = new GameExecute();
$game->Execute();