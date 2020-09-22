@extends('layouts.index')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                        <h4>Ajouter /Edite Emballage</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-packaging')}}">
                                <i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-header">
                        <strong>Editer</strong> Emballage
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table-sm col-md-12 table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID emballage</th>
                                        <th>Name</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <form action="{{url('/edite-packaging/'.$packaging->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <td><input type="text" name="id" style="font-size: 12px"  class=" form-control" value="{{$packaging->id}}" disabled></td>
                                                <td><input type="text" name="name" style="font-size: 12px" class=" form-control" value="{{$packaging->name}}"></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button type="submit"
                                                            class="item  edit" data-placement="top" title="Edit">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <a href="{{url('/list-packaging')}}"
                                                            class="item" data-placement="top" title="retour">
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
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Emballage</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packagings as $package)
                                    <tr>
                                        <td>{{$package->id}}</td>
                                        <td>{{$package->name}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/edite-packaging/'.$package->id) }}" class="item  edit" data-placement="top" title="Edit"
                                                    data-toggle="modal" data-target="#editModal">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-packaging/'.$package->id) }}" class="item" data-placement="top" title="delete">
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
                <h5 class="modal-title" id="staticModalLabel">Add Emballage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-packaging') }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom Emballage</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="name" name="name" class="form-control">
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
