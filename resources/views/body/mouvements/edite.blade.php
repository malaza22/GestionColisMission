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
                        <h4>Ajouter Bon d'Envoyer</h4>
                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#">
                            <i class="fa fa-list-alt"></i></a>
                    </div>
                    <div class="card-header">
                        <strong>Liste </strong>En cours d' envoyer
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/edite-mouvement/'.$mouvement_temporary->id)}}" method="POST"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Destinateur</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="agenciesdesti_id" class=" form-control" autofocus>
                                        <option value="{{$mouvement_temporary->agenciesdesti_id}}" disabled>select
                                        </option>
                                        @foreach ($agency as $agencys)
                                        <option value="{{$agencys->id}}" @if($agencys->
                                            id==$mouvement_temporary->agenciesdesti_id)
                                            selected @endif>{{$agencys->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Service Expediteur</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="services_id" class=" form-control" autofocus>
                                        <option value="{{$mouvement_temporary->services_id}}" disabled>select
                                        </option>
                                        @foreach ($services as $service)
                                        <option value="{{$service->id}}" @if($service->
                                            id==$mouvement_temporary->services_id)
                                            selected @endif>{{$service->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Coursier</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="personals_id" class=" form-control" autofocus>
                                        <option value="{{$mouvement_temporary->personals_id}}" disabled>select
                                        </option>
                                        @foreach ($personals as $personal)
                                        <option value="{{$personal->id}}" @if($personal->
                                            id==$mouvement_temporary->personals_id)
                                            selected @endif>{{$personal->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label class=" form-control-label">Date envoi</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="date" id="date_send" name="date_send" class="form-control"
                                        value="{{$mouvement_temporary->date_send}}" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="location" class=" form-control-label">Colis</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="preparations_id" class=" form-control" autofocus>
                                        <option value="{{$mouvement_temporary->preparations_id}}" disabled>select
                                        </option>
                                        @foreach ($preparation as $preparations)
                                        <option value="{{$preparations->id}}" @if($preparations->
                                            id==$mouvement_temporary->preparations_id)
                                            selected @endif>{{$preparations->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Sauver
                                </button>
                                <a class="btn btn-danger btn-sm" data-dismiss="modal"
                                    href="{{url('/liste-mouvement')}}">
                                    <i class="fa fa-ban"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
