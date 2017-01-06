## Transliterate cyrillic characters in according to Yandex rules for Laravel 5

Laravel 5 has it's own function **str_slug** to revert cyrillic characters into translit. But it is not quite right for Yandex.

For example, if you make your URL like this: `$slug = str_slug('ёлка')` function return result `elka`. It's not good for SEO. Your URL won't be highlighted into the SERP:
![not highlighted into the serp](http://s020.radikal.ru/i723/1701/0b/71788ffcf824.jpg)

The package makes slug characters in according to Yandex rules, in particular such characters as `ё`, `щ`, `я`, `ю`, `ж`, `ц`. As result Yandex will highlight keyword in URL into the SERP
![highlighted into the serp](http://s019.radikal.ru/i633/1701/3c/f849068a7379.jpg)

### Installation

`composer require pantagruel964/laravel5-yandex-slug`

After updating composer, add the service `provider` and `facade` in `config/app.php`

    'providers' => [
    ...
    Pantagruel964\Laravel5YandexSlug\SlugServiceProvider::class
    ...
    ]

    'aliases' => [
    ...
    'Slug' => Pantagruel964\Laravel5YandexSlug\Facades\Slug::class
    ...
    ]
    
### Using

`$slug = Slug::make('ёлка')`

### License

This package for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
