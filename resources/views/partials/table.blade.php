@php
    $headers = collect([__('texts.subject')])->merge($puzzle->attributes->pluck('name'));
    $subjects = $puzzle->subjects;

    $widths = $headers->map(function($header, $index) use ($subjects) {
        return max(
            mb_strlen($header),
            $index === 0 ? $subjects->max(fn($s) => mb_strlen($s->name)) : 3
        ) + 2;
    });

    $separatorLine = '|' . $widths->map(fn($width) => str_repeat('—', $width))->join('|') . '|';

    $isSelected = fn($subject) => isset($selectedSubject) && ($selectedSubject->id === $subject->id);
@endphp

@include('partials.header', ['puzzle' => $puzzle])

@if(isset($selectedSubject))
<b>{{ __('texts.you_are_editing', ['subject' => $selectedSubject->name]) }}</b>
@else
<b>{{ __('texts.current_table') }}</b>
@endif
<pre>|@foreach($headers as $i => $header){{ str_pad($header, $widths[$i], ' ', STR_PAD_BOTH) }}|@endforeach

{{ $separatorLine }}
@foreach($subjects as $subj)
|{!! str_pad($subj->name, $widths[0], ' ', STR_PAD_BOTH) !!}|@foreach(range(1, count($headers)-1) as $i)@php
$cell = $isSelected($subj) ? '...' : '?';
$padWidth = $widths[$i];
$cellPadding = $padWidth - mb_strlen($cell);
$left = floor($cellPadding / 2);
$right = ceil($cellPadding / 2);
echo str_repeat(' ', $left) . $cell . str_repeat(' ', $right) . '|';
@endphp@endforeach

@endforeach
</pre>
