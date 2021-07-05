<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[leads]].
 *
 * @see leads
 */
class LeadsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return leads[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return leads|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
