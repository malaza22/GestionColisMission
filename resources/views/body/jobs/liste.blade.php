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
                        <h4>Liste Proffession</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-job')}}">
                                <i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="form-group">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code Proffession</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td style="width: 10%;">{{$number++}}</td>
                                        <td style="width: 35%;">{{$job->id}}</td>
                                        <td style="width: 40%;">{{$job->description}}</td>
                                        <td style="width: 15%;">
                                            <div class="table-data-feature">
                                                {{-- <a href="{{url('/edite-job/'.$job->id)}}" class="item  edit"
                                                    data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{url('/destroy-job/'.$job->id)}}" class="item"
                                                    data-placement="top" title="delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a> --}}
                                                <button class="item" data-prodescription="{{$job->description}}"
                                                    data-proid={{$job->id}} data-toggle="modal"
                                                    data-target="#edite"><i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-proid={{$job->id}} data-toggle="modal"
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
{{-- ADD JOBS --}}
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18"/>
                <h5 class="modal-title p-2" id="staticModalLabel">Ajouter Proffession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-job') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="description" class=" form-control-label">description</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="description" name="description" class="form-control" autofocus>
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
                <h5 class="modal-title p-2" id="staticModalLabel">Modifier Proffession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update-job','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="description" name="description" class="form-control">
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
                <h5 class="modal-title p-2" id="staticModalLabel">Supprission Proffession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('destroy-job','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        Vous voulez vraiment supprimer Proffession ??.
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
        var description = button.data('prodescription')
        var id = button.data('proid')

        var modal = $(this)

        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #id').val(id);
    })
    $('#delete').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('proid')

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection
