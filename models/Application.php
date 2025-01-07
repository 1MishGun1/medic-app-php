<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $doctor_id
 * @property int|null $complaints_id
 * @property string $description
 * @property string|null $comment
 * @property int $user_id
 * @property int $status_id
 * @property string $create_at
 * @property string|null $comment_admin
 * @property string $date
 * @property string $time
 *
 * @property Complaint $complaints
 * @property Doctor $doctor
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{

    public bool $check = false;

    const SCENARIO_COMMENT = 'comment';
    const SCENARIO_COMPLAINT = 'complaint';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'description', 'user_id', 'status_id', 'date', 'time'], 'required'],
            [['doctor_id', 'complaints_id', 'user_id', 'status_id'], 'integer'],
            [['description', 'comment_admin'], 'string'],
            [['create_at', 'date', 'time'], 'safe'],
            ['check', 'boolean'],
            [['comment'], 'string', 'max' => 255],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::class, 'targetAttribute' => ['doctor_id' => 'id']],
            [['complaints_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complaint::class, 'targetAttribute' => ['complaints_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],

            ['complaints_id', 'required', 'on' => self::SCENARIO_COMPLAINT],
            ['comment', 'required', 'on' => self::SCENARIO_COMMENT],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заявку',
            'doctor_id' => 'ФИО доктора',
            'complaints_id' => 'Жалобы',
            'description' => 'Описание',
            'check' => 'Своя жалоба',
            'comment' => 'Своя далоба',
            'user_id' => 'Пользователь',
            'status_id' => 'Статус',
            'create_at' => 'Время создание',
            'comment_admin' => 'Причина отмены',
            'date' => 'Желаемая дата',
            'time' => 'Желакемое время',
        ];
    }

    /**
     * Gets query for [[Complaints]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplaints()
    {
        return $this->hasOne(Complaint::class, ['id' => 'complaints_id']);
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}