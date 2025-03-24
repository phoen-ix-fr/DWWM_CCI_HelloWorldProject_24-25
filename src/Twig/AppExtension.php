<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // Nom côté TWIG : custom_capitalize
            // Qui pointe vers la méthode $this->customCapitalize
            new TwigFilter('custom_capitalize',
                [$this, 'customCapitalize']
            ),
        ];
    }

    /**
     * Alterne les majuscules et les minuscules sur une chaine de caractères fournie en paramètre
     * 
     * @param string $input Chaine de caractère à modifier
     * 
     * @return string Chaine de caractère dont les majuscules et les minuscules sont alternées
     */
    public function customCapitalize(string $input): string
    {
        // On met tout en minscule pour débuter
        $output = strtolower($input);
        $arrOutput = str_split($output);    //< Nécessaire car on utilise un foreach qui n'accepte que des tableaux
        
        $flag = false;                      //< Flag nous indiquant si un espace était présent précédement ou non

        foreach($arrOutput as $key => $value)
        {
            if($output[$key] === ' ')
            {
                $flag = !$flag;
            }
            else 
            {
                // Si mon index est pair
                //if(($flag && $key % 2 != 0) || (!$flag && $key % 2 == 0) ) {
                if($flag)
                {
                    // tu as eu un espace avant
                    if($key % 2 != 0) {
                        // Je met en majuscule
                        $output[$key] = strtoupper($output[$key]);
                    }
                }
                else 
                {
                    // tu n'as pas eu un espace avant
                    if($key % 2 == 0) {
                        // Je met en majuscule
                        $output[$key] = strtoupper($output[$key]);
                    }
                }
            }
        }

        return $output;
    }
}