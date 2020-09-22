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
                        <h4>Edite Preparation</h4>
                        <div>
                            <a class="au-btn au-btn-icon btn-success au-btn--small"
                                href="{{url('/liste-preparation')}}">
                                <i class="fa fa-list-alt"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table-sm col-md-12 table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Personnel</th>
                                        <th>date de preparation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="{{url('/edite-preparation/'.$preparation->id)}}" method="POST"
                                            enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <td><input type="text" name="id" style="font-size: 12px"
                                                    class=" form-control" value="{{$preparation->id}}" disabled></td>
                                            <td>
                                                <select name="personals_id" class=" form-control" autofocus>
                                                    <option value="{{$preparation->personals_id}}" disabled>select
                                                    </option>
                                                    @foreach ($personals as $personal)
                                                    <option value="{{$personal->id}}" @if($personal->
                                                        id==$preparation->id)
                                                        selected @endif>{{$personal->lastname}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" name="date_preparation" style="font-size: 12px"
                                                    class=" form-control" value="{{$preparation->date_preparation}}"
                                                    data-date-format="dd-mm-yyyy">
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button type="submit" class="item  edit" data-placement="top"
                                                        title="sauver">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <a href="{{url('/liste-preparation')}}" class="item"
                                                        data-placement="top" title="retour">
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
                    <div class="card-header overview-wrap">
                        <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                        <h4>Liste colis prèt Envoyer </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Personnel</th>
                                        <th>date de preparation</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listepre as $listeprepas)
                                    <tr>
                                        <td>{{$listeprepas->id}}</td>
                                        <td>{{$listeprepas->Coursier}}</td>
                                        <td>{{$listeprepas->date_preparation}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/view-preparation/'.$listeprepas->id)}}" class="item"
                                                    title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>


                                                <a href="{{url('/add-preparation/'.$listeprepas->id)}}" class="item"
                                                    title="Plus">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/edite-preparation/'.$listeprepas->id)}}" class="item"
                                                    title="edite">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-preparation/'.$listeprepas->id)}}" class="item"
                                                    title="Plus">
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
@endsection
