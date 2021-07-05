<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leads".
 *
 * @property int $id
 * @property int $room_id
 * @property string $date_in
 * @property string $date_out
 * @property string $user_name
 * @property string $email
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'date_in', 'date_out', 'user_name', 'email'], 'required'],
            [['date_in', 'date_out'], 'safe'],
            [['user_name', 'email'], 'string', 'max' => 32],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'date_in' => 'Date In',
            'date_out' => 'Date Out',
            'user_name' => 'User Name',
            'email' => 'Email',
        ];
    }

    /**
     * {@inheritdoc}
     * @return leadsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new leadsQuery(get_called_class());
    }
}
