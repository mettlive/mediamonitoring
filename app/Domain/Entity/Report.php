<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\File;

class Report
{

    public function __construct(
        private File $value
    )
    {
    }

    public function getValue(): File
    {
        return $this->value;
    }


}
