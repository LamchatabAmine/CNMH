<x-laravel-ui-adminlte::adminlte-layout>
    <link rel="stylesheet" href={{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome -->

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.1.0
                </div>
                <strong>Copyright &copy; 2023-2024 <a href="https://github.com/Solicoders">Solicoders.co</a>.</strong> All rights
                reserved.
            </footer>
        </div>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


        <script>
            function submitForm() {
                document.getElementById("importForm").submit();
            }

            function updateUrl() {
                var selectedProjectId = document.getElementById('project').value;
                var url = '{{ url('tache') }}/' + selectedProjectId;
                window.location.href = url;
            }
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('keyup', '#searchTask', function(e) {
                    e.preventDefault();
                    let project = document.getElementById('project').value;
                    let search = $(this).val();
                    console.log(search);
                    // let page = $('.pagination').find('.active').text(); // Get the current active page
                    $.ajax({
                        url: '{{ route('search.task', ['project' => ':project']) }}'.replace(':project',
                            project),
                        method: 'GET',
                        data: {
                            search: search,
                            project: project,
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




    </body>
</x-laravel-ui-adminlte::adminlte-layout>
