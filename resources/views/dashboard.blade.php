<!-- resources/views/layouts/app.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div style="display: flex; height: 100vh;">
        <div style="width: 20%; background-color: #ccc;"> @include('partials.navbar')</div>
        <div style="width: 80%; background-color: #f0f0f0;">
        <main id="content">
          <!-- Content will be dynamically loaded here -->

<div id="basic_details_view"> @include('partials.basic-details')</div>         
        <div id="edu_details_view">@include('partials.educational-details')</div>  
         <div id="uploaddocs"> @include('partials.upload-documents')</div>
        </main>
      </div>
    </div>

  
    <footer class="bg-white dark:bg-gray-800 shadow mt-4">
          <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            &copy; 2024 Your Company
          </div>
        </footer>
      </div>
    </div>
  </div>

</x-app-layout>
