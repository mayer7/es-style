<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id
 * @property string $img
 * @property integer $article
 * @property string $title
 * @property string $description
 * @property integer $is_show
 * @property integer $is_available
 * @property string $date_create
 * @property integer $is_new
 * @property integer $price
 * @property string $category
 * @property integer $is_sale
 * @property integer $sale
 * @property integer $new_price
 * @property integer $old_price
 * @property integer $size
 * @property string $sizes
 * @property integer $size_42
 * @property integer $size_44
 * @property integer $size_46
 * @property integer $size_48
 * @property integer $size_50
 * @property integer $size_52
 * @property integer $size_54
 * @property integer $size_at
 * @property integer $size_to
 * @property integer $weight
 */
class Photo extends CActiveRecord
{
    public $image;
    public $imageHeight = 480;
    public $imageWidth = 360;
    public $originalHeight = 1600;
    public $originalWidth = 1200;
    public $previewHeight = 300;
    public $previewWidth = 225;
    public $is_show = true;
    public $is_available = true;
    public $is_new = true;
    public $size = true;
    public $weight = 300;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('article, weight, is_show, is_available, is_new, price, is_sale, sale, new_price, old_price, size, size_40, size_42, size_44, size_46, size_48, size_50, size_52, size_54, size_at, size_to', 'numerical', 'integerOnly'=>true),
            array('img, title, category, sizes', 'length', 'max'=>255),
            array('description, date_create', 'safe'),
            array('article, is_show, is_available, is_new, price, category, is_sale, sizes', 'safe', 'on'=>'search'),
            array('date_create','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true,'on'=>'insert,update'),
            array('category, title, article, weight, price', 'required', 'message'=>'Это поле необходимо заполнить.'),
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
			'img' => 'Фото',
            'image' => 'Фото',
			'category' => 'Категория',
			'article' => 'Артикул',
            'weight' => 'Вес',
			'price' => 'Цена',
			'title' => 'Название',
			'description' => 'Описание',
            'is_show' => 'Отображать',
            'is_available' => 'В наличии',
            'is_new' => 'Новинка',
			'date_create' => 'Дата добавления',
            'is_sale' => 'Скидка',
            'sale' => 'Процент скидки',
            'new_price' => 'Новая цена',
            'old_price' => 'Старая цена',
            'size' => 'Имеет размеры',
            'sizes' => 'Размеры',
            'size_40' => '40',
            'size_42' => '42',
            'size_44' => '44',
            'size_46' => '46',
            'size_48' => '48',
            'size_50' => '50',
            'size_52' => '52',
            'size_54' => '54',
            'size_at' => 'Размер от',
            'size_to' => 'Размер до',
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
		$criteria=new CDbCriteria;
		$criteria->compare('category',$this->category);
		$criteria->compare('article',$this->article);
		$criteria->compare('price',$this->price,true);
        $criteria->compare('is_show',$this->is_show);
        $criteria->compare('is_available',$this->is_available);
        $criteria->compare('is_new',$this->is_new);
        $criteria->compare('is_sale',$this->is_sale);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>'10',
            ),
            'sort'=>array(
                'defaultOrder'=>'date_create DESC',
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if(!parent::beforeSave())
            return false;
        if($this->is_sale){
            $this->price = $this->new_price;
        }
        if(($this->scenario=='insert' || $this->scenario=='update') && ($image=CUploadedFile::getInstance($this,'image'))){
            $this->deleteImage();
            $this->img=$image->name;
            $image->saveAs(Yii::getPathOfAlias('data.photo.original').DIRECTORY_SEPARATOR.$image->name);
            $this->prepareImage();
        }
        return true;
    }

    protected function beforeDelete(){
        if(!parent::beforeDelete())
            return false;
        $this->deleteImage();
        return true;
    }

    public function deleteImage(){
        $imageOrigPath=Yii::getPathOfAlias('data.photo.original').DIRECTORY_SEPARATOR.$this->img;
        if(is_file($imageOrigPath))
            unlink($imageOrigPath);
        $imagePath=Yii::getPathOfAlias('data.photo').DIRECTORY_SEPARATOR.$this->img;
        if(is_file($imagePath))
            unlink($imagePath);
        $this->deletePreview();
    }

    private function deletePreview(){
        $imagePreviewPath=Yii::getPathOfAlias('data.photo.preview').DIRECTORY_SEPARATOR.'p_'.$this->img;
        if(is_file($imagePreviewPath))
            unlink($imagePreviewPath);
    }

    public function prepareImage(){
        $this->createPreview();
        Yii::app()->image
            ->load(Yii::getPathOfAlias('data.photo.original').DIRECTORY_SEPARATOR.$this->img)
            ->resize($this->originalWidth, $this->originalHeight)
            ->save(Yii::getPathOfAlias('data.photo.original').DIRECTORY_SEPARATOR.$this->img)
            ->resize($this->imageWidth, $this->imageHeight)
            //->watermark($this->getWatermarkPath(), 0, 0)
            ->save(Yii::getPathOfAlias('data.photo').DIRECTORY_SEPARATOR.$this->img);
    }

    private function createPreview(){
        Yii::app()->image
            ->load(Yii::getPathOfAlias('data.photo.original').DIRECTORY_SEPARATOR.$this->img)
            ->resize($this->previewWidth, $this->previewHeight);
        Yii::app()->image->save(Yii::getPathOfAlias('data.photo.preview').DIRECTORY_SEPARATOR.'p_'.$this->img);
    }

    public function getImageUrl()
    {
        return Yii::app()->getBaseUrl().'/data/photo/'.$this->img;
    }

    public function getFullImageUrl()
    {
        return Yii::app()->params['domain'].'/data/photo/'.$this->img;
    }

    public function getPreviewUrl()
    {
        return Yii::app()->getBaseUrl().'/data/photo/preview/p_'.$this->img;
    }

    public function getFullPreviewUrl()
    {
        return Yii::app()->params['domain'].'/data/photo/preview/p_'.$this->img;
    }

    public function getOriginalUrl()
    {
        return Yii::app()->getBaseUrl().'/data/photo/original/'.$this->img;
    }

    public function getFullOriginalUrl()
    {
        return Yii::app()->params['domain'].'/data/photo/original/'.$this->img;
    }

    public static function getWatermarkPath()
    {
        return Yii::getPathOfAlias('root.protected.data').DIRECTORY_SEPARATOR.'watermark.png';
    }

    public function getPhotos($category, $order_str = 'по артиклю', $sizes = 'все', $colors = 'все'){
        $criteria = new CDbCriteria();
        switch($order_str) {
            case 'по новинкам':
                $criteria->order = 'is_available DESC, is_new  DESC';
                break;
            case 'по артиклю':
                $criteria->order = 'article';
                break;
            case 'по возрастанию цены':
                $criteria->order = 'is_available DESC, price';
                break;
            case 'по убыванию цены':
                $criteria->order = 'is_available DESC, price DESC';
                break;
            case 'по скидкам':
                $criteria->order = 'is_available DESC, is_sale DESC, sale DESC';
                break;
        }
        $criteria->compare('is_show', 1);
        $criteria->compare('category', $category);

        if ($sizes != 'все') {
            $criteriaS = new CDbCriteria();
            $sizesArr = explode(",", $sizes);
            foreach ($sizesArr as $size) {
                $criteriaWS = new CDbCriteria();
                $criteriaWUS = new CDbCriteria();
                $criteriaWS->compare('size', 1);
                $criteriaWS->addSearchCondition('sizes', $size);
                $criteriaWUS->compare('size', 0);
                $criteriaWUS->compare('size_at', '<='.$size);
                $criteriaWUS->compare('size_to', '>='.$size);
                $criteriaWS->mergeWith($criteriaWUS, 'OR');
                $criteriaS->mergeWith($criteriaWS, 'OR');
            }
            $criteria->mergeWith($criteriaS);
        }
        if ($colors != 'все') {
            $criteria_colors = new CDbCriteria();
            $colorsArr = explode(",", $colors);
            foreach ($colorsArr as $color) {
                $criteria_colors->addSearchCondition('color', $color, true, 'OR');
            }
            $criteria->mergeWith($criteria_colors);
        }
        return $this->findAll($criteria);
    }

    public function getOrderList($type){
        $res = array(
            array('label'=>'по артиклю'),
            array('label'=>'по возрастанию цены'),
            array('label'=>'по убыванию цены'),
        );
        $new = $this->findAllByAttributes(
            array('is_show' => 1, 'category' => $type, 'is_new' => 1)
        );
        if(!empty($new))
            array_push($res, array('label'=>'по новинкам'));
        $sale = $this->findAllByAttributes(
            array('is_show' => 1, 'category' => $type, 'is_sale' => 1)
        );
        if(!empty($sale))
            array_push($res, array('label'=>'по скидкам'));
        return $res;
    }

    public function getSizes(){
        $sizes = [];
        $sizes['all']['label'] = 'все';
        for ($i=40; $i<= 60; $i+=2) {
            $sizes[$i]['label'] = $i;
        }
        return $sizes;
    }

    public function getColors(){
        $colors = [];
        $colors['all']['label'] = 'все';
        foreach (Yii::app()->params['colors'] as $color => $name) {
            $colors[$color]['label'] = $name;
        }
        return $colors;
    }

    public function getNewPhotos(){
        return $this->findAllByAttributes([
            'is_show'=>1,
            'is_new'=>1,
            'is_available'=>1,
        ], ['limit' => Yii::app()->params['newPhotoCountInMail']]);
    }
    
    public function getArticlesByCategory($category){
        $model = $this->findAllByAttributes([
            'category'=>$category,
            ]);
        $articles = [];
        foreach ($model as $item) {
            $articles[$item->id] = $item->article;
        }
        return $articles;
    }

    public function getSizesByArticle($article){
        $model = $this->findByAttributes([
            'article'=>$article,
        ]);
        return $this->prepareSizes($model);
    }

    public function getSizesById($id){
        $model = $this->findByPk($id);
        return $this->prepareSizes($model);
    }

    private function prepareSizes($model){
        $sizes = [];
        if ($model->size) {
            if ($model->size_40)
                $sizes['40'] = '40';
            if ($model->size_42)
                $sizes['42'] = '42';
            if ($model->size_44)
                $sizes['44'] = '44';
            if ($model->size_46)
                $sizes['46'] = '46';
            if ($model->size_48)
                $sizes['48'] = '48';
            if ($model->size_50)
                $sizes['50'] = '50';
            if ($model->size_52)
                $sizes['52'] = '52';
            if ($model->size_54)
                $sizes['54'] = '54';
        } else {
            $size = $model->size_at . " - " . $model->size_to;
            $sizes[$size] = $size;
        }
        return $sizes;
    }
}
