</div>
<script src="public/gcms/js/jquery-3.3.1.min.js"></script>
<script src="public/gcms/js/bootstrap.min.js"></script>
<script src="public/gcms/js/all.js"></script>
<script src="public/gcms/js/js_code.js"></script>
<script>
    var baseurl = "<?php echo base_url(); ?>";
</script>
<script src="public/gcms/js/jquery_code.js"></script>
<script>
    $(document).ready(function () {
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    })
</script>

</body>
</html>