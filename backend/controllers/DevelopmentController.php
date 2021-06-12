<?php


namespace backend\controllers;


use common\models\User;
use yii\web\Controller;

class DevelopmentController extends Controller
{
    public function actionUserAdd()
    {
        $username = 'admin';
        $password = '1234';
        $email = 'test_admin@tmweb.ru';

        $user = new User();

        $user->username = $username;
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->password_hash = \Yii::$app->security->generatePasswordHash($password);
        $user->email = $email;
        $user->status = User::STATUS_ACTIVE;

        if ($user->save(false))
            return 'User was success created';

        return 'Error!, user not be created';
    }
}