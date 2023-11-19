@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Taches de {{ $project ? $project->name : '' }} </h1>
                </div>
                <div class="col-sm-6">
                    @can('create', App\Models\Member::class)
                        <div class="float-sm-right">
                            <a href="{{ route('task.create', $project) }}" class="btn btn-sm btn-primary">Ajouter Tache</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-end align-items-center  p-0">
                                <div class="form-group input-group-sm mb-0 col-md-2">
                                    <select id="filterTasks" class="form-control">
                                        @if ($projects)
                                            @foreach ($projects as $projectName)
                                                <option value={{ $projectName->id }}
                                                    @if ($projectName->name == $project->name) @selected(true) @endif>
                                                    {{ $projectName->name }}</option>
                                            @endforeach
                                        @else
                                            <option>Empthy</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="input-group input-group-sm col-md-3 p-0">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 ">
                            @include('project.task.table')
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                @can('create', App\Models\Member::class)
                                    <button type="button" class="btn  btn-default btn-sm">
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                        IMPORT</button>
                                @endcan
                                <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                                    <i class="fa-solid fa-file-export"></i>
                                    EXPORT</button>
                            </div>
                            <div class="">
                                <ul class="pagination  m-0 float-right">
                                    @if ($tasks)
                                        {{ $tasks->links() }}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
