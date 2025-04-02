<?php

namespace App\Services\Puzzle;

use App\DTO\CellState;
use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\Subject;
use Illuminate\Support\Collection;

class TableCellResolver
{
    public function resolveCell(
        Subject     $subject,
        Attribute   $attribute,
        ?Subject    $selectedSubject,
        ?Attribute  $selectedAttribute,
        ?Collection $progress
    ): CellState
    {
        $isSelectedCell = isset($selectedSubject, $selectedAttribute)
            && ($selectedSubject->id === $subject->id)
            && ($selectedAttribute->id === $attribute->id);

        $isSelectedRow = isset($selectedSubject) && !isset($selectedAttribute)
            && ($selectedSubject->id === $subject->id);

        $value = null;

        if ($progress?->has($subject->id . '_' . $attribute->id)) {
            $attributeValueId = $progress[$subject->id . '_' . $attribute->id]->attribute_value_id;
            $value = $attribute->values->firstWhere('id', $attributeValueId)?->value;
        }

        return new CellState(
            isSelectedCell: $isSelectedCell,
            isSelectedRow: $isSelectedRow,
            value: $value
        );
    }
}
