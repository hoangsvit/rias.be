<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <title>{{ $title }} | Rias.be</title>
    @if ($contents)
        @foreach ($contents as $content)
            @if ($content['type'] === 'header')
                <meta name="description" content="{{ \Statamic\Statamic::modify($content['header'])->toMetaDescription() }}">
            @endif
        @endforeach
    @endif
    <link href="https://github.com/riasvdv" rel="me">
    <link rel="webmention" href="https://webmention.io/www.rias.be/webmention" />
    <link rel="pingback" href="https://webmention.io/www.rias.be/xmlrpc" />

    <meta name="og:image" content="https://www.rias.be/assets/social.png">

    <meta name="msapplication-tap-high400" content="no">

    <link rel="apple-touch-icon" sizes="57x57" href="/assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <meta name="application-name" content="Rias.be"/>
    <meta name="msapplication-TileColor" content="#fbfcfc">
    <meta name="msapplication-TileImage" content="/assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="/manifest.json">

    @include('feed::links')

    @livewireStyles
    @vite(['resources/css/site.css', 'resources/js/site.js'])
</head>
<body class="font-sans text-lg leading-normal p-4 sm:p-6 text-gray-700 bg-white">

<div class="container mx-auto">
    <nav class="flex justify-between items-center mb-4 sm:mb-16">
        <a href="/" class="no-shadow text-teal-500" aria-label="Home">
            <svg class="fill-current sm:w-16 sm:h-16" width="35" height="42" viewBox="0 0 35 42" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.3 25.824l8.38 13.11c.388.625.443 1.363.055 2.044-.333.625-1 1.022-1.665 1.022h-5.05c-.665 0-1.275-.34-1.608-.908l-8.434-13.678H8.1v12.6C8.1 41.092 7.214 42 6.16 42H1.94C.888 42 0 41.092 0 40.014V21.34c0-1.078.888-1.986 1.942-1.986h17.09c3.218 0 5.382-.908 6.492-2.838.388-.624.555-1.532.555-2.61 0-1.874-.556-3.18-1.72-4.2-1.222-1.136-2.942-1.647-5.106-1.647H1.942C.888 8.06 0 7.15 0 6.072V1.986C0 .908.888 0 1.942 0h17.81c4.274 0 7.77 1.25 10.378 3.746 2.718 2.497 4.05 5.903 4.05 10.16 0 5.505-2.386 9.478-6.936 11.52-.277.115-.61.285-.943.398z" fill-rule="nonzero" />
            </svg>
        </a>
        <div class="flex items-center">
            @foreach (\Statamic\Statamic::tag('nav:main') as $navItem)
                @if ($navItem['title'] === 'Contact me')
                    <a href="{{ $navItem['url'] }}" class="inline-block transition-all bg-teal-100 hover:bg-teal-200 text-gray-700 px-6 py-3 rounded no-underline no-shadow hover:-translate-y-1 hover:shadow">
                        {{ $navItem['title'] }}
                    </a>
                @else
                    <a {{ $navItem['is_external'] ? 'target="_blank" rel="noopener"' : 'wire:navigate' }}
                        href="{{ $navItem['url'] }}"
                        class="mr-6 text-xl hover:text-orange-500 text-lg no-underline no-shadow hidden sm:block
                        @if($navItem['is_current'] || $navItem['is_parent'])
                            text-orange-500
                        @else
                            text-gray-600
                        @endif"
                    >
                        {{ $navItem['title'] }}
                    </a>
                @endif
            @endforeach
        </div>
    </nav>
</div>

@yield('content')

<div x-data="{ open: false }" x-on:click.away="open = false">
    <div class="fixed flex justify-center w-full z-40 left-0 right-0" style="bottom: 15px;">
        <a href="#" x-on:click.prevent="open = true" class="no-shadow block sm:hidden bg-teal-500 rounded-lg text-white py-2 px-6 no-underline text-base tracking-widest">
            MENU
        </a>
    </div>
    <nav id="mobile-nav" x-bind:class="{ 'open': open }" class="fixed flex max-w-sm mx-auto justify-center w-full px-4 flex-col bottom-0 left-0 right-0 mb-3 p-1 z-50">
        <div class="bg-white shadow-2xl rounded-lg">
            <div class="flex justify-center py-4 px-4 overflow-x-scroll scrolling-touch max-w-full border-b border-gray-400">
                <a href="/" class="text-gray-700 text-lg mx-2 no-shadow no-underline">Home</a>
                <a href="/blog" class="text-gray-700 text-lg mx-2 no-shadow no-underline">Blog</a>

                <button class="text-gray-dark text-xs p-1 ml-auto" aria-label="close" x-on:click="open = false">
                    {!! \Statamic\Statamic::tag('svg')->params(['src' => '/assets/svg/times-circle.svg', 'class' => 'text-teal-500 w-6 h-6']) !!}
                </button>
            </div>
            <div class="flex max-w-full overflow-x-scroll scrolling-touch gap-2 px-2 py-2">
                <div class="flex-no-shrink flex-no-grow w-1/4 py-1">
                    <a href="mailto:hello@rias.be" class="block px-1 text-gray-500 no-shadow text-center">
                        <span class="text-base text-orange">Email</span>
                    </a>
                </div>
                <div class="flex-no-shrink flex-no-grow w-1/4 py-1">
                    <a href="https://twitter.com/riasvdv" class="block px-1 text-gray-500 no-shadow text-center">
                        <span class="text-base text-orange">Twitter</span>
                    </a>
                </div>
                <div class="flex-no-shrink flex-no-grow w-1/4 py-1">
                    <a href="https://phpc.social/@rias" rel="me" class="block px-1 text-gray-500 no-shadow text-center">
                        <span class="text-base text-orange">Mastodon</span>
                    </a>
                </div>
                <div class="flex-no-shrink flex-no-grow w-1/4 py-1">
                    <a href="https://www.linkedin.com/in/rias-" class="block px-1 text-gray-500 no-shadow text-center">
                        <span class="text-base text-orange">LinkedIn</span>
                    </a>
                </div>
                <div class="flex-no-shrink flex-no-grow w-1/4 py-1">
                    <a href="https://github.com/riasvdv" class="block px-1 text-gray-500 no-shadow text-center">
                        <span class="text-base text-orange">Github</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<script type="text/javascript">
    WebFontConfig = {
        google: { families: ['Fira+Code:400,700&display=swap'] }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })(); </script>

@livewireScripts
</body>
</html>
