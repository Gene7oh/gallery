<footer class="modal-footer" style="color: antiquewhite">
    <h3 class="lead" style="color: lightblue;">Footer Stuff</h3>
    <div class="row">
        <div class="col-lg-4">
            <p class="lead">Copyright &copy; Your Website 2014</p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <p class="lead">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <p class="lead">Copyright &copy; Your Website 2023</p>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</footer>
</div>
<!-- /#wrapper -->
<!--  /* ↓↓ Pie chart script */   -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Session Views',  <?php echo $session->count;?>],
            ['Comment Count',  <?php echo Comment::countAll();?>],
            ['User Count',     <?php echo User::countAll();?>],
            ['Photo Count',    <?php echo Photo::countAll();?>],
        ]);
        
        var options = {
            title: 'Total Gallery Activities',
            pieSliceText: 'label',
            /*legend: {
                position: 'right'
        },*/
            backgroundColor: 'transparent',
            slices: {
                // 1: {offset: 0.08},
                2: {offset: 0.07},
                // 3: {offset: 0.1},
            },
            titleTextStyle: {
                color: 'darkred',
                fontSize: 20
            }
        };
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
        chart.draw(data, options);
    }
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
