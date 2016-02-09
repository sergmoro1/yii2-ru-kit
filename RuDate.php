<?php
/**
 * @author - Sergey Morozov <sergmoro1@ya.ru>
 * @license - MIT
 * 
 * This is the Behavior class for operations with date.
 * You should define behavior in ActiveRecord class.
 * 
 * public function behaviors() {
 *  return [
 *   'RuDate' => ['class' => RuDate::className()]
 *  ];
 * }
 */
namespace sergmoro1\rudate;

use Yii;
use yii\base\Behavior;

class RuDate extends Behavior
{
	// Russian names of months
	private static $month = ['01'=>'янв', '02'=>'фев', '03'=>'мар', '04'=>'апр', '05'=>'май', '06'=>'июн', 
		'07'=>'июл', '08'=>'авг', '09'=>'сен', '10'=>'окт', '11'=>'ноя', '12'=>'дек'];

	public function getFullDate($attribute)
	{
		$d = $this->owner->$attribute;
		return Yii::$app->language == 'ru-RU' 
			? date('d', $d) . ' ' . self::$month[date('m', $d)] . ' ' . date('Y', $d)
			: date('Y M d', $d);
	}
}
