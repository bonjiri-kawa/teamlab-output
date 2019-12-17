@extends('layouts.app')

@section('content')
<!-- デフォルトだとこの中ではvue.jsが有効 -->
<!-- example-component はLaravelに入っているコンポーネント -->
<example-component
    title="{{ __('Practice').'「'.$drill->title.'」' }}"
    :drill="{{ $drill }}" category_name="{{ $drill->category_name }}"></example-component>

<div class="text-left" style="width: 100px; margin-left: 24%;">
    <a href="{{ route('drills.index') }}" class="btn btn-dark btn-block mt-3">{{ __('Back') }}</a>
</div>
@endsection
