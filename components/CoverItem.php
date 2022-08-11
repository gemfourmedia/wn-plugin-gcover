<?php namespace GemFourMedia\GCover\Components;

use Cms\Classes\ComponentBase;
use GemFourMedia\GCover\Models\Cover as CoverModel;

class CoverItem extends ComponentBase
{
    public $item;

    public function componentDetails()
    {
        return [
            'name'        => 'gemfourmedia.gcover::lang.components.coverItem.name',
            'description' => 'gemfourmedia.gcover::lang.components.coverItem.desc'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->item = $this->loadItem();
    }

    public function onRender()
    {
        if (!$this->item) {
            $this->item = $this->loadItem();
        }
    }

    public function loadItem()
    {
        $page = $this->page->id;

        if (!$page) return;
        $item = CoverModel::with('mediaItems')->where('page', $page)->published()->first();

        return $item ?? null;
    }
}
