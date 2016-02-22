<?php
/* @var $this yii\web\View */
$this->title = 'Pype';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="column">
        <?= $content; ?>
    </div>
</div>
<hr/>
<div class="row">
    <div class="column">
        <?php
        foreach($pages as $page) {
          echo yii\helpers\Html::a($page->title,yii\helpers\Url::to(array('page/view', 'id' => $page->url)));
          echo '<br>';
        }
        ?>
    </div>
</div>
