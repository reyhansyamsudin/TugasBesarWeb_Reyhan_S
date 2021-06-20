    <!-- footer -->
    <script src="{{url('dashboard/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{url('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{url('dashboard/js/chart.min.js')}}"></script>
    <script src="{{url('dashboard/js/chart-data.js')}}"></script>
    <script src="{{url('dashboard/js/easypiechart.js')}}"></script>
    <script src="{{url('dashboard/js/easypiechart-data.js')}}"></script>
    <script src="{{url('dashboard/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('dashboard/js/custom.js')}}"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js "></script>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
$(document).ready(function() {
    $('#tableok').DataTable();
} );
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>

