@extends('layouts.master')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        @include('partials.message')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                        <h4>Mon compte</h4>
                        <div>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small " href="javascript:history.back()" data-toggle="modal"
                                data-target="#staticModal">Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Code Agence</th>
                                        <th>Nom</th>
                                        <th>Agence</th>
                                        <th>email</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($agency as $agence) --}}
                                    <tr>
                                        <td style="width: 5%;">{{$number++}}</td>
                                        <td style="width: 10%;">{{Auth()->user()->id}}</td>
                                        <td style="width: 13%;">{{Auth()->user()->name}}</td>
                                        <td style="width: 12%;">{{Auth()->user()->agencies->name}}</td>
                                        <td style="width: 15%;">{{Auth()->user()->email}}</td>
                                        <td style="width: 5%;">
                                            <div class="table-data-feature">
                                                <button class="item" data-usid="{{Auth()->user()->id}}"
                                                    data-usname="{{Auth()->user()->name}}"
                                                    data-usemail="{{Auth()->user()->email}}"
                                                    data-toggle="modal"
                                                    data-target="#edite"><i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" modal fade" id="edite" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Modifier User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update-user','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="name" class=" form-control-label">nom user</label>
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
@section('script')
<script>
    $('#edite').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var name = button.data('usname')
        var email = button.data('usemail')
        var id = button.data('usid')
        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection
