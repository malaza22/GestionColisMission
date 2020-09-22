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
                        <h4>Ajouter des colis</h4>
                        <a class="au-btn au-btn-icon btn-success au-btn--small" href="{{url('/liste-preparation')}}">
                            <i class="fa fa-list-alt"></i></a>
                    </div>
                    <div class="card-header">
                        <p class="text-uppercase">
                            <strong>{{$preparation->id.' / '. $preparation->personals->lastname.' / '.$preparation->date_preparation}}</strong>
                        </p>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/add-preparation/'.$preparation->id)}}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col-md-1">
                                    {{-- <label for="product_color" class=" form-control-label">Details :</label> --}}
                                </div>
                                <div class=" col-md-11 ">
                                    <div class="row">
                                        <label class="col-md-3 form-label">Produit</label>
                                        <label class="col-md-2 form-label">Qte Produit</label>
                                        <label class="col-md-3 form-label">Amballage</label>
                                        <label class="col-md-2 form-label">Qte Amballage</label>
                                    </div>
                                </div>
                                <div class="col-md-1">

                                </div>
                                <div class=" col-md-11 ">
                                    <div class="field_wrapper">
                                        <div class="row">
                                            <select class="col-md-3 form-control" name="products_id[]" id="products_id"
                                                value="{{$product_dropdown}}">
                                                <?php echo $product_dropdown ?>
                                            </select>
                                            <input type="text" id="quantity_products" name="quantity_products[]"
                                                class="col-md-2 form-control">
                                            <select class="col-md-3 form-control" name="packagings_id[]"
                                                id="packagings_id" value="{{$packaging_dropdown}}">
                                                <?php echo $packaging_dropdown ?>
                                            </select>
                                            <input type="text" id="quantity_packagings" name="quantity_packagings[]"
                                                class="col-md-2 form-control">
                                            <button type="button" class="addRow btn btn-success">
                                                <i class="fa fa-plus"></i></button>
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
                    <div class="card-header card-block">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID colis</th>
                                        <th>Nom produit</th>
                                        <th>quantite produit</th>
                                        <th>Amballage</th>
                                        <th>quantite Amballage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parcel as $parce)
                                    <tr>
                                        <td>{{$parce->id}}</td>
                                        <td>{{$parce->products->name}}</td>
                                        <td>{{$parce->quantity_products}}</td>
                                        <td>{{$parce->packagings->name}}</td>
                                        <td>{{$parce->quantity_packagings}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/edite-parcel/'.$parce->id)}}" class="item  edit"
                                                    data-placement="top" title="Edit" data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-parcel/'.$parce->id)}}" class="item"
                                                    data-placement="top" title="delete">
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
@section('script')
<script>
    var maxField = 10;//Input fields incriment limitation
        var add = $('.addRow');//Add button selector
        var wrapper = $('.field_wrapper');//Input field wrapper
        var fieldHTML ='<div class="row">'+
                            '<select class="col-md-3 form-control" name="products_id[]" id="products_id" value="{{$product_dropdown}}">'+
                                "<?php echo $product_dropdown ?>"+
                            '</select>'+
                            '<input type="text" id="quantity_products" name="quantity_products[]" class="col-md-2 form-control">'+
                            '<select class="col-md-3 form-control" name="packagings_id[]" id="packagings_id" value="{{$packaging_dropdown}}">'+
                                "<?php echo $packaging_dropdown ?>"+
                            '</select>'+
                            '<input type="text" id="quantity_packagings" name="quantity_packagings[]" class="col-md-2 form-control">'+
                            '<button type="button" class="removeRow btn btn-danger"><i class="fa fa-close"></i></button>'+
                        '</div>';
        var x = 0;
        $(add).click(function() {
            //check maximum number of input fields
        if(x < maxField){
            x++;//Increment field counter
            $(wrapper).append(fieldHTML);
            };
        });
        $(wrapper).on('click','.removeRow', function (e) {
            e.preventDefault();
            $(this).parent('.row').remove();//Remove field html
            x--;//Decrement field counter
        });
</script>
@endsection
@endsection
