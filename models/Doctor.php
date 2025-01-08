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
    /**
     * {@inheritdoc}
     */
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
            [['name', 'education', 'specialization', 'img'], 'required'],
            [['experience'], 'integer'],
            [['name', 'education', 'specialization', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'experience' => 'Experience',
            'education' => 'Education',
            'specialization' => 'Specialization',
            'img' => 'Img',
        ];
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
