@php
    $headers = collect([__('texts.subject')])->merge($puzzle->attributes->pluck('name'));
    $subjects = $puzzle->subjects;
    $attributes = $puzzle->attributes;

    $widths = $headers->map(function($header, $index) use ($subjects, $progress, $attributes) {
        if ($index === 0) {
            return max(
                mb_strlen($header),
                $subjects->max(fn($s) => mb_strlen($s->name))
            ) + 2;
        }

        $attribute = $attributes[$index - 1];
        $maxValueLength = $progress
            ->filter(fn($p) => $p->attribute_id === $attribute->id)
            ->map(fn($p) => $attribute->values->firstWhere('id', $p->attribute_value_id)?->value)
            ->filter()
            ->max(fn($v) => mb_strlen($v));

        return max(mb_strlen($header), 3, $maxValueLength ?: 0) + 2;
    });

    $separatorLine = '|' . $widths->map(fn($width) => str_repeat('—', $width))->join('|') . '|';

   $isSelectedCell = fn($subject, $attribute) =>
        isset($selectedSubject, $selectedAttribute)
        && ($selectedSubject->id === $subject->id)
        && ($selectedAttribute->id === $attribute->id);

    $isSelectedRow = fn($subject) =>
        isset($selectedSubject) && !isset($selectedAttribute)
        && ($selectedSubject->id === $subject->id);
@endphp

@include('partials.header', ['puzzle' => $puzzle])

@if(isset($selectedSubject))
<b>{{ __('texts.you_are_editing', ['subject' => $selectedSubject->name]) }}</b>
@else
<b>{{ __('texts.current_table') }}</b>
@endif
<pre>|@foreach($headers as $i => $header){{ str_pad($header, $widths[$i], ' ', STR_PAD_BOTH) }}|@endforeach

{{ $separatorLine }}
@foreach($subjects as $subject)
|{!! str_pad($subject->name, $widths[0], ' ', STR_PAD_BOTH) !!}|@foreach($attributes as $i => $attribute)@php
$cellState = $cellResolver->resolveCell($subject, $attribute, $selectedSubject ?? null, $selectedAttribute ?? null, $progress ?? null);
$cell = $cellState->display();
$padWidth = $widths[$i + 1];
$cellPadding = max(0, $padWidth - mb_strlen($cell));
$left = floor($cellPadding / 2);
$right = ceil($cellPadding / 2);
echo str_repeat(' ', $left) . $cell . str_repeat(' ', $right) . '|';
@endphp@endforeach

@endforeach
</pre>
