<?php
use yii\helpers\Html;
use yii\helpers\Url;
use jacmoe\mdpages\helpers\Page;
/* @var $this yii\web\View */
$this->title = isset($page->title) ? $page->title : 'Untitled';

foreach($this->params['breadcrumbs'] as $breadcrumb) {
    if(isset($breadcrumb['url'])) {
        echo Html::a($breadcrumb['label'], $breadcrumb['url']) . '  ';
    } else {
        echo $breadcrumb['label'] . '  ';
    }
}
?>
<hr>
<div class="content">
    PHP
    <?= $content; ?>
</div>
<div class="content">
    <pre>
    <?php
        //print_r(Page::paginate('created DESC'));
    ?>
    </pre>
</div>
<div class="content">
    <pre>
    <?php
        //print_r($headings);
    ?>
    </pre>
</div>
<div class="content">
    <hr>
    <h3>Contributors to this page</h3>
    <?php
        foreach($page->contributors as $contributor) {
            echo Html::a(Html::img(Yii::getAlias('@web/avatars/') . $contributor->login . '.png', array('width' => '24px', 'height' => '24px', 'title' => $contributor->name)), $contributor->html_url);
        }
    ?>
</div>
