<?php
/* @var $this yii\web\View */
$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
foreach($pages as $page) {
  echo yii\helpers\Html::a($page->title,yii\helpers\Url::to(array('page/view', 'id' => $page->url)));
  echo '<br>';
}
?>
