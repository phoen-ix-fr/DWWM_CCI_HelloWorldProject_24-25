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

    public function customCapitalize(string $input): string
    {
        $output = strtolower($input);
        $arrOutput = str_split($output);
        $flag = false;

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