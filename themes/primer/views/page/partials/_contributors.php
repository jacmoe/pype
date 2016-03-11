<?php
foreach($page->contributors as $contributor) {
    echo Html::a(Html::img('', ['width' => '24', 'height' => '24', 'class' => 'avatar avatar-small icon-'. $contributor->login]), $contributor->html_url, array('target' => '_blank', 'class' => 'tooltipped tooltipped-s', 'aria-label' => $contributor->login, 'alt' => $contributor->login));
}