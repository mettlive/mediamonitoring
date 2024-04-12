<?php

namespace App\Domain\ValueObject;


use InvalidArgumentException;

class URL
{
    private string $value;
    public function __construct(string $value)
    {
        $this->isURLValid($value);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    private function isURLValid(string $url): void
    {
        // Валидация URL
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException("URL is not valid.");
        }
    }
}
