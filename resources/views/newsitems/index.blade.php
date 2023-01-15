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
                        <h3><a href="{{ route('newsitems.show', $item->id) }}">{{ $item->title }}</a></h3>
                        {{-- <img src="/uploads/{{ $post->image }}" style="width: 500px;" /><br>
                        <small>Gepost door <a href="{{ route('profile', $post->user->name) }}">{{ $post->user->name }}</a> op {{ $post->created_at->format('d/m/Y \o\m H:i') }}</small><br>
                        @auth
                          @if($post->user_id == Auth::user()->id)
                            <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                          @else
                            <a href="{{ route('like', $post->id) }}">Like Post</a>
                          @endif
                          <br>
                        @endauth
                        Post heeft {{ $post->likes()->count() }} likes
                        <hr> --}}
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
