<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $visible = [
        'quote',
        'quotee',
        'image_url',
        'user'
    ];

    protected $appends = [
            'image_url'
        ];

    /**
     * Get image url
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getImageUrlAttribute()
    {
        return url(config('general.upload_public_path') . $this->getAttribute('image_name'));
    }

    /**
     * Get Quote's User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
