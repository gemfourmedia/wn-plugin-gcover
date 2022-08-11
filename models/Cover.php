<?php namespace GemFourMedia\GCover\Models;

use Model;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;

/**
 * Model
 */
class Cover extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        '@Winter.Translate.Behaviors.TranslatableModel',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gemfourmedia_cover_item';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'max:255',
        'subtitle' => 'max:255',
        'page' => 'required|max:255|unique:gemfourmedia_cover_item',
        'mode' => 'required|max:100',
    ];

    protected $jsonable = ['params', 'content'];

    public $translatable = [
        'title',
        'subtitle',
        'desc',
        'content',
    ];

    /**
     * Relationships
     */
    public $hasMany = [
        'mediaItems' => ['GemFourMedia\GCover\Models\Media', 'order' => 'sort_order'],
    ];

    /**
     * Accessors
     */
    public function getPageOptions() {
        return self::listCoverCmsPages('coverItem');
    }

    public function getCarouselSettingAttribute()
    {
        if (!$this->params) return;
        return array_get($this->params, 'carousel');
    }

    public static function listCoverCmsPages($componentName = '') {
        $theme = Theme::getActiveTheme();

        $pages = CmsPage::listInTheme($theme, true);
        $cmsPages = [];

        foreach ($pages as $page) {
            if (!$page->hasComponent($componentName)) {
                continue;
            }
            $component = $page->getComponent($componentName);
            // if (isset($component) && $component->property('pageFilter')) {
                $cmsPages[$page->id] = $page->title . ' ('.$page->baseFileName.')';
            // }
        }
        return $cmsPages;
    }

    /**
     * Scopes
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published')->where('published', true);
    }
}
