<h1>Yii2 behavior for date fields processing</h1>

The Behavior class for operations with date fields in Russian format.

<h2>Installation</h2>

<pre>
$ composer require sergmoro1/yii2-ru-date
</pre>

<h2>Usage</h2>

You should define behavior in ActiveRecord class.

<pre>
use sergmoro1\rudate\RuDate;

public function behaviors() {
  return [
    'RuDate' =&gt; ['class' =&gt; RuDate::className()]
  ];
}
</pre>

And use it in appropriate place in a view.
<pre>
&lt;?= $model->getFullDate('created_at'); ?&gt;
</pre>
