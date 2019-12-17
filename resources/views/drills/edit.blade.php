@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Drill Updater') }}</div> {{-- __('')は多言語化対応のため --}}

                    <div class="card-body">
                        <form method="POST" action="{{ route('drills.update', $drill->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ $drill->title }}" autocomplete="name" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <input
                                        id="category_name"
                                        type="text"
                                        class="form-control @error('category_name') is-invalid @enderror"
                                        name="category_name"
                                        value="{{ $drill->category_name }}"
                                        autocomplete="title"
                                        autofocus
                                    >

                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            @for($i = 1; $i <= 10; $i++)
                                <div class="form-group row">
                                    <label for="problem0" class="col-md-4 col-form-label text-md-right">{{ __('Problem').$i  }}</label>

                                    <div class="col-md-6">
                                        <input
                                            id="problem{{$i - 1}}"
                                            type="text"
                                            class="form-control @error('problem'.($i - 1)) is-invalid @enderror"
                                            name="problem{{$i - 1}}"
                                            value="{{ $drill['problem'.($i - 1)] }}"
                                            autocomplete="problem{{$i - 1}}"
                                            autofocus
                                        >

                                        @error('problem'.($i - 1))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            @endfor


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-left" style="width: 100px; margin-left: 17%;">
            <a href="{{ route('drills.index') }}" class="btn btn-dark btn-block mt-3">{{ __('Back') }}</a>
        </div>
    </div>
@endsection

