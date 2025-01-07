<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "complaint".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Complaint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complaint';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['complaints_id' => 'id']);
    }

    public static function getComplaintTitle()
    {
        return (new Query())
                    ->select('title')
                    ->from(self::tableName())
                    ->indexBy('id')
                    ->column();
    }
}
