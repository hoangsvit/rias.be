<!-- bg-red-500 bg-orange-500 bg-yellow-500 bg-green-500 bg-teal-500 bg-blue-500 bg-indigo-500 bg-purple-500 bg-pink-500 -->
<div class="bg-gray-100 transition-all leading-normal p-8 rounded-md hover:-translate-y-2 hover:shadow-md">
    <a href="{{ $entry['link'] }}" target="_blank" rel="noopener" class="flex flex-col h-full no-shadow block text-gray-700 no-underline mb-4 hover:text-gray-900">
        <span class="flex mb-8 items-center">
            <i class="inline-block mr-2 rounded-full bg-{{ $entry['color']['label'] ?? '' }}-500 w-4 h-4"></i>
            <h3 class="text-lg font-bold mt-px">{{ $entry['title'] }}</h3>
        </span>
        <div class="prose prose-lg mb-8">
            {!! modify($entry['description'])->smartypants() !!}
        </div>

        <span class="flex items-center group-hover:gap-4 mt-auto">
            <span class="mr-2">More info</span>
            <span class="w-4 h-4 inline-block">{!! statamic_tag('svg', ['src' => '/assets/svg/external-link.svg']) !!}</span>
        </span>
    </a>
</div>
