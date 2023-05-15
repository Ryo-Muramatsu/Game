<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

class Chip {
  private string $judge;
  private int $betChip;
  private int $totalChip;

  public function setJudge(string $judge): void
  {
    $this->judge = $judge;
  }

  public function setBetChip(int $betChip): void
  {
    $this->betChip = $betChip;
  }

  public function setTotalChip(int $totalChip): void
  {
    $this->totalChip = $totalChip;
  }

  public function getTotalChip(): int
  {
    return $this->totalChip;
  }

  // チップの計算
  public function chipCalculation():void {
    if($this->judge === '勝ち') {
      $this->totalChip += $this->betChip * 2;
    }
    elseif ($this->judge === '負け') {
      $this->totalChip -= $this->betChip;
    }
  }
}