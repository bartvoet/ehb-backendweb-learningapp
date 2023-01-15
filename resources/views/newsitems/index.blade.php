<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Newsitems
        </h2>
    </x-slot>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All newsitems</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($newsitems as $item)
                        <h3>Title: <a href="{{ route('newsitems.show', $item->id) }}">{{ $item->title }}</a></h3>
                        - published at {{ $item->publishing_date }}
                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('newsitems.edit', $item->id) }}"> - Edit</a>
                          @endif
                          <br>
                        @endauth
                        <hr>
                    @endforeach

                    @auth
                    @if(Auth::user()->is_admin)
                      <a href="{{ route('newsitems.create') }}">Create newsitem</a>
                    @endif
                    <br>
                  @endauth

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
