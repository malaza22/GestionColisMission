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
                        <h4>Edite colis</h4>
                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="{{url('/list-agency')}}">
                            <i class="fa fa-list-alt"></i></a>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/edite-parcel/'.$parcel->id) }}" method="POST"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="name" class=" form-control-label">Produit</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="products_id" class=" form-control" autofocus>
                                        <option value="{{$parcel->products_id}}" disabled>select
                                        </option>
                                        @foreach ($product as $products)
                                        <option value="{{$products->id}}" @if($products->id==$parcel->products_id)
                                            selected @endif>{{$products->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="quantity_products" class=" form-control-label">Qte Produit</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="text" id="quantity_products" name="quantity_products"
                                        class="form-control" value="{{$parcel->quantity_products}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="packagings_id" class=" form-control-label">Emballage</label>
                                </div>
                                <div class=" col-md-9">
                                    <select name="packagings_id" class=" form-control" autofocus>
                                        <option value="{{$parcel->packagings_id}}" disabled>select
                                        </option>
                                        @foreach ($packaging as $packagings)
                                        <option value="{{$packagings->id}}" @if($packagings->id==$parcel->packagings_id)
                                            selected @endif>{{$packagings->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="quantity_packagings" class=" form-control-label">Qte Emballage</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="text" id="quantity_packagings" name="quantity_packagings"
                                        class="form-control" value="{{$parcel->quantity_packagings}}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Sauver
                                </button>
                                <a class="btn btn-danger btn-sm" data-dismiss="modal"
                                    href="{{url('/add-preparation/'.$parcel->preparations_id)}}">
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
