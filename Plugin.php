<?php namespace GemFourMedia\GCover;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'gemfourmedia.gcover::lang.plugin.name',
            'description' => 'gemfourmedia.gcover::lang.plugin.description',
            'author' => 'Gem Four Media',
            'icon' => 'oc-icon-image',
            'homepage' => 'https://gemfourmedia.com/wintercms/plugin-gcover'
        ];
    }

    public function registerComponents()
    {
    	return [
    		'GemFourMedia\GCover\Components\CoverItem' => 'coverItem',
    	];
    }

    public function registerSettings()
    {
    }

    public function registerPermissions()
    {
        return [
            'gemfourmedia.gcover.access' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.access'
            ],
            'gemfourmedia.gcover.access_setting' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.access_setting'
            ],
            'gemfourmedia.gcover.item.create' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.item.create'
            ],
            'gemfourmedia.gcover.item.update' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.item.update'
            ],
            'gemfourmedia.gcover.item.delete' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.item.delete'
            ],
            'gemfourmedia.gcover.item.manage' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.item.manage'
            ],
            'gemfourmedia.gcover.item.setting' => [
                'tab' => 'gemfourmedia.gcover::lang.plugin.name',
                'label' => 'gemfourmedia.gcover::lang.permissions.item.setting'
            ]
        ];
    }
    
    public function registerNavigation()
    {
        return [
            'cover-main-menu' => [
                'label' => 'gemfourmedia.gcover::lang.plugin.name',
                'url' => Backend::url('gemfourmedia/gcover/cover'),
                'icon' => 'icon-image',
                'permissions' => ['gemfourmedia.gcover.access'],
            ]
        ];
    }
}
