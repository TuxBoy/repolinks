<?php
namespace App\Tuxboy;

/**
 * Priority
 */
abstract class Priority
{

  const NORMAL = 'Normal';
  const HIGHT  = 'Hight';
  const LOW    = 'Low';

  public static $ACTION = [
    self::NORMAL => 'action',
    self::HIGHT  => 'warning',
    self::LOW    => 'info'
  ];

}