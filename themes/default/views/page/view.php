<?php
use yii\helpers\Html;
use jacmoe\mdpages\helpers\Page;
/* @var $this yii\web\View */
$this->title = isset($page->title) ? $page->title : 'Untitled';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
if(count($parts) > 1) {
    for($i = 0; $i < count($parts)-1; $i++) {
        $this->params['breadcrumbs'][] = ['label' => $parts[$i], 'url' => ['index']];
    }
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <?= $content; ?>
</div>
<hr>
<?php
    $page_arr = (array)$page;
?>
<?= count($page_arr); ?>
<hr>
<pre>
<?php
print_r($page_arr);
?>
</pre>
