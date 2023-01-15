<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Newsitem
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Created at: {{ $newsitem->publishing_date }}<br/>
                    Title: {{ $newsitem->title }}
                </div>

                <div class="card-body">


                        <br>

                        <pre>{{ $newsitem->content }}</pre>

                        <br><br>
                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('newsitems.edit', $newsitem->id) }}">Edit item</a>
                          @endif
                          <br>
                        @endauth

                        @auth
                          @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="post" action="{{ route('newsitems.destroy', $newsitem->id) }}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="DELETE Item"
                                style="background-color: red;"/>
                            </form>
                          @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
