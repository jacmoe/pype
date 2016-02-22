<?php
/* @var $this yii\web\View */
$this->title = 'Pype';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <?= $content; ?>
</div>
<hr/>
<?php
foreach($pages as $page) {
  echo yii\helpers\Html::a($page->title,yii\helpers\Url::to(array('page/view', 'id' => $page->url)));
  echo '<br>';
}
?>
