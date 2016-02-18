<?php
/* @var $this yii\web\View */
$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$metaParser = new jacmoe\mdpages\components\Meta;
$filter = '\jacmoe\mdpages\components\ContentFileFilterIterator';
$files = jacmoe\mdpages\components\Utility::getFiles(\Yii::getAlias('@pages'), $filter);
if(is_null($files)) {
    echo 'no pages here';
} else {
  foreach($files as $file) {
      echo $file . "<br>";
      $metatags = $metaParser->parse(file_get_contents($file));
      echo '<pre>';
      print_r($metatags);
      echo '</pre>';
  }
}
?>
