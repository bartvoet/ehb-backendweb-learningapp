<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! {{ Auth::user()->name }}
                    @if(Auth::user()->avatar)
                    <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{route('uploadavator')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
