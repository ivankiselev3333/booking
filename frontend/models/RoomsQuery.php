<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[rooms]].
 *
 * @see rooms
 */
class RoomsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return rooms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return rooms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
