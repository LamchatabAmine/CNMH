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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function submitForm() {
            document.getElementById("importForm").submit();
        }
    </script>




    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#searchProject', function(e) {
                e.preventDefault();
                let searchValue = $(this).val();
                // let page = $('.pagination').find('.active').text(); // Get the current active page
                $.ajax({
                    url: "{{ route('search.project') }}",
                    method: 'GET',
                    data: {
                        searchValue: searchValue
                    },
                    success: function(data) {
                        $('.table-data').html(data.table);
                        $('.pagination').html(data.pagination);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#filterTasks').on('change', function(e) {
                let projectId = $(this).val();

                $.ajax({
                    url: "{{ route('tasks.by.project', ['projectId' => ':projectId']) }}".replace(
                        ':projectId', projectId),
                    method: 'GET',
                    data: {
                        'project': projectId
                    },
                    success: function(data) {
                        $('.table-tasks').html(data.table);
                        $('.pagination').html(data.pagination);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });













        });
    </script>





</x-laravel-ui-adminlte::adminlte-layout>
