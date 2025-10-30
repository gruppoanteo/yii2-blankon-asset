<?php
namespace hal\blankon\widgets;

use hal\blankon\BlankonAsset;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Description of Loader
 *
 * @author marco
 */
class Loader extends Widget
{
    const TYPE_GENERAL = 'general';
    const TYPE_FLAT = 'flat';
    
    public $type = self::TYPE_GENERAL;
    
    /**
     * @var integer 
     */
    public $loader = 1;
    
    /**
     * @var integer pixels
     */
    public $size = 20;
    
    public $options = [];

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (!in_array($this->type, [self::TYPE_FLAT, self::TYPE_GENERAL])) {
            throw new \yii\base\InvalidConfigException('type must be a TYPE_* constant');
        }
        if ($this->size !== null) {
            Html::addCssStyle($this->options, ['width' => $this->size . 'px;']);
        }
    }
    
    public function run()
    {
        parent::run();
        $bundle = BlankonAsset::register($this->getView());
        return Html::img($bundle->baseUrl . "/global/img/loader/" . $this->type . "/{$this->loader}.gif", $this->options);
    }
}