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
                <div class="card-header">New FAQ</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.store') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Question</label>

                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control @error('title') is-invalid @enderror" name="question" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Anwser</label>

                            <div class="col-md-6">
                                <input id="answer" type="text" class="form-control @error('title') is-invalid @enderror" name="answer" value="{{ old('title') }}" required autofocus>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">



                        {{ Form::label('Category', 'Choose category') }}
                        {{ Form::select('categoryid', $categories) }}


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add FAQ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
