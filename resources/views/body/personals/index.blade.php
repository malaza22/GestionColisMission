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
                            <h4>Ajouter /Personnel</h4>
                            <a class="au-btn au-btn-icon au-btn--blue au-btn--small" href="{{url('/list-personal')}}">
                            <i class="fa fa-list-alt"></i></a>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{url('/add-personal')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                        <input type="text" id="lastname" name="lastname"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class=" col-md-2">
                                        <label for="firstname" class=" form-control-label">prenom</label>
                                    </div>
                                    <div class=" col-md-9">
                                        <input type="text" id="firstname" name="firstname"  class="form-control">
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
                                        <input type="text" id="phone_number" name="phone_number"  class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Sauver
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        var cleave = new Cleave('.input-element', {
            date: true,
            delimiter: '/',
            datePattern: ['d', 'm', 'Y']
        });
    </script>
@endsection
@endsection
