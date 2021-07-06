( function($) {

    $( document ).ready( function() {

        // Logout Feature
        $(document).on('click','#logout_btn', function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });

        // Category Status Active and Inactive
        $(document).on('change','input.cat_check', function(e) {
            // e.preventDefault();
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');
            
            if ( checked == 'checked' ) {
                $.ajax({
                    url : 'category/status-inactive/' + status_id,
                    success : function(data){
                        swal('Status Inactive Successful');
                    }
                });
            }else{
                $.ajax({
                    url : 'category/status-active/' + status_id,
                    success : function(data){
                        swal('Status Active Successful');
                    }
                });
            }
        });

        // Category / Tag / Post Data Detete btn fix
        $('.delete-btn').click( function (e) {

            let conf = confirm('Are you sure..?');

            if ( conf == true ) {
                return true;
            }else{
                return false;
            }

        } );


        // Tag Status Active and Inactive
        $(document).on('change','input.tag_check', function(e) {
            // e.preventDefault();
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');
            
            if ( checked == 'checked' ) {
                $.ajax({
                    url : 'tag/status-inactive/' + status_id,
                    success : function(data){
                        swal('Status Inactive Successful');
                    }
                });
            }else{
                $.ajax({
                    url : 'tag/status-active/' + status_id,
                    success : function(data){
                        swal('Status Active Successful');
                    }
                });
            }
        });

        // 



    });

})( jQuery)
