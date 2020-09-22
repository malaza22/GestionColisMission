@extends('layouts.index')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <h4>Liste Colis-reçue en detail</h4>
                    </div>
                    <div class="card-header">
                        <p class="text-uppercase"><strong>{{$mouvement->id.' / '. $mouvement->agenciesexpe->name.' / '.$mouvement->date_receive}}</strong></p>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Nom produit</th>
                                        <th>quantite produit</th>
                                        <th>Amballage</th>
                                        <th>quantite Amballage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parcel as $parce)
                                        <tr>
                                            <td>{{$parce->products->name}}</td>
                                            <td>{{$parce->quantity_products}}</td>
                                            <td>{{$parce->packagings->name}}</td>
                                            <td>{{$parce->quantity_packagings}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="{{url('/liste-reçue')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
