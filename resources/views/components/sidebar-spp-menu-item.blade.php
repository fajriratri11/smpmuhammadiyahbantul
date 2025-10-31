@props(['icon' => null, 'routeName' => null, 'title' => null])

<li>
    <a href="{{ route($routeName) }}"
        class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg group hover:bg-gray-100 transition duration-75 dark:text-gray-200 dark:hover:bg-gray-700
        {{ request()->routeIs($routeName) ? 'bg-gray-200 dark:bg-gray-700' :  '' }}">
        {{ $icon }}
        <span class="ml-3 whitespace-nowrap">{{ $title }}</span>
    </a>
</li>
