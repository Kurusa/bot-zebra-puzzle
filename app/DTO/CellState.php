<?php

namespace App\DTO;

class CellState
{
    public function __construct(
        public readonly bool    $isSelectedCell,
        public readonly bool    $isSelectedRow,
        public readonly ?string $value
    )
    {
    }

    public function display(): string
    {
        if ($this->isSelectedCell) {
            return '...';
        }

        if ($this->isSelectedRow && $this->value === null) {
            return '...';
        }

        return $this->value ?? '?';
    }
}
