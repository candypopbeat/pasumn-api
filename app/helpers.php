<?php
declare(strict_types=1);

/**
 * データベース処理用クラス読込
 */
use Illuminate\Support\Facades\DB;


/**
 * 現在時刻取得
 * 各種データベース登録時のcreated_atとupdated_at用
 * @return string
 */
function getNow()
{
  date_default_timezone_set('Asia/Tokyo');
  $date = date("Y-m-d H:i:s");
  return $date;
}
