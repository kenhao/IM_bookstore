var tbl;
$(function() {
    //查詢
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "displayLength": 10,
        "paginate": true, //是否分頁
        "lengthChange": true,
        "ajax": {
            url: "datatable_emember.php",
            data: function(d) {
                return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
        },
        "dom": 'frtip'
    });

    //修改
    $('tbody').on('click', '#btn_update', function() {
        var data = tbl.row($(this).closest('tr')).data();
        $('#mId').val(data[0]);
        $('#name').val(data[1]);
        $('#birthdaty').val(data[2]);
        $('#email').val(data[3]);
        $('#pwd').val(data[4]);

        $("#mId_old").val(data[0]);
        $("#oper").val("update");
    });

    //取消
    $('tbody').on('click', '#btn_cancel', function() {
        $("#oper").val("insert");
    });

    //刪除
    $('tbody').on('click', '#btn_delete', function() {
        var data = tbl.row($(this).closest('tr')).data();
        if (!confirm('是否確定要刪除?'))
            return false;

        $("#mId_old").val(data[0]);
        $("#oper").val("delete"); //刪除
        CRUD();
    });

    //送出表單 (儲存)
    $("#form1").validate({
        submitHandler: function(form) {
            CRUD();
        },
        rules: {
            mId: {
                required: true,
                minlength: 3,
                maxlength: 8
            },
            name: {
                required: true
            },
            birthday: {
                required: true
            },
            email: {
                required: true
            },
            pwd: {
                required: true
            }
        }
    });

    function CRUD() {
        $.ajax({
            url: "datatable_emember.php",
            data: $("#form1").serialize(),
            type: 'POST',
            dataType: "json",
            success: function(JData) {
                if (JData.code)
                    toastr["error"](JData.message);
                else {
                    $("#oper").val("insert");
                    toastr["success"](JData.message);
                    tbl.ajax.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
                alert(xhr.responseText);
            }
        });
    }

});