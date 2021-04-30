<?php

if (!function_exists('nb_produit')) {
    function nb_produit($nb)
    {
        if ($nb > 1) {
            return $nb.' produits';
        } else {
            return $nb.' produit';
        }
    }
}
