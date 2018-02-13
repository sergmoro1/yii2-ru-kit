<h1>Yii2 behavior for date fields processing</h1>

The Behavior class for operations with date fields in Russian format.

<h2>Installation</h2>

<pre>
$ composer require sergmoro1/yii2-ru-date "dev-master"
</pre>

<h2>Usage</h2>

You should define behavior in a Model class.

<pre>
use sergmoro1\rudate\RuDate;

class Post extends ActiveRecord
{
  ...
  public function behaviors() {
    return [
      'RuDate' =&gt; ['class' =&gt; RuDate::className()]
    ];
  }
  ...
</pre>

And use it in appropriate place in a view.
<pre>
&lt;?= $model->getFullDate('created_at'); ?&gt;
</pre>

Only month and year.

<pre>
&lt;?= $model->getFullDate('created_at', 'M Y'); ?&gt; // Фев 2018
</pre>

Full month, day and year.

<pre>
&lt;?= $model->getFullDate('created_at', 'F d из t, Y (e)'); ?&gt; // Февраль 13 из 28, 2018 (UTC)
</pre>
