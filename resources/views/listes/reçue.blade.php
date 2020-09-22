@extends('layouts.index')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <h4>Liste Colis reçue</h4>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>date envoyer</th>
                                        <th>Expediteur</th>
                                        <th>date recevoir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parcel as $parcels)
                                    <tr>
                                        <td>{{$parcels->date_envoi}}</td>
                                        <td>{{$parcels->agence}}</td>
                                        <td>
                                            @if (!empty($parcels->message) && $parcels->message == 1)
                                            <div class="alert alert-sm alert-success">
                                                <div>Reçue</div>
                                                {{$parcels->date_recevoir}}
                                            </div>
                                            @else
                                            <div class="alert alert-sm alert-warning">Encours</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/view-reçue/'.$parcels->id)}}" class="item"
                                                    title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if (empty($parcels->date_recevoir))
                                                <a href="{{url('/aquis-reçue/'.$parcels->id)}}" class="item"
                                                    title="View">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                @endif
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
