<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

require_once dirname(__FILE__).'/Trump.php';
require_once dirname(__FILE__).'/Chip.php';
require_once dirname(__FILE__).'/define.php';

abstract class BlackJack {
  // 各使用クラスのインスタンス変数
  protected Trump $trump;
  protected Chip $chip;

  // ユーザーがドローを続けるかのフラグ
  protected bool $continue = true;
  // ブラックジャックを始める際の最初の手持ち金額
  protected int $startChip = startChip;

  // 自分の得点
  protected int $myPoint = 0;
  // ディーラーの得点
  protected int $dealerPoint = 0;

  // ユーザーにドローの選択をさせる
  protected function drawChoice():void {
    echo 'ドローしますか？[y/n]:';
    $choice = (trim(fgets(STDIN)));
    if($choice == 'n') {
      $this->continue = false;
    }
    elseif($choice == 'y') {
      $this->continue = true;
    }
    else {
      echo '[y/n]で入力してください'.PHP_EOL;
      $this->drawChoice();
    }
  }

  // ブレイクしない間、ユーザーは何回でもドローの選択ができる
  protected function draw():void {
    $this->drawChoice();

    while ($this->continue) {
      $this->myPoint += $this->trump->randomDraw();
      echo '今の得点：' . $this->myPoint . PHP_EOL;

      if ($this->myPoint >= breakPoint) {
        $this->myPoint = 0;
        echo 'ブレイク！！' . PHP_EOL;
        echo '今の得点：' . $this->myPoint . PHP_EOL;
        break;
      }
      $this->drawChoice();
    }
  }

  // 勝敗をジャッジし、配当を計算する
  protected function judge():void {
    // 勝敗のジャッジ
    if($this->myPoint > $this->dealerPoint) {
      $judge = '勝ち';
      echo $judge.PHP_EOL;
    }
    else {
      $judge = '負け';
      echo $judge.PHP_EOL;
    }

    $this->chip->setJudge($judge);
    $this->chip->chipCalculation();

    echo '現在の手持ち：'.$this->chip->getTotalChip().PHP_EOL;
  }

  // イニシャライズ
  public function initBlackJack():void {
    $this->trump = new Trump();
    $this->chip = new Chip();

    // トランプカードをセットする
    $this->trump->setTrumpCard();
    echo 'トランプカードをセットしました。'.PHP_EOL;

    // 最初の配当をセットする
    $this->chip->setTotalChip($this->startChip);
    echo '最初の手持ち金額は'.$this->chip->getTotalChip().'です。'.PHP_EOL;
  }
}
