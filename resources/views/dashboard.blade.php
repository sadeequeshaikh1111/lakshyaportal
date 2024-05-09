<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
      <div class="bg-gray-800 text-white h-screen w-64 flex-shrink-0">
        <ul class="p-4"> <li><a href="#" class="text-gray-300 hover:text-gray-100 px-4 py-2 rounded">Basic details</a></li>
          <li><a href="#" class="text-gray-300 hover:text-gray-100 px-4 py-2 rounded">Educational details</a></li>
          <li><a href="#" class="text-gray-300 hover:text-gray-100 px-4 py-2 rounded">Upload documents</a></li>
          <li><a href="#" class="text-gray-300 hover:text-gray-100 px-4 py-2 rounded">Payment</a></li>
        </ul>
      </div>

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex-grow">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("You're logged in!") }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
