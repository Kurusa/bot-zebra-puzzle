<?php

return [
    'menu' => "Ласкаво просимо до Zebra Puzzle! 🦓\nЩо ви хочете зробити?",
    'menu_option_start' => '🧩 Почати пазл',
    'menu_option_progress' => '📊 Мій прогрес',
    'menu_option_how_to_play' => '📖 Як грати',

    'how_to_play' => "🧩 У грі Zebra Puzzle ви повинні заповнити таблицю, правильно поєднавши людей, улюбленців, напої та інші атрибути. Ваше завдання — за допомогою підказок логічно визначити, кому що належить.\n
Кожен пазл складається з кількох рядків (персон) та кількох колонок (атрибутів). У кожній клітинці таблиці ви маєте вказати правильне значення.

Як грати:
1️⃣ Почніть гру та прочитайте опис задачі та підказки.
2️⃣ Натисніть на рядок (персону), яку хочете редагувати.
3️⃣ Оберіть атрибут для редагування (наприклад, улюбленець або напій).
4️⃣ Виберіть значення атрибуту зі списку.
5️⃣ Повторюйте кроки, поки не заповните всю таблицю.

Після того, як таблиця буде заповнена, натисніть «✅ Перевірити рішення», щоб дізнатися, чи правильно ви розв’язали задачу.

⚙️ В налаштуваннях ви можете увімкнути або вимкнути опцію «Показувати відгук одразу». Якщо вона увімкнена:
- Після кожного вибору атрибуту бот буде показувати вам одразу, правильний цей вибір чи ні.
- Якщо вимкнена — перевірка відбудеться лише після натискання «Перевірити рішення».

Ви завжди можете почати новий пазл або скинути прогрес у налаштуваннях.

Використовуйте логіку, уважність і трохи терпіння. Гарної гри! 🎯",

    'select_difficulty' => "Оберіть складність пазлу:",

    'puzzle_intro' => "🧩 Пазл №:id\n:description",
    'puzzle_suggestion_menu_start_solving' => '✅ Почати розв’язувати',
    'puzzle_suggestion_menu_different_puzzle' => '🔄 Показати інший пазл',
    'puzzle_suggestion_menu_back_to_menu' => '⬅️ Назад до вибору складності',

    'hints_header' => "🔍 Підказки:\n- :hints",
    'progress' => "📊 Ваш прогрес:\nРозв’язано: %d\nНевдалих спроб: %d",

    'difficulty_easy' => '⭐️ Легкий',
    'difficulty_medium' => '⭐️⭐️ Середній',
    'difficulty_hard' => '⭐️⭐️⭐️ Складний',

    'back_to_puzzle' => '⬅️ Назад до пазлу',
    'back_to_table' => '⬅️ Назад до таблиці',
    'current_table' => '📌 Поточна таблиця пазлу:',
    'subject' => 'Персона',
    'select_subject_to_edit' => 'Оберіть рядок для редагування:',
    'you_are_editing' => '🖊️ Ви редагуєте: :subject',
    'select_attribute_to_edit' => 'Оберіть атрибут для редагування (:name):',

    'select_value_for_attribute' => 'Оберіть значення для атрибуту: :attribute',
    'back_to_subject' => '⬅️ Назад до персони',
    'submit_solution' => '✅ Перевірити рішення',

    'menu_option_settings' => '⚙️ Налаштування',
    'settings_feedback_label' => '🔔 Показувати відгук одразу:',
    'settings_feedback_enabled' => '✅ Увімкнено',
    'settings_feedback_disabled' => '❌ Вимкнено',
    'settings_feedback_toggled' => '🔔 Налаштування відгуку оновлено: :status',
    'settings_back_to_menu' => '⬅️ Назад до меню',

    'feedback_correct' => '✅ Правильно!',
    'feedback_incorrect' => '❌ Неправильно. Ви можете змінити пізніше.',

    'solution_not_completed' => '⚠️ Ви ще не заповнили всі клітинки таблиці.',
    'solution_correct' => '🎉 Вітаємо! Ви правильно розв’язали пазл!',
    'solution_incorrect' => '❌ Пазл розв’язано неправильно. Спробуйте ще раз або змініть відповіді.',
];
