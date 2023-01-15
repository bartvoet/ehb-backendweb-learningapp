<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Name: {{ $category->name }}<br/>
                </div>

                <div class="card-body">
                    <br>
                        <br>

                        <pre>{{ $category->description }}</pre>

                        <br><br>
                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('faqcategories.edit', $category->id) }}">Edit item</a>
                          @endif
                          <br>
                        @endauth

                        @auth
                          @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="post" action="{{ route('faqcategories.destroy', $category->id) }}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="DELETE Category"
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
