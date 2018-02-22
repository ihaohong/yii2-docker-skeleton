<?php

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actionMysql()
    {
        $sql = <<<SQL
INSERT INTO `city` (`name`)
VALUES
	('Los');
SQL;

        \Yii::$app->db->createCommand($sql)->execute();

        echo "this is test";
        exit;
    }

    public function actionRedis()
    {
        $redis = \Yii::$app->redis;

        // 判断 key 为 username 的是否有值，有则打印，没有则赋值
        $key = 'username';
        if ($val = $redis->get($key)) {
            var_dump($val);
        } else {
            $redis->set($key, 'marko');
            $redis->expire($key, 5);
        }

        exit;
    }
}