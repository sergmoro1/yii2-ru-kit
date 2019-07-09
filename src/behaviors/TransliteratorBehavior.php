<?php

namespace sergmoro1\rukit\behaviors;

use Yii;
use yii\base\Behavior;

/**
 * Behavior class for an attribute transliteration and save result to other one.
 * 
 * @author Sergey Morozov <sergmoro1@ya.ru>
 */
class TransliteratorBehavior extends Behavior
{
    public $from = 'title';
    public $to   = 'slug';
    public $delimiter = '-';
    
    public function translit() {
        $from = $this->from;
        $to = $this->to;
        if(!trim($this->owner->$to))
        {
            $lowcase = mb_strtolower($this->owner->$from, 'utf-8');
            $cleared = str_replace(
                [
                    '?', '!', ',', ':', ';', '*', '(', ')', 
                    '{', '}', '%', '#', '№', '@', '$', '^', '-',
                    '+', '/', '\\', '=', '|', '"', '\'', '«', '»',
                ], '', $lowcase);  
            $this->owner->$to = str_replace(
                [
                    'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'з', 'и', 'й', 'к',  
                    'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х',  
                    'ъ', 'ы', 'э', ' ', 'ж', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я',
                ],
                [  
                    'a', 'b', 'v', 'g', 'd', 'e', 'e', 'z', 'i', 'y', 'k',  
                    'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h',  
                    'j', 'i', 'e', $this->delimiter, 'zh', 'ts', 'ch', 'sh', 'shch', '', 'yu', 'ya',
                ], $cleared);
        }
    }
}
