/**
 * Created by super on 1/6/2017.
 */
$(document).ready(function () {
    $('.modal').modal();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $('select').material_select();
    var table = $('#st-tbl-mark-fe').DataTable({
        paging: false,
        searching: false,
        info: false,
        autoWidth: false,
        fixedHeader: false
    });
    $(".button-collapse").sideNav({
        menuWidth:270
    });

    $('.student-filter-wrap ul a').click(function (e) {
        e.preventDefault();
        $('[data-activates="' + $(this).closest('ul').attr('id') + '"]')
            .addClass('red')
            .text($(this).text())
            .attr('data-content', $(this).attr('data-content'));
    });

    $('#st-tbl-mark-fe').keyup(function (e) {
        var $focus = $(':focus');
        if ($focus.is("td[contenteditable='true']")) {
            switch (e.which) {
                case 38:
                    //up
                    var index = $focus.index();
                    $focus.parent().prev().find("td").eq(index).focus().selectText();
                    break;
                case 39:
                    //right
                    $focus.next().focus().selectText();
                    if (!$focus.next().is(':focus')) {
                        $focus.parent().next().find("td[contenteditable='true']").first().focus().selectText();
                    }
                    break;
                case 37:
                    //left
                    $focus.prev().focus().selectText();
                    if (!$focus.prev().is(':focus')) {
                        $focus.parent().prev().find("td[contenteditable='true']").last().focus().selectText();
                    }
                    break;
                case 40:
                    //down
                    var index = $focus.index();
                    $focus.parent().next().find("td").eq(index).focus().selectText();
                    break;
                default:
                    //calculate mark

                    var h1 = 0;
                    var h2 = 0;
                    var h3 = 0;
                    var heso = 0;

                    $focus.parent().find('td[contenteditable="true"]').each(function (i) {
                        var type = $(this).attr('data-type');
                        var mark = parseFloat($(this).text());
                        // console.log(mark);
                        if (isNaN(mark) || mark > 10) {
                            $(this).html('');
                        } else {
                            switch (type) {
                                case 'H1':
                                    heso += 1;
                                    h1 += mark;
                                    break;
                                case 'H2':
                                    heso += 2;
                                    h2 += mark * 2;
                                    break;
                                case 'H3':
                                    heso += 3;
                                    h3 += mark * 3;
                                    break;
                            }
                        }

                    });
                    if (heso == 0) {
                        var tbm = Math.round((h1 + h2 + h3) / heso * 100) / 100;
                        $focus.parent().find('td[data-type="TBM"]').first().text('');
                    } else {
                        var tbm = Math.round((h1 + h2 + h3) / heso * 100) / 100;
                        $focus.parent().find('td[data-type="TBM"]').first().text(tbm);
                    }


            }
        }

    });
    $(document).on('input','td',function () {
        $(':focus').addClass('orange lighten-4').parent().attr('data-edited','true');
    });

    $('#choose-subject a').click(function (e) {
        $('.progress').removeClass('hide');
        e.preventDefault();
        $.ajax({
            url: '/api/table/class/' + $("[data-activates='choose-class']").attr('data-content') + '/subject/' + $(this).attr('data-content'),
            success: function (data) {
                console.log(data);
                table.clear().draw();
                var i=0;
                $.each(data, function (key, value) {
                    i++;
                    console.log(value);
                    if (typeof value.marks[0] == 'undefined') {
                        var row = table.row.add([
                            i,
                            value.last_name + ' ' + value.first_name,
                            '', '', '', '', '', '', '', '', '', '', '', ''
                        ]).draw().node();
                        $(row).attr('data-content',value.id);
                        var td = $(row).find('td');
                        td.eq(2).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M1');
                        td.eq(3).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M2');
                        td.eq(4).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M3');
                        td.eq(5).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M4');
                        td.eq(6).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G1');
                        td.eq(7).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G2');
                        td.eq(8).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G3');
                        td.eq(9).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G4');
                        td.eq(10).attr('data-type', 'H2').attr('contenteditable', 'true').attr('data-content','H2G1');
                        td.eq(11).attr('data-type', 'H2').attr('contenteditable', 'true').attr('data-content','H2G2');
                        td.eq(12).attr('data-type', 'H3').attr('contenteditable', 'true').attr('data-content','HK');
                        td.eq(13).attr('data-type', 'TBM').attr('data-content','TBM');
                    } else {
                        var row = table.row.add([
                            i,
                            value.last_name + ' ' + value.first_name,
                            value.marks[0].H1M1,
                            value.marks[0].H1M2,
                            value.marks[0].H1M3,
                            value.marks[0].H1M4,
                            value.marks[0].H1G1,
                            value.marks[0].H1G2,
                            value.marks[0].H1G3,
                            value.marks[0].H1G4,
                            value.marks[0].H2G1,
                            value.marks[0].H2G2,
                            value.marks[0].HK,
                            value.marks[0].TBM
                        ]).draw().node();
                        $(row).attr('data-content',value.id);
                        var td = $(row).find('td');
                        td.eq(2).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M1');
                        td.eq(3).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M2');
                        td.eq(4).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M3');
                        td.eq(5).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1M4');
                        td.eq(6).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G1');
                        td.eq(7).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G2');
                        td.eq(8).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G3');
                        td.eq(9).attr('data-type', 'H1').attr('contenteditable', 'true').attr('data-content','H1G4');
                        td.eq(10).attr('data-type', 'H2').attr('contenteditable', 'true').attr('data-content','H2G1');
                        td.eq(11).attr('data-type', 'H2').attr('contenteditable', 'true').attr('data-content','H2G2');
                        td.eq(12).attr('data-type', 'H3').attr('contenteditable', 'true').attr('data-content','HK');
                        td.eq(13).attr('data-type', 'TBM').attr('data-content','TBM');
                    }

                });
            },
            complete: function () {
                $('.progress').addClass('hide');
            }
        });
    });

    $('.save').click(function (e) {
        console.log('hah');
        var data={};
        var dataMark=[];
        var subject_id=$("[data-activates='choose-subject']").attr('data-content');
        data.subject=subject_id;
        $('[data-edited="true"]').each(function () {
            console.log('start');
            var student_id=$(this).attr('data-content');
            var marks={};
            var object={};
            object.student=student_id;
            marks.H1M1=$(this).find('td[data-content="H1M1"]').first().text();
            marks.H1M2=$(this).find('td[data-content="H1M2"]').first().text();
            marks.H1M3=$(this).find('td[data-content="H1M3"]').first().text();
            marks.H1M4=$(this).find('td[data-content="H1M4"]').first().text();
            marks.H1G1=$(this).find('td[data-content="H1G1"]').first().text();
            marks.H1G2=$(this).find('td[data-content="H1G2"]').first().text();
            marks.H1G3=$(this).find('td[data-content="H1G3"]').first().text();
            marks.H1G4=$(this).find('td[data-content="H1G4"]').first().text();
            marks.H2G1=$(this).find('td[data-content="H2G1"]').first().text();
            marks.H2G2=$(this).find('td[data-content="H2G2"]').first().text();
            marks.HK=$(this).find('td[data-content="HK"]').first().text();
            marks.TBM=$(this).find('td[data-content="TBM"]').first().text();
            object.marks=marks;
            dataMark.push(object);
            console.log(object);

            data.student=dataMark;
            console.log(data);
        });
        if($('[data-edited="true"]').length==0){
            Materialize.toast('Không phát hiện dữ liệu thay đổi', 4000);
        }else{
            $.ajax({
                url:'/api/table/save',
                method:'POST',
                data:{data:data},
                success:function (data) {
                    if (data!=''){
                        Materialize.toast(data, 4000);
                    }else{
                        Materialize.toast('Lưu thành công', 4000);

                    }
                }
            });
        }

    });
});

jQuery.fn.selectText = function () {
    var doc = document;
    var element = this[0];
    // console.log(this, element);
    if (doc.body.createTextRange) {
        var range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(element);
        selection.removeAllRanges();
        selection.addRange(range);
    }
};