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
                        <h4>Ajouter Preparation</h4>
                    </div>
                    <form action="{{url('/add-preparation')}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label class=" form-control-label">personals</label>
                                </div>
                                <div class=" col-md-9">
                                    <select class="form-control" name="personals_id" id="personals_id"
                                        value="{{$personals_dropdown}}">
                                        <?php echo $personals_dropdown ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label class=" form-control-label">Date envoyer</label>
                                </div>
                                <div class=" col-md-9">
                                    <input class="form-control" type="date" name="date_preparation" id="date_preparation" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Sauver
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
