<?php

return [
    'menu' => "Welcome to Zebra Puzzle! 🦓\nWhat would you like to do?",
    'menu_option_start' => '🧩 Start a Puzzle',
    'menu_option_progress' => '📊 My Progress',
    'menu_option_how_to_play' => '📖 How to Play',

    'how_to_play' => "🧩 In Zebra Puzzle, your goal is to fill in the table by correctly matching people, pets, drinks, and other attributes. Using the hints provided, you need to logically deduce who owns what.

How to play:
1️⃣ Start the puzzle and read the description and hints carefully.
2️⃣ Select a row (person) you want to edit.
3️⃣ Choose an attribute to edit (for example, pet or drink).
4️⃣ Select a value for that attribute from the list.
5️⃣ Repeat the steps until you fill in the entire table.

Once the table is complete, press \"✅ Submit your solution\" to check if your answers are correct.

⚙️ In the settings, you can enable or disable the option \"Show feedback immediately\":
- If enabled, after each attribute selection, the bot will immediately tell you if your choice is correct or not.
- If disabled, feedback will only appear after you submit your solution.

You can also start a new puzzle or reset your progress anytime in the settings.

Use your logic, pay attention to details, and have fun! 🎯",

    'select_difficulty' => "Choose a puzzle difficulty:",

    'puzzle_intro' => "🧩 Puzzle #:id\n:description",
    'puzzle_suggestion_menu_start_solving' => '✅ Start Solving',
    'puzzle_suggestion_menu_different_puzzle' => '🔄 Show Another Puzzle',
    'puzzle_suggestion_menu_back_to_menu' => '⬅️ Back to Difficulty Selection',

    'hints_header' => "🔍 Hints:\n- :hints",
    'progress' => "📊 Your Progress:\nSolved: %d\nFailed Attempts: %d",

    'difficulty_easy' => '⭐️ Easy',
    'difficulty_medium' => '⭐️⭐️ Medium',
    'difficulty_hard' => '⭐️⭐️⭐️ Hard',

    'back_to_puzzle' => '⬅️ Back to Puzzle',
    'back_to_table' => '⬅️ Back to Table',
    'current_table' => '📌 Current Puzzle Table:',
    'subject' => 'Person',
    'select_subject_to_edit' => 'Select a row to edit:',
    'you_are_editing' => '🖊️ You are editing: :subject',
    'select_attribute_to_edit' => 'Select an attribute to edit for :name:',

    'select_value_for_attribute' => 'Select a value for attribute: :attribute',
    'back_to_subject' => '⬅️ Back to subject',
    'submit_solution' => '✅ Submit your solution',

    'settings' => '⚙️ Settings',
    'settings_feedback_label' => '🔔 Show feedback immediately:',
    'settings_feedback_enabled' => '✅ Enabled',
    'settings_feedback_disabled' => '❌ Disabled',
    'settings_feedback_toggled' => '🔔 Feedback setting updated: :status',
    'settings_back_to_menu' => '⬅️ Back to menu',

    'feedback_correct' => '✅ Correct!',
    'feedback_incorrect' => '❌ Incorrect. You can change it later.',

    'solution_not_completed' => '⚠️ You have not completed the puzzle yet.',
    'solution_correct' => '🎉 Congratulations! You solved the puzzle correctly!',
    'solution_incorrect' => '❌ The puzzle solution is incorrect. Try again or change your answers.',
];
