<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @if(Auth::check() && Auth::user()->usertype=='admin')
                {{ __('Admin Dashboard') }}

            @else
                {{ __('Dashboard') }}
            @endif

        </h2>
    </x-slot>
   @section('content')
        <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </form>
                        </div>
                    </div>
                </div>

        </div>
@endsection

</x-app-layout>
