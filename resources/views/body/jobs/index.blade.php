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
                        <h4>Ajouter /Proffession</h4>
                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="{{url('/list-job')}}">
                            <i class="fa fa-list-alt"></i></a>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/add-job') }}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class=" col-md-2">
                                    <label for="description" class=" form-control-label">description</label>
                                </div>
                                <div class=" col-md-9">
                                    <input type="text" id="description" name="description" class="form-control"
                                        autofocus>
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
@endsection
