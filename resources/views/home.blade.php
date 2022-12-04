<x-app>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <x-search />           
            <div class="row tm-row">
                @if(!count($blogs))
                    <div class="alert alert-danger" style="width: 100%">No Blogs...</div>
                @endif
                @foreach($blogs as $blog)
                    <x-blog :blog="$blog"/>
                @endforeach
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-paging-wrapper">
                    <nav class="tm-paging-nav d-inline-block">
                        {{ $blogs->links() }}
                    </nav>
                </div>                
            </div>            
        </x-app>