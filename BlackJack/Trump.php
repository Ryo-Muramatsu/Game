<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

class Trump
{
  private array $trumpCard = [];

  // トランプをセットする
  public function setTrumpCard():void
  {
    foreach (trumpSymbol as $symbol) {
      for ($i = 1; $i <= 13; $i++) {
        $this->trumpCard[$symbol][] = $i;
      }
    }
  }

  // トランプをランダムにドローする
  public function randomDraw(): int
  {
    // シンボルと数字をランダムに選ぶ
    $selectSymbol = trumpSymbol[rand(0, count(trumpSymbol) - 1)];
    $selectNumber = rand(0, count($this->trumpCard[$selectSymbol]) - 1);
    $selectCard = $this->trumpCard[$selectSymbol][$selectNumber];

    // 引いたカードを配列から削除する
    unset($this->trumpCard[$selectSymbol][$selectNumber]);
    // 配列のindexを詰める
    $this->trumpCard[$selectSymbol] = array_values($this->trumpCard[$selectSymbol]);

    // 10以上の数字は10として扱う
    if ($selectCard >= 10) {
      $selectCard = 10;
    }

    return $selectCard;
  }

  // ディーラーのドロー(合計値が指定の数字になるまでドローを繰り返す）
  public function drawDealer(): int
  {
    $dealerResult = 0;

    while ($dealerResult < dealerDrawPoint) {
      $dealerResult += $this->randomDraw();
    }
    if($dealerResult >= breakPoint) {
      echo 'ディーラーブレイク！！'.PHP_EOL;
      $dealerResult = 0;
    }
    echo 'ディーラーの得点:'.$dealerResult.PHP_EOL;
    return $dealerResult;
  }
}
