<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace anteo\blankon\widgets;

use yii\helpers\Html;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->session->setFlash('error', 'This is the message');
 * \Yii::$app->session->setFlash('success', 'This is the message');
 * \Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Alert extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        'error' => [
            'type' => 'alert-danger',
            'icon' => 'glyphicon glyphicon-remove-sign',
        ],
        'danger' => [
            'type' => 'alert-danger',
            'icon' => 'glyphicon glyphicon-remove-sign',
        ],
        'success' => [
            'type' => 'alert-success',
            'icon' => 'glyphicon glyphicon-ok-sign',
        ],
        'info' => [
            'type' => 'alert-info',
            'icon' => 'glyphicon glyphicon-info-sign',
        ],
        'warning' => [
            'type' => 'alert-warning',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
        ]
    ];
    /**
     * @var integer milliseconds before fade. 0 means no fading
     */
    public $delay = 4000;

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->session;
        $flashes = $session->getAllFlashes();
//        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $i => $message) {
                    /* initialize css class for each alert box */
//                    $this->options['class'] = $this->alertTypes[$type] . $appendCss;
//                    if ($this->closeButton !== false) {
//                        Html::addCssClass($this->options, 'alert-dismissible');
//                    }
                    
                    $alertType = $this->alertTypes[$type]['type'];
                    $icon = $this->alertTypes[$type]['icon'];

                    /* assign unique id to each alert box */
                    $this->options['id'] = $this->getId() . '-' . $type . '-' . $i;

                    echo \kartik\alert\Alert::widget([
                        'type' => $alertType,
                        'icon' => $icon,
                        'body' => $message,
                        'closeButton' => $this->closeButton,
                        'options' => $this->options,
                        'delay' => $this->delay
                    ]);
                }

                $session->removeFlash($type);
            }
        }
    }
}
