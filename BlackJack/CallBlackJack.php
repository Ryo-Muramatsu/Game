<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

use A\B;

require_once dirname(__FILE__).'/BlackJack.php';
require_once dirname(__FILE__).'/Trump.php';
require_once dirname(__FILE__).'/Chip.php';
require_once dirname(__FILE__).'/NomalBlackJack.php';

class CallBlackJack {
  private bool $continue = true;

  private function choice(): void {
    echo '続けますか？[y/n]';
    $choice = (trim(fgets(STDIN)));

    if($choice == 'n') {
      $this->continue = false;
    }
    elseif($choice == 'y') {
      $this->continue = true;
    }
    else {
      echo '[y/n]で入力してください';
      $this->choice();
    }
  }
  public function nomalExecute(): void {
    $blackJack = new NomalBlackJack();

    // イニシャライズ
    $blackJack->initBlackJack();

    while ($this->continue) {
      $blackJack->execBlackJack();
      $this->choice();
    }
  }
}
