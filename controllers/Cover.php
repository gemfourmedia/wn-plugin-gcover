<?php namespace GemFourMedia\GCover\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;

class Cover extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';


    public $requiredPermissions = [
        'gemfourmedia.gcover.item.create',
        'gemfourmedia.gcover.item.update',
        'gemfourmedia.gcover.item.setting',
        'gemfourmedia.gcover.item.delete',
        'gemfourmedia.gcover.item.manage'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('gemfourmedia.gcover', 'cover-main-menu');
    }


    public function formExtendFields($form)
    {
        $backendUser = BackendAuth::getUser();
        $isSuperUser = $backendUser->is_superuser;

        $fieldsToRemove = $this->formGetWidget()
                            ->getTab('primary')
                            ->fields['gemfourmedia.gcover::lang.item.fields.params.label'];


        if (!$this->user->hasPermission(['gemfourmedia.gcover.item.setting']) && !$isSuperUser) {
            foreach ($fieldsToRemove as $fieldToRemove) {
                $form->removeField($fieldToRemove->fieldName);
            }
        }
    }
}
