<?php
use yii\helpers\Html;
use jacmoe\mdpages\helpers\Page;
/* @var $this yii\web\View */
$this->title = isset($page->title) ? $page->title : 'Untitled';

// $this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
// if(count($parts) > 1) {
//     for($i = 0; $i < count($parts)-1; $i++) {
//         $this->params['breadcrumbs'][] = ['label' => $parts[$i], 'url' => ['index']];
//     }
// }
// $this->params['breadcrumbs'][] = $this->title;
echo '<pre>';
print_r($breadcrumbs);
echo '</pre>';
?>
<div class="content">
    <?= $content; ?>
</div>
<div class="content">
    <hr>
    <h3>Contributors to this page</h3>
    <?php
        foreach($page->contributors as $contributor) {
            echo Html::a(Html::img($contributor->avatar_url, array('width' => '32px', 'title' => $contributor->name)), $contributor->html_url);
        }
    ?>
</div>
