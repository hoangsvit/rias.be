@foreach ($page->contents as $content)
    @include("partials.sets.{$content->type}", $content)
@endforeach
