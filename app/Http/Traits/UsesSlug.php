<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UsesSlug
{
    protected static function bootUsesSlug()
    {
        static::creating(function ($model) {
            // produce a slug based on the activity title
            $slug = \Str::slug($model->name);

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
