Yii2 set of behaviors for Russian language
==========================================

Russian months for full date. Title transliteration to slug.

Installation
------------

The preferred way to install this extension is through composer.

Either run

`composer require --prefer-dist sergmoro1/yii2-ru-kit`

or add

`"sergmoro1/yii2-ru-kit": "dev-master"`

to the require section of your composer.json.

Usage
-----

For example `common\models\Post.php`

```php
use sergmoro1\rukit\FullDate;
use sergmoro1\rukit\Translit;

class Post extends ActiveRecord
{
  ...
  public function behaviors() {
    return [
      ['class' => FullDate::className()],
      ['class' => Translit::className()],
    ];
  }
  ...
  // Translit
  public function beforeSave($insert)
  {
    if(parent::beforeSave($insert))
    {
      $this->translit();
      return true;
    } else
        return false;
  }
```

in a view

```php
<?= $model->fullDate('created_at'); // ru-RU -> 21 Фев 2018 ?>
```

only month and year

```php
<?= $model->fullDate('created_at', 'M Y'); // en-US -> Feb 2018 ?>
```

full month, day and year.

```php
<?= $model->fullDate('created_at', 'F d из t, Y (e)'); // ru-Ru -> Февраль 13 из 28, 2018 (UTC) ?>
```
