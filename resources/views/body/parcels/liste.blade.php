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
                        <h4>Liste personne avec colis prèt Envoyer </h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-preparation')}}"
                                title="nouveau"><i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#addModal" title="nouveau">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Personnel</th>
                                        <th>date de preparation</th>
                                        <th>View / Ajout-plus</th>
                                        <th>Edite / Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listeprepa as $preparations)
                                    <tr>
                                        <td>{{$preparations->id}}</td>
                                        <td>{{$preparations->Coursier}}</td>
                                        <td>{{$preparations->date_preparation}}</td>
                                        <td>
                                            <div class="table-data-feature ">
                                                <a href="{{url('/view-preparation/'.$preparations->id)}}" class="item"
                                                    title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                {{-- <button class="item"
                                                    data-prepaid={{$preparations->id}}
                                                data-toggle="modal" data-target="#view">
                                                <i class="fa fa-eye"></i>
                                                </button> --}}
                                                <a href="{{url('/add-preparation/'.$preparations->id)}}" class="item"
                                                    title="Plus">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item"
                                                    data-prepaCoursier="{{$preparations->Coursier}}"
                                                    data-prepadate="{{$preparations->date_preparation}}"
                                                    data-prepaid={{$preparations->id}} data-toggle="modal"
                                                    data-target="#edite">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-prepaid={{$preparations->id}}
                                                    data-toggle="modal" data-target="#delete">
                                                    <i class="zmdi zmdi-delete"></i>
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

{{-- AJOUTER PREPARATION --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Ajouter preparation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('/add-preparation')}}" method="POST" enctype="multipart/form-data"
                class="form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class=" col-md-4">
                                <label class=" form-control-label">personals</label>
                            </div>
                            <div class=" col-md-8">
                                <select class="form-control" name="personals_id" id="personals_id"
                                    value="{{$personals_dropdown}}">
                                    <?php echo $personals_dropdown ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" col-md-4">
                                <label class=" form-control-label">Date envoyer</label>
                            </div>
                            <div class=" col-md-8">
                                <input class="form-control" type="date" name="date_preparation" id="date_preparation"
                                    data-date-format="dd-mm-yyyy">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i>Save
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-ban"></i>Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- VIEW PREPARATION --}}
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Liste colis prepare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form action="{{url('view-preparation','test')}}" method="post" enctype="multipart/form-data"
            class="form-horizontal"> --}}
            {{csrf_field()}}
            <div class="card-body card-block">
                <input type="hidden" name="preid" id="preid" value="">
                <div class="form-group">
                    <table id="table_id" class="table  table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom produit</th>
                                <th>quantite produit</th>
                                <th>Amballage</th>
                                <th>quantite Amballage</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-primary" data-dismiss="modal" href="#">Retour</a>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

{{-- EDITE PREPARATION --}}
<div class=" modal fade" id="edite" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Modifier Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update-preparation','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="preid" value="">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label class=" form-control-label">personals</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="personals_id" id="personals_id">
                                <option value="" disabled>select</option>
                                @foreach ($personals as $personal)
                                <option value="{{$personal->id}}">{{$personal->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label class=" form-control-label">Date envoyer</label>
                        </div>
                        <div class=" col-md-9">
                            <input class="form-control" type="date" name="date_preparation" id="date_preparation"
                                data-date-format="dd-mm-yyyy">
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

{{-- DELETE PREPARATION --}}
<div class=" modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Supprission Preparation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('destroy-preparation','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        Vous voulez vraiment supprimer preparation ??.
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
    $('#view').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var preid = button.data('prepaid')
        var modal = $(this)
        modal.find('.card-body #preid').val(preid);
    })

    $('#edite').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var personals = button.data('prepaCoursier')
        var date_preparation = button.data('prepadate')
        var preid = button.data('prepaid')
        var modal = $(this)
        modal.find('.modal-body #personals').val(personals);
        modal.find('.modal-body #date_preparation').val(date_preparation)
        modal.find('.modal-body #preid').val(preid);
    })

    $('#delete').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('prepaid')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })

</script>
@endsection
@endsection
