@include('partials.table', ['puzzle' => $puzzle])
@include('partials.hints', ['puzzle' => $puzzle])

<i>{{ __('texts.select_subject_to_edit') }}</i>
