<?php
namespace App\Tuxboy;

use Illuminate\Validation\Rule;

/**
 * Has_Rules
 */
trait Has_Rules
{

  /**
   * @param array $rule
   * @return array
   */
  public function defaultRules(array $rule = [])
  {
    return array_merge([
      'url'         => 'required',
      'description' => 'string|max:255',
      'priority'    => 'required|' . Rule::in(['normal,hight,low'])
    ], $rule);
  }

}