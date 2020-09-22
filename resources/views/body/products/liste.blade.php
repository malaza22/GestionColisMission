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
                        <h4>Liste Produit</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-product')}}">
                                <i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID produit</th>
                                        <th>nom</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $products)
                                    <tr>
                                        <td>{{$products->id}}</td>
                                        <td>{{$products->name}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item"
                                                    data-prodname="{{$products->name}}"
                                                    data-prodid={{$products->id}}
                                                    data-toggle="modal"
                                                    data-target="#edite"><i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item"
                                                    data-prodid={{$products->id}}
                                                    data-toggle="modal"
                                                    data-target="#delete"><i class="zmdi zmdi-delete"></i>
                                                </button>
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
{{-- ADD AGENCE --}}
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Ajouter produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-product') }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom produit</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Save
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-ban"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=" modal fade" id="edite" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Modifier Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update-product','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom produit</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class=" modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Supprission Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('destroy-product','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        Vous voulez vraiment supprimer Produit ??.
                    </p>
                    <input type="hidden" name="id" id="id" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Oui
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Non
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
<script>
    $('#edite').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var name = button.data('prodname')
        var id = button.data('prodid')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #id').val(id);
    })

    $('#delete').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('prodid')

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection
