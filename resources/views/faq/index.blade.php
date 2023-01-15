<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ's
        </h2>
    </x-slot>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All faq's</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($categories as $category)
                    FAQCategory: {{ $category->name }}<br/>
                    @foreach($category->items as $item)
                        FAQ: <a href="{{ route('faq.show', $item->id) }}">{{ $item->question }}</a>: {{ $item->answer }}
                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('faq.edit', $item->id) }}"> - Edit</a>
                          @endif
                          <br>
                        @endauth
                        <hr>
                    @endforeach
                    <br/>
                    @endforeach

                    @auth
                    @if(Auth::user()->is_admin)
                      <a href="{{ route('faq.create') }}">Create faq</a>
                    @endif
                    <br>
                  @endauth

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
