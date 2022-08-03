<?php
/**
 * Função para formatação da STRING(texto) para uso na URL.
 * 
 * @param string $text Espera um texto para formatar no padrão slugify (url amigável);
 * @param string $divider Aqui você pode escolher o tipo de divisor, caso não escolha por padrão é '-';
 * @return string Retorna a string formatada.
 */
function slugify($text, string $divider = '-') {

    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
