<!-- resources/views/partials/navbar.blade.php -->
<div class="bg-gray-800 text-white h-screen w-64 flex-shrink-0">
    <ul class="p-4">
        <li><a href="#" class="nav-link text-gray-300 hover:text-gray-100 px-4 py-2 rounded" data-target="basic-details">Basic details</a></li>
        <li><a href="#" class="nav-link text-gray-300 hover:text-gray-100 px-4 py-2 rounded" data-target="edu_details_view">Educational details</a></li>
        <li><a href="#" class="nav-link text-gray-300 hover:text-gray-100 px-4 py-2 rounded" data-target="uploaddocs">Upload documents</a></li>
        <li><a href="#" class="nav-link text-gray-300 hover:text-gray-100 px-4 py-2 rounded" data-target="applyexam">Apply Exam</a></li>

        <li><a href="#" class="nav-link text-gray-300 hover:text-gray-100 px-4 py-2 rounded" data-target="payment">Payment</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="text-gray-300 hover:text-gray-100 px-4 py-2 rounded"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
            </form>
        </li>
    </ul>
</div>
