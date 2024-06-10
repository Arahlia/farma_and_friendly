@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-customPurple-500 dark:focus:border-customPurple-600 focus:ring-customPurple-500 dark:focus:ring-customPurple-600 rounded-md shadow-sm']) !!}>
