<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $author_name
 * @property string $article_name
 * @property string $category
 * @property string $content
 *
 * @property Yorum[] $yorums
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name', 'article_name', 'category', 'content'], 'required'],
            [['author_name', 'article_name', 'category'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Author Name',
            'article_name' => 'Article Name',
            'category' => 'Category',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYorums()
    {
        return $this->hasMany(Yorum::className(), ['makaleid' => 'id']);
    }
}
