$(document).ready(function () {
    $("#hide").click(function () {
        $("#alertify").hide();
    });
});

$(document).on('click', '.parent a.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('em').removeClass('fa-plus').addClass('fa-minus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('em').removeClass('fa-minus').addClass('fa-plus');
    }
});

function buy(buy_id) {

    if (confirm('Are u sure u want to buy this Tools?')) {

        var hideId = $(this).attr('value');
        var dataString = 'id=' + buy_id;


        jQuery.ajax({
            type: "POST",
            url: "buy/tools",
            data: dataString,

            success: function (response) {
                $("#message").append(response);
                $('.' + hideId).fadeIn(200).hide();

                setTimeout(function () {
                    $('#alertify').fadeOut('fast');
                }, 6000);

            },


            error: function (response) {

                alert(response);

            }


        });

        return false;

    } else {

        return false;

    } // confirm parts

}

function buy_cc(buy_id) {

    if (confirm('Are u sure u want to buy this Card?')) {

        var hideId = $(this).attr('value');
        var dataString = 'card_id=' + buy_id;


        jQuery.ajax({
            type: "POST",
            url: "https://blackdb.cc/buy/cc",
            data: dataString,

            success: function (response) {
                $("#message").append(response);
                $('.' + hideId).fadeIn(200).hide();

                setTimeout(function () {
                    $('#alertify').fadeOut('fast');
                }, 6000);

            },


            error: function (response) {

                alert(response);

            }


        });

        return false;

    } else {

        return false;

    } // confirm parts

}

function grid(table, row) { // grid

    var dataTable = $('#grid').DataTable({

        "processing": true,
        "pageLength": row,
        "serverSide": true,

        "ajax": {

            url: "//" + (document.domain) + "/grid/" + table, // json datasource

            type: "post", // method  , by default get

            error: function () { // error handling

                $(".grid-error").html("");

                $("#grid").append('<tbody class="employee-grid-error"><tr><th colspan="20"><center>To bussy. Click  <a href="#" onClick="window.location.reload()">Refresh</a> To reload content</center></th></tr></tbody>');


                $("#grid_processing").css("display", "none");


            }


        }


    });

    $("#grid_filter").css("display", "none"); // hiding global search box

    $(".filter").change(function () {

        var i = $(this).attr('data-column'); // getting column index
        var v = $(this).val(); // getting search input value
        dataTable.columns(i).search(v).draw();


    });


    $(".btnFilter").click(function () {

        //  dataTable.columns().search().draw();

        var i = $(this).attr('data-column'); // getting column index
        var v = $(this).val(); // getting search input value
        dataTable.columns(i).search(v).draw();

    });


    $(".btnSupport").click(function () { // only for support

        var i = $(this).attr('data-column'); // getting column index
        var v = $(this).attr('value');

        dataTable.columns(i).search(v).draw();
        // return false;

    });


    $("#ristart").click(function () {
        console.log('Message');
        dataTable.columns().search().draw();
    });

}
