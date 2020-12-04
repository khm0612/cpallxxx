<script type="text/javascript">
    $(function() {
        var txt = "<?php echo $_POST['txt']; ?>";
        var x = '';
        if (txt.length > 0) {
            x = '?x=' + txt;
        }
        $.getJSON("http://localhost/sing9/new/json_search_km.php" + x, function(data) {
            if (data != null && data.length > 0) { // ถ้ามีข้อมูล
                var ress = '';
                var rf = 1;
                ress += '<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                $.each(data, function(idx, obj) {
                    ress += '<div class="card">';
                    ress += '<div class="card-header" role="tab" id="heading' + rf + '">';
                    ress += '<a data-toggle="collapse" data-parent="#accordionEx" href="#collapse' + rf + '" aria-expanded="true" aria-controls="collapse' + rf + '">';
                    ress += '<h5>' + data[idx].topic + '</h5>';
                    ress += '</a>';

                    ress += '<p style="font-size:9pt;color:#aaaaaa;"> Category : <span style="color:#0000AF;">' + data[idx].cate + '</span>&nbsp;&nbsp;&nbsp;';
                    ress += 'Sub-Category : <span style="color:#0000AF;">' + data[idx].subcate + '</span>&nbsp;&nbsp;&nbsp;';
                    ress += 'Last update : <span style="color:#0000AF;">' + data[idx].lastupdate + '</span></p>';

                    ress += '</div>';

                    ress += '<div id="collapse' + rf + '" class="collapse" role="tabpanel" aria-labelledby="heading' + rf + '" data-parent="#accordionEx">';
                    ress += '<div class="card-body">';
                    ress += data[idx].description;
                    ress += '</div>';
                    ress += '</div>';

                    ress += '</div>';
                    rf++;
                });
                ress += '</div>'
                $("#showData").html(ress);
            }
        });
    });
</script>