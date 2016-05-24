<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "yorum".
 *
 * @property integer $ID
 * @property integer $makaleid
 * @property string $yorum
 *
 * @property Article $makale
 */
class Yorum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yorum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['makaleid', 'yorum'], 'required'],
            [['makaleid'], 'integer'],
            [['yorum'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'makaleid' => 'Makaleid',
            'yorum' => 'Yorum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMakale()
    {
        return $this->hasOne(Article::className(), ['id' => 'makaleid']);
    }
}
