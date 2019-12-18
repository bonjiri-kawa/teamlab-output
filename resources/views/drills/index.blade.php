@extends('layouts.app')

@section('content')
    <div class="container problem">
        <h2>{{ __('Drill List') }}</h2>
        <div class="col-sm-12">
            <div class="mx-auto" style="width: 200px;">
                <a href="{{ route('drills.create') }}" class="btn btn-block mb-3 problem__create--btn">{{ __('Go Create') }}</a>
            </div>
        </div>
        <div class="row">
            @foreach( $drills as $drill )
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body problem__body">
                            <div class="card-title">{{ $drill->title }}</div>
                            <a href="{{ route('drills.show', $drill->id) }}" class="btn problem__practice--btn">{{ __('Go Practice') }}</a>
                            <a href="{{ route('drills.edit', $drill->id) }}" class="btn problem__edit--btn">{{ __('Go Edit') }}</a>
                            <form action="{{ route('drills.destroy', $drill->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn problem__delete--btn" onclick="return confirm('削除しますか？');">{{ __('Go Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $drills->links() }}
    </div>
@endsection
