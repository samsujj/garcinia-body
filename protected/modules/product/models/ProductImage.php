<?php

/**
* This is the model class for table "product_image".
*
* The followings are the available columns in table 'product_image':
* @property integer $id
* @property integer $product_id
* @property string $product_name
* @property integer $is_main
*/
class ProductImage extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'product_image';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('product_id, is_main', 'numerical', 'integerOnly'=>true),
        array('image_name', 'length', 'max'=>255),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, product_id, image_name, is_main', 'safe', 'on'=>'search'),
        );
    }

    /**
    * @return array relational rules.
    */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
        return array(
        'id' => 'ID',
        'product_id' => 'Product',
        'image_name' => 'Image',
        'is_main' => 'Is Main',
        );
    }

    /**
    * Retrieves a list of models based on the current search/filter conditions.
    *
    * Typical usecase:
    * - Initialize the model fields with values from filter form.
    * - Execute this method to get CActiveDataProvider instance which will filter
    * models according to data in model fields.
    * - Pass data provider to CGridView, CListView or any similar widget.
    *
    * @return CActiveDataProvider the data provider that can return the models
    * based on the search/filter conditions.
    */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('product_id',$this->product_id);
        $criteria->compare('image_name',$this->product_name,true);
        $criteria->compare('is_main',$this->is_main);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return ProductImage the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function imageSave($pro_id=0,$image1){

        foreach($image1 as $image){
            $this->id =null;
            $this->isNewRecord =true;

            $this->product_id = $pro_id;
            $this->image_name = $image;

            $this->save();
        }
    }

    public function fecthImage($id=0){
        if($id > 0){
            $res = $this->findAll('product_id = '.$id);
        }else{
            $res = $this->findAll();
        }
        return $res;
    }
    
    
    public function getImage($id=0){
        $criteria=new CDbCriteria;

        
        $criteria->condition = 'product_id ='.$id;
        $criteria->together = true;

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination'=>false
        ));
    }


}
