<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All tags</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($tags as $item)
                        Tagname: {{ $item->name }}
                        {{-- @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('tag.destroy', $item->id) }}"> - Delete</a>
                          @endif
                          <br>
                        @endauth --}}
                        <hr>
                    @endforeach

                    @auth
                    @if(Auth::user()->is_admin)
                      <a href="{{ route('tag.create') }}">Create new tag</a>
                    @endif
                    <br>
                  @endauth

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
