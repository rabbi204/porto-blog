( function($) {

    $( document ).ready( function() {

        // ckeditor replace
        CKEDITOR.replace('post_editor');

        // select2 plugin
        $('#post_tag_select').select2();

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

        //Category Edit
        $('.edit_cat').click( function(e) {
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url: 'category/' + id + '/edit',
                success : function(data){
                    $(' #edit_category_modal form input[name="name"] ').val(data.name);
                    $(' #edit_category_modal form input[name="edit_id"] ').val(data.id);
                    $('#edit_category_modal').modal('show');
                }
            });
        } );


        // Category / Tag Data Detete btn fix
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

        // Edit tag
        $('.edit-tag').click(function(e) {
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'tag/' + id + '/edit',
                success : function(data) {
                   $( '#edit_tag_modal form input[name="name"]' ).val(data.name);
                   $( '#edit_tag_modal form input[name="edit_id"]' ).val(data.id);
                   $('#edit_tag_modal').modal('show');
                }
            });
        });


        // Post Featured Image load
        $('#post_img_select').change( function(e){

          let img_url = URL.createObjectURL( e.target.files[0] );

          $('.post-img-load').attr('src',img_url);

        })

        // select post format
        $('#post_format').change( function(e){

            let format = $(this).val();

            if( format == "Image" ){
                $('.post-image').show();
            }else{
                $('.post-image').hide();
            }

            if( format == "Gallery" ){
                $('.post-gallery').show();
            }else{
                $('.post-gallery').hide();
            }

            if( format == "Video" ){
                $('.post-video').show();
            }else{
                $('.post-video').hide();
            }

            if( format == "Audio" ){
                $('.post-audio').show();
            }else{
                $('.post-audio').hide();
            }

        } );

        /// Post Gallary Image load
        $('#post_img_select_g').change( function(e){

            let img_gall = '';
            for( i = 0; i < e.target.files.length; i++){

                let file_url = URL.createObjectURL(e.target.files[i]);

                img_gall += '<img class="shadow" src=" '+ file_url +' ">' ;

            }

            $('.post-gallary-img').html(img_gall);

        })

         // Post Status Active and Inactive
         $(document).on('change','input.post_check', function(e) {
            // e.preventDefault();
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if ( checked == 'checked' ) {
                $.ajax({
                    url : 'post/status-inactive/' + status_id,
                    success : function(data){
                        swal('Status Inactive Successful');
                    }
                });
            }else{
                $.ajax({
                    url : 'post/status-active/' + status_id,
                    success : function(data){
                        swal('Status Active Successful');
                    }
                });
            }
        });





    });

})( jQuery)
