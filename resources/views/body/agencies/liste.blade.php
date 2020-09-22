@extends('layouts.index')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                        <h4> Liste Agence</h4>
                        <div>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small " href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code Agence</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>phone number</th>
                                        <th>Localisation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agency as $agence)
                                    <tr>
                                        <td style="width: 5%;">{{$number++}}</td>
                                        <td style="width: 13%;">{{$agence->id}}</td>
                                        <td style="width: 12%;">{{$agence->name}}</td>
                                        <td style="width: 15%;">{{$agence->email}}</td>
                                        <td style="width: 13%;">{{$agence->phone_number}}</td>
                                        <td style="width: 12%;">{{$agence->location}}</td>
                                        <td style="width: 10%;">
                                            <div class="table-data-feature">
                                                <button class="item" data-agname="{{$agence->name}}"
                                                    data-agemail="{{$agence->email}}"
                                                    data-agphone_number="{{$agence->phone_number}}"
                                                    data-aglocation="{{$agence->location}}" data-agid={{$agence->id}}
                                                    data-toggle="modal" data-target="#edite"><i
                                                        class="zmdi zmdi-edit"></i>
                                                </button>

                                                <button class="item" data-agname="{{$agence->name}}"
                                                    data-agid={{$agence->id}} data-toggle="modal"
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
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Ajouter Agence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/add-agency') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom Agence</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="name" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="phone_number" class=" form-control-label">telephone</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="location" class=" form-control-label">localisation</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="location" class="form-control">
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
{{--EDITE AGENCE--}}
<div class=" modal fade" id="edite" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Modifier Agence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update-agency','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom Agence</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="name" id="name" value="" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="email" id="email" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="phone_number" class=" form-control-label">telephone</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="phone_number" id="phone_number" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="location" class=" form-control-label">localisation</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" name="location" id="location" value="" class="form-control">
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
{{--DELETE--}}
<div class=" modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Supprission Agence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('destroy-agency','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        Vous voulez vraiment supprimer Agence ??.
                    </p>
                    <input type="hidden" name="id" id="ag_id" value="">
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
        var name = button.data('agname')
        var email = button.data('agemail')
        var phone_number = button.data('agphone_number')
        var location = button.data('aglocation')
        var id = button.data('agid')

        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone_number').val(phone_number);
        modal.find('.modal-body #location').val(location);
        modal.find('.modal-body #id').val(id);
    })

    $('#delete').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var ag_id = button.data('agid')

        var modal = $(this)

        modal.find('.modal-body #ag_id').val(ag_id);
    })
</script>
@endsection
@endsection
