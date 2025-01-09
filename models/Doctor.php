<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property string $name
 * @property int $experience
 * @property string $education
 * @property string $specialization
 * @property string $img
 *
 * @property Application[] $applications
 */
class Doctor extends \yii\db\ActiveRecord
{

    public $imageFile;
    const NO_IMG = 'no-img.png';

    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'education', 'specialization'], 'required'],
            [['experience'], 'integer'],
            [['name', 'education', 'specialization', 'img'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер врача',
            'name' => 'ФИО врача',
            'experience' => 'Опыт работы',
            'education' => 'Образование',
            'specialization' => 'Специализация',
            'img' => 'Фото',
            'imageFile' => 'Фото'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = Yii::$app->user->id
                        . '_'
                        . time()
                        . '_'
                        . Yii::$app->security->generateRandomString()
                        . '.'
                        . $this->imageFile->extension;
            $this->imageFile->saveAs('img/' . $fileName);
            $this->img = $fileName;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['doctor_id' => 'id']);
    }

    public static function getDoctorName()
    {
        return (new Query())
                    ->select('name')
                    ->from(self::tableName())
                    ->indexBy('id')
                    ->column();
    }
}
