@include('partials.table', ['puzzle' => $puzzle, 'selectedSubject' => $selectedSubject])
@include('partials.hints', ['puzzle' => $puzzle])

<i>{{ __('texts.select_attribute_to_edit', ['name' => $selectedSubject->name]) }}</i>
