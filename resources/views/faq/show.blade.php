<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Question: {{ $faq->question }}<br/>
                </div>

                <div class="card-body">
                    <br>
                        <br>

                        <pre>{{ $faq->answer }}</pre>

                        <br>
                        Linked tags:
                        @foreach($faq->tags as $tag)
                            {{ $tag->name }}
                        @endforeach

                        {{ Form::open(array('route' => array('linkTag', $faq->id))) }}
                        {{ Form::submit('Link new tag') }}
                        {{ Form::select('tag_id', $tags) }}
                        {{ Form::close() }}

                        <br>

                        @auth
                          @if(Auth::user()->is_admin)
                            <a href="{{ route('faq.edit', $faq->id) }}">Edit item</a>
                          @endif
                          <br>
                        @endauth



                        @auth
                          @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="post" action="{{ route('faq.destroy', $faq->id) }}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="DELETE FAQ"
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
