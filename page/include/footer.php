  </div>

    <script src="<?php echo   base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo   base_url(); ?>assets/header.js"></script>

    <script src="<?php echo   base_url(); ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo   base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo   base_url(); ?>assets/js/main.js"></script>


    <script src="<?php echo   base_url(); ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo   base_url(); ?>assets/js/dashboard.js"></script>
    <script src="<?php echo   base_url(); ?>assets/js/widgets.js"></script>


   
   <!--
    <script src="<?php echo   base_url(); ?>assets/js/init-scripts/data-table/datatables-init.js"></script> -->


        <script type="text/javascript">
          $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#bootstrap-data-table-export thead tr').clone(true).appendTo( '#bootstrap-data-table-export thead' );
            
            $('#bootstrap-data-table-export thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" class="put cl-'+title+'" placeholder="Search '+title+'" />' );
         
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
         
            var table = $('#bootstrap-data-table-export').DataTable( {
                orderCellsTop: true,
                searching: true, 
                paging: true, 
                info: false,
                "pageLength": 50,
                aaSorting: [[1, 'asc']]
            } );


        } );

        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134999136-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-134999136-1');
        </script>

        <script>
        function loading() {
            document.getElementsByClassName('spinner')[0].style.display="none";
             document.getElementsByClassName('lodimg')[0].style.display="none";
          
        }
        </script>

</div>

</body>

</html>
