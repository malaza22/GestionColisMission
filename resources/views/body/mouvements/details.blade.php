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
                        <h4>Liste des colis prèt envoyer en detail</h4>
                    </div>
                    <div class="card-header">
                        <p class="text-uppercase"><strong>{{$preparation->id.' / '. $preparation->personals->lastname.' / '.$preparation->date_preparation}}</strong></p>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>id</th>
                                        <th>Nom produit</th>
                                        <th>quantite produit</th>
                                        <th>Amballage</th>
                                        <th>quantite Amballage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{$number = 0}}
                                    @foreach($parcel as $parce)
                                        <tr>
                                            <td>{{++$number}}</td>
                                            <td>{{$parce->id}}</td>
                                            <td>{{$parce->products->name}}</td>
                                            <td>{{$parce->quantity_products}}</td>
                                            <td>{{$parce->packagings->name}}</td>
                                            <td>{{$parce->quantity_packagings}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="{{url('/liste-mouvement')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
