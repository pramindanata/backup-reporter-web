<?php
namespace App\DTO;

abstract class BaseDTO
{
    protected array $data;

    public function toArray(): array
    {
        return $this->data;
    }

    public function toJSON(): string
    {
        return json_encode($this->data);
    }
}
