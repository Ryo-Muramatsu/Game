<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

require_once dirname(__FILE__).'/BlackJack.php';

class NomalBlackJack extends BlackJack
{
  public function execBlackJack():void {
    // ベットする金額を決める
    echo 'ベットする金額を決めてください：';
    $bet = intval(trim(fgets(STDIN)));
    $this->chip->setBetChip($bet);

    // 2枚ドローする
    $this->myPoint += $this->trump->randomDraw();
    $this->myPoint += $this->trump->randomDraw();
    echo '今の得点'.$this->myPoint.PHP_EOL;

    // ブレイクせずyesを選択する限り、ドローし続ける
    $this->draw();

    // ディーラーのドロー
    $this->dealerPoint = $this->trump->drawDealer();

    // ジャッジ
    $this->judge();

  }
}