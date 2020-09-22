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
                        <h4>Liste Personnel</h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-personnel')}}">
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
                                        <th>N°</th>
                                        <th>Code personnel</th>
                                        <th>Profession</th>
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>email</th>
                                        <th>telephone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personals as $personal)
                                    <tr>
                                        <td>{{$number++}}</td>
                                        <td>{{$personal->id}}</td>
                                        <td>{{$personal->jobs->description}}</td>
                                        <td>{{$personal->lastname}}</td>
                                        <td>{{$personal->firstname}}</td>
                                        <td>{{$personal->email}}</td>
                                        <td>{{$personal->phone_number}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-perjobs_id="{{$personal->jobs_id}}"
                                                    data-perlastname="{{$personal->lastname}}"
                                                    data-perfirstname="{{$personal->firstname}}"
                                                    data-peremail="{{$personal->email}}"
                                                    data-perphone_number="{{$personal->phone_number}}"
                                                    data-perid={{$personal->id}} data-toggle="modal"
                                                    data-target="#edite"><i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-perid={{$personal->id}} data-toggle="modal"
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
                <h5 class="modal-title p-2" id="staticModalLabel">Ajouter Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('/add-personal') }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="jobs_id" class=" form-control-label">proffession</label>
                        </div>
                        <div class=" col-md-9">
                            <select class="form-control" name="jobs_id" id="jobs_id" value="{{$job_dropdown}}">
                                <?php echo $job_dropdown ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="lastname" class=" form-control-label">nom</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="lastname" name="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="firstname" class=" form-control-label">prenom</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="firstname" name="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="phone_number" class=" form-control-label">numero telephone</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="phone_number" name="phone_number" class="form-control">
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
                </div>
            </form>
        </div>
    </div>
</div>
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
            <form action="{{url('update-personal','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="jobs_id" class=" form-control-label">proffession</label>
                        </div>
                        <div class=" col-md-9">
                            <select name="jobs_id" id="jobs_id"  class="form-control">
                                <option value="" disabled>select</option>
                                @foreach ($job as $jobs)
                                <option value="{{$jobs->id}}" @if($jobs->id==$personal->job_id)
                                    selected @endif>{{$jobs->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="lastname" class=" form-control-label">nom</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="lastname" name="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="firstname" class=" form-control-label">prenom</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="firstname" name="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="email" class=" form-control-label">email</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" col-md-2">
                            <label for="phone_number" class=" form-control-label">numero telephone</label>
                        </div>
                        <div class=" col-md-9">
                            <input type="text" id="phone_number" name="phone_number" class="form-control">
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
                <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" />
                <h5 class="modal-title p-2" id="staticModalLabel">Supprission Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('destroy-personal','test')}}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        Vous voulez vraiment supprimer Personnel ??.
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
        var jobs_id= button.data('perjobs_id')
        var lastname= button.data('perlastname')
        var firstname= button.data('perfirstname')
        var email= button.data('peremail')
        var phone_number= button.data('perphone_number')
        var id = button.data('perid')
        var modal = $(this)
        modal.find('.modal-body #jobs_id').val(jobs_id);
        modal.find('.modal-body #lastname').val(lastname)
        modal.find('.modal-body #firstname').val(firstname);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone_number').val(phone_number);
        modal.find('.modal-body #id').val(id);
    })
    $('#delete').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('perid')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection
