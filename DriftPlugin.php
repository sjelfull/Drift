<?php
/**
 * Drift plugin for Craft CMS
 *
 * Integrate Drift.com with Craft
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Drift
 * @since     1.0.0
 */

namespace Craft;

class DriftPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init ()
    {
        parent::init();

        craft()->templates->hook('drift', function (&$context) {
            if ( craft()->request->isSiteRequest() ) {
                $settings = isset($context['driftSettings']) ? $context['driftSettings'] : array();

                $widget = craft()->drift->getWidgetCode($settings);

                return $widget;
            }
        });
    }

    /**
     * @return mixed
     */
    public function getName ()
    {
        return Craft::t('Drift');
    }

    /**
     * @return mixed
     */
    public function getDescription ()
    {
        return Craft::t('Integrate Drift.com with Craft');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl ()
    {
        return 'https://github.com/sjelfull/Drift/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl ()
    {
        return 'https://raw.githubusercontent.com/sjelfull/Drift/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion ()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion ()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper ()
    {
        return 'Superbig';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl ()
    {
        return 'https://superbig.co';
    }

    /**
     * @return array
     */
    protected function defineSettings ()
    {
        return array(
            'trackingCode' => array( AttributeType::String, 'label' => 'Tracking code', 'default' => '' ),
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml ()
    {
        return craft()->templates->render('drift/Drift_Settings', array(
            'settings' => $this->getSettings()
        ));
    }

}