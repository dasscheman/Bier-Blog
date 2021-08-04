@extends("layouts.app",['title'=>$title])
@section("content")


    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="text-center">
                    <h2>Search Results for: "{{$query}}"</h2>
                </div>
                <div class="row">

                    @php $search_count = 0;@endphp
                    @forelse($search_results as $result)
                        @if(isset($result->indexable))
                            @php $search_count += $search_count + 1; @endphp
                            <?php $post = $result->indexable; ?>
                            @if($post && is_a($post,\BinshopsBlog\Models\BinshopsPostTranslation::class))
                                <div>Search result #{{$search_count}}</div>
                                @include("binshopsblog::partials.index_loop")
                            @else
                                <div class='alert alert-danger'>Unable to show this search result - unknown type</div>
                            @endif
                        @endif
                    @empty
                        <div class='alert alert-danger'>Sorry, but there were no results!</div>
                    @endforelse
                </div>
            </div>

            @if (config('binshopsblog.search.search_enabled') )
                @include('binshopsblog::sitewide.search_form')
            @endif

        </div>
    </div>


@endsection
