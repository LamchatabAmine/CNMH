<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('layouts.head')
{{-- end head --}}

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

    {{-- scripts --}}
    @include('layouts.script')
    {{-- end scripts --}}
</body>

</html>
