<footer class="footer">
    <div class="container">
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing. <span class="glyphicon glyphicon-copyright-mark"></span> </p>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.tablesorter.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<scsript src="../js/jquery.tablesorter.pager.js"></scsript>
<script type="text/javascript">
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
            $("table")
                .tablesorter({widthFixed: true, widgets: ['zebra']})
                .tablesorterPager({container: $("#pager")});
        }
    );
</script>

</body>
</html>
