<!-- Bootstrap core JavaScript-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->

<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->

<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- Third Party js-->
<script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
          "language":{
            "url" : "//cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
          }
        });
      } );
</script>
