@extends('layouts.index')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">

        @include('partials.message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header overview-wrap">
                        <h4>Liste Colis envoyer</h4>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group well">
                            <table id="table_id" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>date envoyer</th>
                                        <th>Destinateur</th>
                                        <th>date recevoir / Message</th>
                                        <th>View / Imprimer(pdf)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listenvoi as $listenvois)
                                    <tr>
                                        <td>{{$listenvois->date_envoi}}</td>
                                        <td>{{$listenvois->agence}}</td>
                                        <td>
                                            @if (!empty($listenvois->message) && $listenvois->message == 1)
                                                <div class="alert alert-sm alert-success">
                                                    <div>Reçue</div>
                                                    {{$listenvois->date_recevoir}}
                                                </div>
                                            @else
                                                <div class="alert alert-sm alert-warning">Encours</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{url('/view-envoyer/'.$listenvois->id)}}" class="item"
                                                    title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('print',$listenvois->id) }}" class="item"
                                                    title="View">
                                                    <i class="fa fa-print"></i>
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
@section('script')
<script>
    $(document).ready(function(){
        $('.btnprint').printPage()
    });
</script>
@endsection
@endsection
