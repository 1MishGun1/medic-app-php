<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // login and password are both required
            [['login', 'password'], 'required'],
            ['login', 'match', 'pattern' => '/^[a-z\d\-]+$/ui', 'message' => 'Латиница, тире, цифры'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['password', 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).+$/', 'message' => 'Минимум 1 заглавная буква, 1 маленькая буква, 1 цифра'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный пароль.');
                Yii::$app->session->setFlash('error', 'Неверные данные для входа!');
            }
        }
    }

    /**
     * Logs in a user using the provided login and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600*24*30);
        }
        return false;
    }

    /**
     * Finds user by [[login]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->login);
        }

        return $this->_user;
    }
}
