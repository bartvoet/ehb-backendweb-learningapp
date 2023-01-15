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
                <div class="card-header">All categories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($categories as $item)
                        <a href="{{ route('faqcategories.show', $item->id) }}">{{ $item->name }}</a>: {{ $item->description }}
                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('faqcategories.edit', $item->id) }}"> - Edit</a>
                          @endif
                          <br>
                        @endauth
                        <hr>
                    @endforeach

                    @auth
                    @if(Auth::user()->is_admin)
                      <a href="{{ route('faqcategories.create') }}">Create category</a>
                    @endif
                    <br>
                  @endauth

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
