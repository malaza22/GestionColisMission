@extends('layouts.index')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <h4>Date de reception</h4>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/aquis-reçue/'.$mouvement->preparations_id)}}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row form-group">
                                        <div class=" col-md-4">
                                            <label class=" form-control-label">Agencies Expediteur</label>
                                        </div>
                                        <div class=" col-md-8">
                                            <input class="form-control" type="text"
                                                value="{{$mouvement->agenciesexpe->name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class=" col-md-4">
                                            <label class=" form-control-label">Date envoyer</label>
                                        </div>
                                        <div class=" col-md-8">
                                            <input class="form-control" type="date" name="date_receive"
                                                data-date-format="dd-mm-yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Sauver
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
