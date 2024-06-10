<button {{ $attributes->merge(['type' => 'submit', 'class' => 'z-10 inline-flex items-center px-4 py-2 bg-customPurple-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xl text-white dark:text-gray-800 uppercase tracking-widest hover:bg-customPurple-500 dark:hover:bg-white focus:bg-customPurple-500 dark:focus:bg-white active:bg-customPurple-500 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
