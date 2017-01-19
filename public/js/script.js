/**
 * Created by super on 1/6/2017.
 */
$(document).ready(function () {
    $('#st-tbl-mark-fe').DataTable({
        paging:false,
        searching:false,
        info:false,
        autoWidth:false
    });
    $(".button-collapse").sideNav({
        menuWidth: 150,
    });
});