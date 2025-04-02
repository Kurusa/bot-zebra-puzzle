@php
$columnWidths = [
    'subject' => 10,
];

foreach ($puzzle->attributes as $attribute) {
    $columnWidths[$attribute->name] = 8;
}
@endphp

@include('partials.header', ['puzzle' => $puzzle])

@if(isset($selectedSubject))
<b>{{ __('texts.you_are_editing', ['subject' => $selectedSubject->name]) }}</b>
@else
<b>{{ __('texts.current_table') }}</b>
@endif

<pre>
|{{ mb_str_pad(__('texts.subject'), $columnWidths['subject'], ' ', STR_PAD_BOTH) }}|@foreach($puzzle->attributes as $attribute){{ mb_str_pad($attribute->name, $columnWidths[$attribute->name], ' ', STR_PAD_BOTH) }}|@endforeach

|{{ str_repeat('-', $columnWidths['subject']) }}|@foreach($puzzle->attributes as $attribute){{ str_repeat('-', $columnWidths[$attribute->name]) }}|@endforeach

@foreach($puzzle->subjects as $subject)
@php
$row = '|' . mb_str_pad($subject->name, $columnWidths['subject'], ' ', STR_PAD_BOTH) . '|';

foreach ($puzzle->attributes as $attribute) {
$cellState = $cellResolver->resolveCell(
$subject,
$attribute,
$selectedSubject ?? null,
$selectedAttribute ?? null,
$progress ?? null
);
$cell = $cellState->display();
$row .= mb_str_pad($cell, $columnWidths[$attribute->name], ' ', STR_PAD_BOTH) . '|';
}
echo $row;
@endphp

@endforeach
</pre>
