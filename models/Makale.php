<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "makale".
 *
 * @property integer $ID
 * @property string $Ad
 * @property string $Konu
 * @property string $Metin
 * @property string $Etiket
 */
class Makale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'makale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ad', 'Konu', 'Metin', 'Etiket'], 'required'],
            [['Konu', 'Metin'], 'string'],
            [['Ad', 'Etiket'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Ad' => 'Ad',
            'Konu' => 'Konu',
            'Metin' => 'Metin',
            'Etiket' => 'Etiket',
        ];
    }
}
