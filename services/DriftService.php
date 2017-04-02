<?php
/**
 * Drift plugin for Craft CMS
 *
 * Drift Service
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Drift
 * @since     1.0.0
 */

namespace Craft;

class DriftService extends BaseApplicationComponent
{
    protected $settings;

    public function init ()
    {
        parent::init();
        $plugin         = craft()->plugins->getPlugin('drift');
        $this->settings = $plugin->getSettings();
    }

    public function getWidgetCode ($settings = [ ])
    {
        $oldPath = craft()->templates->getTemplatesPath();
        $trackingCode  = $this->settings['trackingCode'];

        if ( empty($trackingCode) ) {
            return null;
        }

        $widget = null;

        craft()->templates->setTemplatesPath(CRAFT_PLUGINS_PATH . 'drift/templates/');

        try {
            $widget = craft()->templates->render('Drift_Widget', array(
                'trackingCode' => $trackingCode,
            ));
        }
        catch (\Exception $e) {
            DriftPlugin::log('Couldn\'t render Drift widget: ' . $e->getMessage(), LogLevel::Error);
        }

        craft()->templates->setTemplatesPath($oldPath);

        return $widget;
    }

}