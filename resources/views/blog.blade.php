@extends('layouts.main')

@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach (\Statamic\Statamic::tag('collection:blog') as $entry)
            @include('partials.blog.teaser')
        @endforeach
    </div>
</div>
@endsection
