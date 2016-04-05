/**
 * Created by Sinthujan on 8/3/2016.
 */
jQuery(window).load(function() {
    $(document).ready(function() {
        $("#ddMask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('.dTab table tbody tr  td').on('click',function() {
            $("#asDateModal").modal("show");
            $("#ordID").val($.trim($(this).closest('tr').children()[0].textContent));
            $("#getOrdDetsBtn").html("<button type=\"button\" class=\"btn btn-default pull-left\" onclick=\"document.location.href='/viewOrDets="+$.trim($(this).closest('tr').children()[0].textContent)+"'\">Get more Details</button>");
            $("#ordDate").val($.trim($(this).closest('tr').children()[1].textContent));
            $("#dDate").val($.trim($(this).closest('tr').children()[2].textContent));
            $("#ddMask").val($.trim($(this).closest('tr').children()[3].textContent));
        });

        $('table tbody tr  td.dbOrder').on('click', function () {
            $("#pricUpModal").modal("show");
            $("#iName").val($.trim($(this).closest('tr').children()[2].textContent));
            $("#iDescrip").val($.trim($(this).closest('tr').children()[3].textContent));
            $("#iSize").val($.trim($(this).closest('tr').children()[4].textContent));
            $("#iPrice").val($.trim($(this).closest('tr').children()[5].textContent));
        });

        $('table tbody tr  td.artOrdRe').on('click', function () {
            location.href = "/viewOrDets="+$.trim($(this).closest('tr').children()[0].textContent);
        });

        $('#emailOrd').on('shown.bs.modal',function(e){
            console.log(e.relatedTarget);
            $("#toH").val($.trim($(e.relatedTarget).text()));
        });

        $("#aItemTab").DataTable({
            "columnDefs": [ {
                "targets": [0,6],
                "orderable": false
            } ]
        });
        $("#artOrdersTab").DataTable();
        $("#asDateTab").DataTable();
        $("#aPageView").DataTable({
            "order" : [[1, "desc" ]]
        });
        $("#ordDetails").DataTable();


        $("#compose-textarea").wysihtml5();
        $('#pRepdRange').daterangepicker({
            format: 'YYYY-MM-DD'});
        $('#orddRange').daterangepicker({
            format: 'YYYY-MM-DD'});


        $('#aItemTab tbody').on('click', 'tr', function () {
            $(document).ready(function () {
                $(this).find('a.image-link').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });
            });
        });

        $('#ddMask').on('change', function () {
            $('#asnBtn').prop('disabled', false);
        });
        $('#asDateModal').on('hidden.bs.modal', function () {
            $('#asnBtn').prop('disabled', true);
        });

        $('#iDescrip').on('change', function () {
            $('#upPBtn').prop('disabled', false);
        });
        $('#iPrice').on('change', function () {
            $('#upPBtn').prop('disabled', false);
        });
        $('#pricUpModal').on('hidden.bs.modal', function () {
            $('#upPBtn').prop('disabled', true);
        });


    });
});


function confirmRemItem(ordID) {
    Lobibox.confirm({
        title: "Confirm item removal",
        msg: "Are you sure you want to remove this item?",
        callback: function ($this, type, ev) {
            if(type === 'yes')
                window.location = '/chIteStat/'+ordID;
            else
                return false;
        }
    });
    return false;
}

function confirmComOrd(ordID) {
    Lobibox.confirm({
        title: "Confirm order completion",
        msg: "Have you completed the order ID:- "+ordID+"?",
        callback: function ($this, type, ev) {
            if(type === 'yes')
                window.location = '/chOrdeStat/'+ordID;
            else
                return false;
        }
    });
    return false;
}