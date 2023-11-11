@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List des Taches</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="http://127.0.0.1:8000/project/create" class="btn btn-sm btn-primary">Ajouter Tache</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
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
                        <div class="card-body table-responsive p-0">
                            @include('project.task.table')
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-block btn-default btn-sm">
                                    IMPORT</button>
                                <button type="button" class="btn btn-block btn-default btn-sm mt-0 mx-2">
                                    EXPORT</button>
                            </div>
                            <div class="">
                                <ul class="pagination  m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
