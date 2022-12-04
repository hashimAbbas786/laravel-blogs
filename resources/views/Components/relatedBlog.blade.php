<hr class="mb-3 tm-hr-primary">
<h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
@foreach($relatedPosts as $relatedPost)
<a href="/blog/{{ $relatedPost->slug }}" class="d-block tm-mb-40">
    <figure>
        <img src="/img/img-02.jpg" alt="Image" class="mb-3 img-fluid">
        <figcaption class="tm-color-primary"> {{ $relatedPost->title }} </figcaption>
    </figure>
</a>
@endforeach