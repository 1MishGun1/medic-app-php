<?php

namespace app\models;

use Yii;
use app\models\Role;
use app\models\User;
use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public string $name = '';
    public string $login = '';
    public string $email = '';
    public string $passport = '';
    public string $policy = '';
    public string $password = '';
    public string $password_repeat = '';
    public string $phone = '';

    public function rules()
    {
        return [
            [['name', 'login', 'email', 'passport', 'policy', 'password', 'phone'], 'required'],
            [['name', 'login', 'email', 'passport', 'policy', 'password', 'phone'], 'string', 'max' => 255],

            ['name', 'match', 'pattern' => '/^[а-яё\s\-]+$/ui', 'message' => 'Кирилица, тире, пробелы'],

            [['login', 'email'], 'unique', 'targetClass' => User::class],

            ['login', 'match', 'pattern' => '/^[a-z\d\-]+$/ui', 'message' => 'Латиница, тире, цифры'],

            ['email', 'email'],

            ['passport', 'match', 'pattern' => '/^[\d]{4}\s[\d]{6}$/', 'message' => 'Только формат ХХХХ ХХХХХХ'],

            ['policy', 'match', 'pattern' => '/^[\d]{4}\s[\d]{4}\s[\d]{4}\s[\d]{4}$/', 'message' => 'Только формат ХХХХ ХХХХ ХХХХ ХХХХ'],

            ['password', 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).+$/', 'message' => 'Минимум 1 заглавная буква, 1 маленькая буква, 1 цифра'],

            ['password_repeat', 'compare', 'compareAttribute' => 'password'],

            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}\-[\d]{2}\-[\d]{2}$/', 'message' => 'Только формат +7(XXX)-XXX-XX-XX'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Эл. почта',
            'passport' => 'Серия и номер паспорта',
            'policy' => 'Номер полиса',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'phone' => 'Телефон',
        ];
    }

    public function userRegister(): object|false
    {
        if ($this->validate()) {
            $user = new User();
            $user->load($this->attributes, '');
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role_id = Role::getRoleId('user');

            if (!$user->save()) {
                VarDumper::dump($user->errors, 10, true); die;
            }
        }
        return $user ?? false;
    }
}