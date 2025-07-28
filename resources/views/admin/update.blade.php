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
                            <form action="{{ route('admin.allpost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="title" value="{{ $post->title }}" id=""><br><br>
                                <textarea style="width: 400px;height:200px;" name="Description" id="" cols="30" rows="10">{{ $post->Description }}</textarea><br><br>
                                <img src="{{ asset('image/'.$post->image) }}" alt="">
                                <input type="file" name="image" id=""><br><br>
                                <input type="submit" value="Update post" style="border: 1px solid blue;color:white;padding:3px;text-align:center;background:rgb(24, 158, 140)">
                            </form>
                    </div>
                </div>

        </div>
@endsection

</x-app-layout>
