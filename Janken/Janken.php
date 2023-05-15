<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\Janken;

interface Janken {
  public function judge():string;
  public function setPlayerHand(string ...$hand):array;

}
class vsComputer implements janken
{
  private array $hands = [
    'グー', 'チョキ', 'パー'
  ];

  private array $playerHands;

  public function setPlayerHand(string ...$hand):array {
    foreach ($hand as $value)
      $this->playerHands[] = $value;
    return $this->playerHands;
  }

  public function setComputerHand():array {
    $this->playerHands[] = $this->hands[rand(0, 2)];
    return $this->playerHands;
  }

  // playerHandsの0番を相手、1番を自分とする
  public function judge():string
  {
    $opponentHand = $this->playerHands[0];
    $myHand = $this->playerHands[1];
    $result = '';

    if ($opponentHand === $myHand) {
      $result = 'あいこ';
    }

    elseif($opponentHand === 'グー') {
      if ($myHand === 'チョキ') {
        $result = '負け';
      }
      if($myHand === 'パー') {
        $result = '勝ち';
      }
    }

    elseif ($opponentHand === 'チョキ') {
      if ($myHand === 'グー') {
        $result = '勝ち';
      }
      if($myHand === 'パー') {
        $result ='負け';
      }
    }

    elseif ($opponentHand === 'パー') {
      if ($myHand === 'チョキ') {
        $result = '勝ち';
      }
      if($myHand === 'グー') {
        $result = '負け';
      }
    }

    echo '相手の手：'.$opponentHand.PHP_EOL;
    return $result;
  }
}