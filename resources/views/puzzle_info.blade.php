{{
    __('texts.puzzle_intro', [
        'id' => $puzzle->id,
        'description' => $puzzle->description
    ])
}}

@include('partials.hints', ['puzzle' => $puzzle])
