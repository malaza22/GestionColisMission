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
                        <h4>Ajouter /Edite Personnel </h4>
                        <div>
                            <a class="au-btn au-btn--green au-btn--small" href="{{url('/add-personnel')}}">
                                <i class="fa fa-asterisk"></i></a>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="#" data-toggle="modal"
                                data-target="#staticModal">
                                <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table-sm col-md-12 table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID personnel</th>
                                        <th>nom</th>
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>email</th>
                                        <th>telephone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="{{url('/edite-personal/'.$personal->id)}}" method="POST"
                                            enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <td><input type="text" name="id" style="font-size: 12px"
                                                    class=" form-control" value="{{$personal->id}}" disabled></td>
                                            <td style="width:25%">
                                                <select name="jobs_id" class=" form-control">
                                                    <option value="{{$personal->jobs->description}}" disabled>select
                                                    </option>
                                                    @foreach ($job as $jobs)
                                                    <option value="{{$jobs->id}}" @if($jobs->id==$personal->job_id)
                                                        selected @endif>{{$jobs->description}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="lastname" style="font-size: 12px"
                                                    class=" form-control" value="{{$personal->lastname}}"></td>
                                            <td><input type="text" name="firstname" style="font-size: 12px"
                                                    class=" form-control" value="{{$personal->firstname}}"></td>
                                            <td style="width:20%"><input type="text" name="email" style="font-size: 12px"
                                                    class=" form-control" value="{{$personal->email}}"></td>
                                            <td><input type="text" name="phone_number" style="font-size: 12px"
                                                    class=" form-control" value="{{$personal->phone_number}}"></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button type="submit" class="item  edit" data-placement="top"
                                                        title="sauver">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <a href="{{url('/list-personal')}}" class="item"
                                                        data-placement="top" title="retour">
                                                        <i class="fa fa-hand-o-down"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID personnel</th>
                                        <th>nom</th>
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>email</th>
                                        <th>telephone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($personals as $person)
                                    <tr>
                                        <td>{{$person->id}}</td>
                                        <td>{{$person->jobs->description}}</td>
                                        <td>{{$person->lastname}}</td>
                                        <td>{{$person->firstname}}</td>
                                        <td>{{$person->email}}</td>
                                        <td>{{$person->phone_number}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{('/edite-personal/'.$person->id)}}" class="item  edit"
                                                    data-placement="top" title="Edit" data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{('/destroy-personal/'.$person->id)}}" class="item"
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
{{-- ADD AGENCE --}}
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Ajouter Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{url('/add-personal') }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    {{ csrf_field() }}
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
