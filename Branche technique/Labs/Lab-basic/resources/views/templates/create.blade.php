@extends('layouts.master')


@section("content")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestion des Competences</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Competence</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i>Please all fields is required without code!</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- form  -->
            <form action="{{route('store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                {{-- <div class="text-center"></div> --}}
                                <h3 class="card-title">Compentence</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="reference">Compentence Reference</label>
                                    <input name="References" type="text" class="form-control" id="reference" placeholder="Entre reference" >
                                </div>

                                <div class="form-group">
                                    <label for="code">Compentence Code</label>
                                    <input name="Code" type="text" class="form-control" id="code" placeholder="Enter Compentence" >
                                </div>

                                <div class="form-group">
                                    <label for="nom">Compentence Nom</label>
                                    <input name="Nom" type="text" class="form-control" id="nom" placeholder="Entre nom" >
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="Description" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
</div>

@endsection
