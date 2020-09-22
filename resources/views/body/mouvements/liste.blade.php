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
                        <h4>Liste Colis Encours d'envoi</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-preparation')}}"><i
                                    class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#"
                                data-toggle="modal"
                                data-target="#addModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code preparation</th>
                                        <th>Colis</th>
                                        <th>destination</th>
                                        <th>Service</th>
                                        <th>Coursier</th>
                                        <th>date d'envoi</th>
                                        <th>Action</th>
                                        <th>Envoi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mouvement_temporary as $mouvement_temporaries)
                                    <tr>
                                        <td>{{$number++}}</td>
                                        <td>{{$mouvement_temporaries->id}}</td>
                                        <td><a href="{{url('/view-mouvement/'.$mouvement_temporaries->preparations_id)}}"
                                                class="item"
                                                title="View">{{$mouvement_temporaries->preparations_id}}</a></td>
                                        <td>{{$mouvement_temporaries->agenciesdesti->name}}</td>
                                        <td>{{$mouvement_temporaries->services->name}}</td>
                                        <td>{{$mouvement_temporaries->personals->lastname}}</td>
                                        <td>{{$mouvement_temporaries->date_send}}</td>

                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/view-mouvement/'.$mouvement_temporaries->preparations_id)}}"
                                                    class="item" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{url('/edite-mouvement/'.$mouvement_temporaries->id)}}"
                                                    class="item" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-mouvement/'.$mouvement_temporaries->id)}}"
                                                    class="item" data-placement="top" title="delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/liste-mouvement/'.$mouvement_temporaries->id)}}"
                                                    class="item" title="Plus">
                                                    <i class="fa fa-send"></i>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Add preparation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-mouvement')}}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class=" col-md-2">
                                <label for="agenciesdesti_id" class=" form-control-label">Destinateur</label>
                            </div>
                            <div class=" col-md-9">
                                <select class="form-control" name="agenciesdesti_id" value="{{$agency_dropdown}}">
                                    <?php echo $agency_dropdown ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" col-md-2">
                                <label for="services_id" class=" form-control-label">Service Expediteur</label>
                            </div>
                            <div class=" col-md-9">
                                <select class="form-control" name="services_id" value="{{$services_dropdown}}">
                                    <?php echo $services_dropdown ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" col-md-2">
                                <label for="personals_id" class=" form-control-label">Coursier</label>
                            </div>
                            <div class=" col-md-9">
                                <select class="form-control" name="personals_id" value="{{$personals_dropdown}}">
                                    <?php echo $personals_dropdown ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="date_send" class=" form-control-label">Date envoi</label>
                            </div>
                            <div class=" col-md-9">
                                <input type="date" name="date_send" class="form-control" data-date-format="dd-mm-yyyy">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" col-md-2">
                                <label for="preparations_id" class=" form-control-label">Colis</label>
                            </div>
                            <div class=" col-md-9">
                                <select class="form-control" name="preparations_id" value="{{$preparation_dropdown}}">
                                    <?php echo $preparation_dropdown ?>
                                </select>
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
</div>
@endsection
