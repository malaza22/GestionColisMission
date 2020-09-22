@extends('layouts.app')

@section('principale')
<div class="section__content section__content--p30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="print col-12 p-4">
                <div class="col-12">
                    <div class="row">
                        <div style="width:120px; height:120px">
                            <img  src="{{asset('font-assets/images/logo.png')}}" alt="Gcolis";>
                        </div>
                        <div class="col-9">
                            <div class="col-11">
                                <h5>
                                    UNION DES OTIV DE LA PROVINCE DE TOAMASINA
                                </h5>
                            </div>
                            <div class="col-11">
                                <h5>
                                    ZONE << LITTORAL>>
                                </h5>
                            </div>
                            <div class="col-11">
                                <h6>
                                    Villa Sandry, 25 rue de la libération
                                </h6>
                            </div>
                            <div class="col-11">
                                <h6>
                                    Tél./Fax:53 323 05
                                </h6>
                            </div>
                            <div class="col-11">
                                <h6>
                                    TOAMASINA
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center p-4">
                    <h3><u>DECHARGE</u></h3>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                            <label class=" form-control-label"><u>Expediteur</u> :</label>
                        </div>
                        <div class="col-9">
                            <span>{{$mouvement->agenciesexpe->name}} Des OTIV de la province de TOAMASINA</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class=" form-control-label"><u>Destinataire</u> :</label>
                        </div>
                        <div class="col-9">
                            <span><u>{{$mouvement->agenciesdesti->name}}</u></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class=" form-control-label"><u>Date</u> : </label>
                        </div>
                        <div class="col-9">
                            <span><u>{{$mouvement->date_send}}</u></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <table class="table  table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th>N°</th>
                                <th>Nom produit</th>
                                <th>quantite produit</th>
                                <th>Amballage</th>
                                <th>quantite Amballage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parcel as $parce)
                            <tr>
                                <td class=" text-center">
                                    {{$parce->id}}
                                </td>
                                <td class=" text-center">
                                    {{$parce->products->name}}
                                </td>
                                <td class=" text-center">
                                    {{$parce->quantity_products}}
                                </td>
                                <td class=" text-center">
                                    {{$parce->packagings->name}}
                                </td>
                                <td class=" text-center">
                                    {{$parce->quantity_packagings}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <span><u>Accusé de reception</u>(Signature réceptionnaire)</span>
                        </div>
                        <div class="col-6">
                            <span class="float-right"><u>Signature expéditeur</u></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-9">
            <button id="print" class="btn btn-primary">Print</button>
            <a href="javascript:history.back()" class="btn btn-success">retour</a>
        </div>
    </div>
</div>
</div>
@section('script')
<script>
    $('#print').click(function(){
        $('.container').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: false,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "font-assets/vendor/bootstrap-4.1/bootstrap.min.css",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333,            // variable print delay
            header: null,               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });
    });
</script>
@endsection
@endsection
