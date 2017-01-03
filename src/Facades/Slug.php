<?php
namespace Pantagruel964\Laravel5YandexSlug\Facades;

use Illuminate\Support\Facades\Facade;

class SlugFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'slug';
    }
}
