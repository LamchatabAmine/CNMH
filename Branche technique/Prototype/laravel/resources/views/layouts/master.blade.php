<!DOCTYPE html>
<html lang="en">
    {{-- head --}}
    @include("layouts.head")
    {{-- end head --}}

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        {{-- nav --}}
        @include("layouts.nav")
        {{-- end nav --}}


        {{-- aside --}}
        @include("layouts.aside")
        {{-- end aside --}}

        {{-- content --}}
        {{-- @yield("content") --}}
        {{--  end content --}}


        {{-- footer --}}
        @include("layouts.footer")
        {{-- end footer --}}
    </div>

    {{-- scripts --}}
    @include("layouts.script")
    {{-- end scripts --}}
</body>
</html>




