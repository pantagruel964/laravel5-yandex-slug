<?php

namespace Pantagruel964\Laravel5YandexSlug;

class Slug
{
    /**
     * Generate slug into translit in according to Yandex rules.
     *
     * @param string $title
     * @param string $separator
     *
     * @return string
     */
    public function make($title, $separator = '-')
    {
        $charsArray = [
            'А' => 'A',
            'а' => 'a',
            'Б' => 'B',
            'б' => 'b',
            'В' => 'V',
            'в' => 'v',
            'Г' => 'G',
            'г' => 'g',
            'Д' => 'D',
            'д' => 'd',
            'Е' => 'E',
            'е' => 'e',
            'Ё' => 'YO',
            'ё' => 'yo',
            'Ж' => 'ZH',
            'ж' => 'zh',
            'З' => 'Z',
            'з' => 'z',
            'И' => 'I',
            'и' => 'i',
            'Й' => 'J',
            'й' => 'j',
            'К' => 'K',
            'к' => 'k',
            'Л' => 'L',
            'л' => 'l',
            'М' => 'M',
            'м' => 'm',
            'Н' => 'N',
            'н' => 'n',
            'О' => 'O',
            'о' => 'o',
            'П' => 'P',
            'п' => 'p',
            'Р' => 'R',
            'р' => 'r',
            'С' => 'S',
            'с' => 's',
            'Т' => 'T',
            'т' => 't',
            'У' => 'U',
            'у' => 'u',
            'Ф' => 'F',
            'ф' => 'f',
            'Х' => 'H',
            'х' => 'h',
            'Ц' => 'C',
            'ц' => 'c',
            'Ч' => 'CH',
            'ч' => 'ch',
            'Ш' => 'SH',
            'ш' => 'sh',
            'Щ' => 'SHCH',
            'щ' => 'shch',
            'Ъ' => '',
            'ъ' => '',
            'Ы' => 'Y',
            'ы' => 'y',
            'Ь' => '',
            'ь' => '',
            'Э' => 'E',
            'э' => 'e',
            'Ю' => 'YU',
            'ю' => 'yu',
            'Я' => 'YA',
            'я' => 'ya'
        ];

        foreach ($charsArray as $from => $to) {
            $title = mb_eregi_replace($from, $to, $title);
        }

        $pattern = '![^' . preg_quote($separator) . '\pL\pN\s]+!u';
        $title   = preg_replace($pattern, '', mb_strtolower($title));

        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
