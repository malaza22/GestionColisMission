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
                        <h4>Moyen de transport de colis</h4>
                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="{{url('/liste-mouvement')}}">
                            <i class="fa fa-list-alt"></i></a>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/liste-mouvement/'.$mouvement_temporary->id)}}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Destinateur</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="text" name="agenciesdesti"
                                        value="{{$mouvement_temporary->agenciesdesti->name}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="services" class=" form-control-label">Service Expediteur</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="text" name="services"
                                        value="{{$mouvement_temporary->services->name}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="email" class=" form-control-label">Coursier</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="text" name="personals"
                                        value="{{$mouvement_temporary->personals->lastname}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="phone_number" class=" form-control-label">Date envoi</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="text" name="date_envoi"
                                        value="{{$mouvement_temporary->date_send}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="location" class=" form-control-label">Colis (près a envoyer)</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="text" name="preparations"
                                        value="{{$mouvement_temporary->preparations_id}}" disabled>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="name" class=" form-control-label">Cooperative</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="description" class=" form-control-label">description</label>
                                </div>
                                <div class=" col-md-9">
                                    <textarea class="form-control" name="description"> </textarea>
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
