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
      $url = substr($file, strlen(\Yii::getAlias('@pages')));
      $url = ltrim($url, '/');
      $raw_url = pathinfo($url);
      $url = $raw_url['filename'];
      if($url == 'README') continue;
      if($raw_url['dirname'] != '.') {
          $url = $raw_url['dirname'] . '/' . $url;
      }
      echo yii\helpers\Html::a($url,yii\helpers\Url::to(array('view', 'page_id' => $url)));
      echo '<br>';
  }
}
?>
