<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $message
 * @property integer $permissions
 * @property integer $created_at
 * @property integer $updated_at
 */
class Status extends \yii\db\ActiveRecord
{
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20; 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'id' => Yii::t('app', 'ID'),
          'message' => Yii::t('app', 'Message'),
          'permissions' => Yii::t('app', 'Permissions'),
          'created_at' => Yii::t('app', 'Created At'),
          'updated_at' => Yii::t('app', 'Updated At'),  
        ];
    }


    public function getPermissions() 
    {
      return array (self::PERMISSIONS_PRIVATE=>'Private', self::PERMISSIONS_PUBLIC=>'Public');
    }
     
    public function getPermissionsLabel($permissions) 
    {
      if ($permissions == self::PERMISSIONS_PUBLIC) 
      {
        return 'Public';
      } else {
        return 'Private';        
      }
    }
}
