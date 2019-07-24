<?php

namespace sergmoro1\rukit\behaviors;

use Yii;
use yii\base\Behavior;

/**
 * Behavior class for ability to get date with months.
 * 
 * @author Sergey Morozov <sergmoro1@ya.ru>
 */
class FullDateBehavior extends Behavior
{
    private static $default = ['ru-RU' => 'd M Y', 'en-US' => 'Y M d'];
    private static $month = [
        '01' => 'Январь', 
        '02' => 'Февраль', 
        '03' => 'Март', 
        '04' => 'Апрель', 
        '05' => 'Май', 
        '06' => 'Июнь', 
        '07' => 'Июль', 
        '08' => 'Август', 
        '09' => 'Сенябрь', 
        '10' => 'Октябрь', 
        '11' => 'Ноябрь', 
        '12' => 'Декабрь'
    ];

    public function fullDate($attribute, $format = null)
    {
        $d = $this->owner->$attribute;
        if(!$format)
            $format = self::$default[Yii::$app->language];
        if(Yii::$app->language == 'ru-RU') {
            $m = self::$month[date('m', $d)];
            $format = str_replace('M', mb_substr($m, 0, 3, 'UTF-8'), $format);
            $format = str_replace('F', $m, $format);
        }
        return date($format, $d);
    }
}
