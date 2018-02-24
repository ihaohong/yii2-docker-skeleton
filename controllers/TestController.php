<?php

namespace app\controllers;

use yii\caching\MemCache;
use yii\db\Exception;
use yii\redis\Connection;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $mysqlStatus = 'success';
        $redisStatus = 'success';
        $memcacheStatus = 'success';

        try {
            \Yii::$app->db->open();
        } catch (\Exception $e) {
            $mysqlStatus = 'failure';
        }

        try {
            /** @var Connection $redis */
            $redis = \Yii::$app->redis;
            $redis->open();
        } catch (\Exception $e) {
            $redisStatus = 'failure';
        }

        try {
            /** @var MemCache $memcahce */
            $memcahce = \Yii::$app->memcache;

            $now = time();
            $memcahce->set("now", $now);
            $nowCache = $memcahce->get("now");
            if ($now !== $nowCache) {
                throw new Exception("xx");
            }
        } catch (\Exception $e) {
            $memcacheStatus = 'failure';
        }


        $html = <<<HTML
<html>
<body>
    中间件状态:<br/>
    <ul>
        <li>MySQL状态：$mysqlStatus<br/></li>
        <li>Redis状态: $redisStatus<br/></li>
        <li>MemCache状态: $memcacheStatus<br/></li>
    </ul>
</body>
</html>
HTML;

        echo $html;
        exit;
    }

}