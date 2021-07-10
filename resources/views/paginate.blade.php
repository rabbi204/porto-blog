<div class="row">
    <div class="col">

    @if( $paginator->hasPages() )
        
        <ul class="pagination float-right">

            @if( $paginator->onFirstPage() )

            @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
            @endif
       

        @foreach( $elements as $element )

            @foreach( $element as $page => $url )

                @if( $paginator->currentPage() == $page )

                <li class="page-item active"><a class="page-link" href="{{ $url }}"> {{ $page }} </a></li>

                 @else
                 <li class="page-item"><a class="page-link" href="{{ $url }}"> {{ $page }} </a></li>
                @endif
        
            @endforeach
    
        @endforeach

        @if ( $paginator->hasMorePages() )
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a>
          @else

        @endif
        
        </ul>
     @endif
    </div>
</div>
