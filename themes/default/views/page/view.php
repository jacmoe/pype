<?php
/* @var $this yii\web\View */
$this->title = $page->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
if(count($parts) > 1) {
    for($i = 0; $i < count($parts)-1; $i++) {
        $this->params['breadcrumbs'][] = ['label' => $parts[$i], 'url' => ['index']];
    }
}
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
echo '<pre>';
print_r($page);
echo '</pre>';
?>
