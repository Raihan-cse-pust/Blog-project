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
                        <div class="p-6 text-gray-900"style="text-align:center;">
                            @if (session('status'))
                                <div style="background: green;" class="alert alert-success">
                                    {{ session('status') }}
                                </div>

                            @endif
                            <form action="{{ route('admin.addpost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="title" placeholder="Enter title here" id=""><br><br>
                                <textarea style="width: 400px;height:auto;" name="Description" id="" cols="30" rows="10">Write a post here</textarea><br><br>
                                <input type="file" name="image" id=""><br><br>
                                <input type="submit" value="submit" style="border: 1px solid blue;color:white;padding:3px;text-align:center;background:rgb(24, 158, 140)">
                            </form>
                    </div>
                </div>

        </div>
@endsection

</x-app-layout>
