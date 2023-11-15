<x-laravel-ui-adminlte::adminlte-layout>
    <link rel="stylesheet" href={{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome -->

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            {{-- nav --}}
            @include('layouts.nav')
            {{-- end nav --}}


            {{-- aside --}}
            @include('layouts.aside')
            {{-- end aside --}}

            {{-- content --}}
            <div class="content-wrapper" style="min-height: 1302.4px;">
                @yield('content')
            </div>
            {{--  end content --}}


            {{-- footer --}}
            @include('layouts.footer')
            {{-- end footer --}}
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
