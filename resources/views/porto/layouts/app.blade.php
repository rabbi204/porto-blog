<!DOCTYPE html>
<html>

@include('porto.layouts.partials.head')


   <body data-plugin-page-transition>
      <div class="body">


        @include('porto.layouts.header')




        <div role="main" class="main">
            
            @include('porto.layouts.page-header')

            <div class="container py-4">
               <div class="row">

                  @section('main-content')
                  @show

               </div>
            </div>
        </div>


        @include('porto.layouts.footer')
        
    </body>
</html>