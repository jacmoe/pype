<?php
foreach($view->params['breadcrumbs'] as $breadcrumb) {
    if(isset($breadcrumb['url'])) {
        echo Html::a($breadcrumb['label'], $breadcrumb['url']) . '  ';
    } else {
        echo $breadcrumb['label'] . '  ';
    }
}