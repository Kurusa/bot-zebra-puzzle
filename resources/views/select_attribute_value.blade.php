@include('partials.table', ['puzzle' => $puzzle, 'selectedSubject' => $selectedSubject])
@include('partials.hints', ['puzzle' => $puzzle])

<i>{{ __('texts.select_value_for_attribute', ['attribute' => $selectedAttribute->name]) }}</i>
