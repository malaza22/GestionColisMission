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
                        <form action="{{url('/add-mouvement')}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Destinateur</label>
                                </div>
                                <div class=" col-md-9">
                                    <select class="form-control" name="agenciesdesti_id" value="{{$agency_dropdown}}">
                                        <?php echo $agency_dropdown ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="name" class=" form-control-label">Service Expediteur</label>
                                </div>
                                <div class=" col-md-9">
                                    <select class="form-control" name="services_id" value="{{$services_dropdown}}">
                                        <?php echo $services_dropdown ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="email" class=" form-control-label">Coursier</label>
                                </div>
                                <div class=" col-md-9">
                                    <select class="form-control" name="personals_id" value="{{$personals_dropdown}}">
                                        <?php echo $personals_dropdown ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="phone_number" class=" form-control-label">Date envoi</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="date" id="date" name="date" class="form-control" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="location" class=" form-control-label">Colis</label>
                                </div>
                                <div class=" col-md-9">
                                    <select class="form-control" name="preparations_id"
                                        value="{{$preparation_dropdown}}">
                                        <?php echo $preparation_dropdown ?>
                                    </select>
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
