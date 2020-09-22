@extends('layouts.index')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <h4>Ajouter /Edite Proffession</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-job')}}">
                                <i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">

                            <table class="table-sm col-md-12  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Proffession</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="{{url('/edite-job/'.$job->id) }}" method="POST"
                                            enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <td><input type="text" name="id" style="font-size: 12px"
                                                    class=" form-control" value="{{$job->id}}" disabled></td>
                                            <td><input type="text" name="description" style="font-size: 12px"
                                                    class=" form-control" value="{{$job->description}}" autofocus></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button type="submit" class="item  edit" data-placement="top"
                                                        title="Edit">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <a href="{{url('/list-job')}}" class="item" data-placement="top"
                                                        title="retour">
                                                        <i class="fa fa-hand-o-down"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code Agency</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{$number = 0}}
                                    @foreach ($jobs as $jobb)
                                    <tr>
                                        <td>{{++$number}}</td>
                                        <td>{{$jobb->id}}</td>
                                        <td>{{$jobb->description}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/edite-job/'.$jobb->id)}}" class="item  edit"
                                                    data-placement="top" title="Edit" data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-job/'.$jobb->id)}}" class="item"
                                                    data-placement="top" title="delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ADD AGENCE --}}
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Ajouter Proffession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-job') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="description" class=" form-control-label">description</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="description" name="description" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Save
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-ban"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
