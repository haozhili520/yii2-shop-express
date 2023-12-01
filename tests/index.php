<?php

define('YII_DEBUG', true);

require_once '../vendor/autoload.php';
require_once '../vendor/yiisoft/yii2/Yii.php';

use Tmzkj\Express\Waybill;
use Tmzkj\Express\Trackers\Kuaidi100;
use Tmzkj\Express\Trackers\Kuaidiwang;
use Tmzkj\Express\Exceptions\TrackingException;

$wb = \Yii::createObject(
    [
        'class' => 'Tmzkj\Express\Waybill',
        'id' => '9892984739724',
        'express' => '邮政',
    ]
);

$tracker = \Yii::createObject(
    [
        'class' => 'Tmzkj\Express\Trackers\kuaidi100',
    ]
);

try {
    $traces = $wb->getTraces($tracker);
} catch (TrackingException $ex) {
    var_dump($ex);
    exit;
}

echo json_encode($wb, JSON_PRETTY_PRINT);