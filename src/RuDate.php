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
namespace sergmoro1\blog\components;

use Yii;
use yii\base\Behavior;

class RuDate extends Behavior
{
	private static $default = ['ru-RU' => 'd M Y', 'en-US' => 'Y M d'];
    // Russian names of months
    private static $month = ['01'=>'Январь', '02'=>'Февраль', '03'=>'Март', '04'=>'Апрель', '05'=>'Май', '06'=>'Июнь', 
        '07'=>'Июль', '08'=>'Август', '09'=>'Сенябрь', '10'=>'Октябрь', '11'=>'Ноябрь', '12'=>'Декабрь'];

    public function getFullDate($attribute, $format = null)
    {
        $d = $this->owner->$attribute;
        if(!$format)
           $format = self::$default[Yii::$app->language];
        if(Yii::$app->language == 'ru-RU') {
			$format = str_replace('M', mb_substr(self::$month[date('m', $d)], 0, 3), $format);
			$format = str_replace('F', self::$month[date('m', $d)], $format);
			return date($format, $d);
        } else
            return date($format, $d);
    }
}
