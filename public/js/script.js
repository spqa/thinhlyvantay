/**
 * Created by super on 1/6/2017.
 */
$(document).ready(function () {
    $('#st-tbl-mark-fe').DataTable({
        paging: false,
        searching: false,
        info: false,
        autoWidth: false
    });
    $(".button-collapse").sideNav({});

    $('.student-filter-wrap ul a').click(function (e) {
        e.preventDefault();
        $;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
        $('[data-activates="' + $(this).closest('ul').attr('id') + '"]')
            .addClass('red')
            .text($(this).text())
            .attr('data-content',$(this).attr('data-content'));
    });

    $('#st-tbl-mark-fe').keyup(function (e) {
        var $focus = $(':focus');
        if ($focus.is('td')) {
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
                        var mark=parseFloat($(this).text());
                        // console.log(mark);
                        if(isNaN(mark) || mark>10){
                            $(this).html('');
                        }else{
                            switch (type) {
                                case 'H1':
                                    heso+=1;
                                    h1+=mark;
                                        break;
                                case 'H2':
                                    heso+=2;
                                    h2+=mark*2;
                                    break;
                                case 'H3':
                                    heso+=3;
                                    h3+=mark*3;
                                    break;
                            }
                        }

                    });

                    var tbm =Math.round((h1+h2+h3)/heso * 100) / 100 ;
                    $focus.parent().find('td[data-type="TBM"]').first().text(tbm);

            }
        }

    });

    $('#choose-subject a').click(function (e) {
        e.preventDefault();
        $.ajax({
            url:'/api/table/class/'+$("[data-activates='choose-class']").attr('data-content')+'/subject/'+$(this).attr('data-content'),
            success:function (data) {
                console.log(data)
            }
        });
    });
});

jQuery.fn.selectText = function(){
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