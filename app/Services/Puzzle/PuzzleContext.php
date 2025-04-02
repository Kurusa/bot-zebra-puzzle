<?php

namespace App\Services\Puzzle;

use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use Illuminate\Support\Collection;

class PuzzleContext
{
    public ?Puzzle $puzzle = null;
    public ?Collection $progress = null;
    public ?Subject $selectedSubject = null;
    public ?Attribute $selectedAttribute = null;

    public function setPuzzle(Puzzle $puzzle): void
    {
        $this->puzzle = $puzzle;
    }

    public function setProgress(Collection $progress): void
    {
        $this->progress = $progress;
    }

    public function setSelectedSubject(?Subject $subject): void
    {
        $this->selectedSubject = $subject;
    }

    public function setSelectedAttribute(?Attribute $attribute): void
    {
        $this->selectedAttribute = $attribute;
    }
}
