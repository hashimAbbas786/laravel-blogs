<article class="col-12 col-md-6 tm-post">
    <hr class="tm-hr-primary">
    <a href="/blog/{{ $blog->slug }}" class="effect-lily tm-post-link tm-pt-60">
        <div class="tm-post-link-inner">
            <img src="/img/img-01.jpg" alt="Image" class="img-fluid">                            
        </div>
        @if($blog->isNew())
            <span class="position-absolute tm-new-badge">New</span>
        @endif
        <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ $blog->title }}</h2>
    </a>                    
    <p class="tm-pt-30">
        @if(Str::length($blog->description) > 100)
            {{ Str::substr($blog->description, 0, 100)}}...
        @else 
            {{ $blog->description }}
        @endif
    </p>
    <div class="d-flex justify-content-between tm-pt-45">
        <span class="tm-color-primary">{{ $blog->keywords }}</span>
        <span class="tm-color-primary">{{ $blog->format()   }}</span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <span>{{ count($blog->comments) }} comments</span>
        <span>by {{ $blog->user->name }}</span>
    </div>
</article>
