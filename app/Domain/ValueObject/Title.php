<?php

namespace App\Domain\ValueObject;

use http\Exception\InvalidArgumentException;

class Title
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->isNameValid($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function isNameValid(string $title): void
    {
        if (empty($title)) {
            throw new InvalidArgumentException("Пустое имя");
        }

        $minLength = 5;
        $maxLength = 100;
        if (mb_strlen($title) < $minLength || mb_strlen($title) > $maxLength) {
            throw new InvalidArgumentException("Имя новости должно находиться в пределах от 5 до 100 символов");
        }
    }


}
