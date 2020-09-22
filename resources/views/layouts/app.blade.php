<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="shortcut icon" href="{{asset('font-assets/images/logo1.ico')}}" type="image/x-icon; charset=binary">
    <!-- Title Page-->
    <title>OTIV Gcolis</title>
    <!-- Fontfaces CSS-->
    <link href="{{asset('font-assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet"
        media="all">
    <link href="{{asset('font-assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{asset('font-assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="{{asset('font-assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('font-assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('font-assets/css/theme.css')}}" rel="stylesheet" media="all">
    {{-- Datatable css --}}
    <link href="{{asset('font-assets/datatable/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-assets/datatable/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet">
    {{-- notification --}}
    <link href="{{asset('latest/toastr.min.css')}}" rel="stylesheet">

    <style>
        .au-btn,.modal-header {
            background-color: #62a274
        }
    </style>
</head>

<body class="animsition" style="font-size:12px;">

    <!-- HEADER DESKTOP-->
    @yield('principale')
    <!-- END PAGE CONTAINER-->

    <!-- Jquery JS-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
     <!-- Bootstrap JS-->
    <script src="{{asset('font-assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('font-assets/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('font-assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('font-assets/vendor/select2/select2.min.js')}}"></script>
    {{-- Datatable js --}}
    <script src="{{asset('font-assets/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('font-assets/datatable/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('font-assets/datatable/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('font-assets/datatable/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    {{-- notification js --}}
    <script src="{{asset('js/cleave-phone.mg.js')}}"></script>
    
    <script src="{{asset('js/cleave.min.js')}}"></script>
    <script src="{{asset('js/cleave-phone.mg.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('font-assets/js/main.js')}}"></script>

    <script src="{{asset('js/jquery.printPage.js')}}"></script>
    <script src="{{asset('js/printThis.js')}}"></script>
    <script>
        $(function () {

                $("#table_id").DataTable({
                    responsive:true,
                    // paging: false,
                    // bFilter: false,
                    // info:false,
                    lengthMenu: [[5,10,15,20,25,50 -1], [5,10,15,20,25,50, "All"]],

                language: {
                    processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                    },
                    aria:  {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                            }
                        }
                    });
                });
    </script>
    @yield('script')
</body>
</html>
<!-- end document-->
