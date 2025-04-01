{{
    __('texts.puzzle_intro', [
        'id' => $puzzle->id,
        'description' => $puzzle->description
    ])
}}
{{
    __('texts.hints_header', [
        'hints' => $puzzle->hints->implode('text', "\n"),
    ])
}}
