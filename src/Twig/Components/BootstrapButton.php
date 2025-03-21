<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class BootstrapButton
{
    public string $text;
    public string $strType = "";

    public function mount(string $type = 'primary', bool $isOutlined = false): void
    {
        if($isOutlined) {
            $this->strType .= "outline-";
        }

        $this->strType .= $type;
    }
}
