<?php
declare(strict_types=1);
namespace Api\context\PHPBasic\Game\BlackJack;

// ブレイクするポイント
define('breakPoint', 21);
// ディーラーはこのポイントまでドローする
define('dealerDrawPoint', 17);

// トランプのシンボル
define('trumpSymbol', array(
  'heart', 'clover', 'spade', 'club'
));

// 最初の手持ち金額
define('startChip', 200);