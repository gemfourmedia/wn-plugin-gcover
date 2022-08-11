<?php namespace GemFourMedia\GCover\Models;

use Model;

/**
 * Model
 */
class Media extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        '@Winter.Translate.Behaviors.TranslatableModel',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gemfourmedia_cover_media';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'max:255',
        'subtitle' => 'max:255',
        'desc' => 'max:65535',
        'embed' => 'max:65535'
    ];

    protected $jsonable = ['params'];

    public $translatable = [
        'title',
        'subtitle',
        'desc',
        'embed',
    ];

    /**
     * Relationships
     * ===
     */
    public $belongsTo = [
        'cover' => ['GemFourMedia\GCover\Models\Cover'],
    ];

    public $attachOne = [
        'image' => ['System\Models\File'],
        'video' => ['System\Models\File'],
    ];
}
