<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\Janken;
require_once dirname(__FILE__) . '/Janken.php';

class CallJanken {
  public function execute(): void {
    $janken = new vsComputer;
    $janken->setComputerHand();
    echo '出す手を入力してください'.PHP_EOL.'[グー] [チョキ] [パー]'.PHP_EOL;
    $hand = trim(fgets(STDIN));

    if($hand == 'グー' || $hand == 'チョキ' || $hand == 'パー') {
      $janken->setPlayerHand($hand);
      $output = $janken->judge();
      echo $output.PHP_EOL;
    }
    else {
      $this->execute();
    }
  }
}
