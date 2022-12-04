<div class="tm-comment tm-mb-45">
    <figure class="tm-comment-figure">
        <img src="/img/comment-1.jpg" alt="Image" height="100" width="100" class="mb-2 rounded-circle img-thumbnail">
        <figcaption class="tm-color-primary text-center">{{ $comment[1] }}</figcaption>
    </figure>
    <div>
        <p>
            {{ $comment[2] }}
        </p>
        <div class="d-flex justify-content-between">
            <a class="tm-color-primary" onclick="reply({{$comment[0]}})">REPLY</a>
            <span class="tm-color-primary">{{ $comment[5]->diffForHumans() }}</span>
        </div>                                                 
    </div>                                
</div>

@foreach($comment["replies"] as $reply)
    <div class="tm-comment-reply tm-mb-45">
        <hr>
        <div class="tm-comment">
            <figure class="tm-comment-figure">
                <img src="/img/comment-2.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                <figcaption class="tm-color-primary text-center">{{ $reply->name }}</figcaption>    
            </figure>
            <p>
                {{ $reply->comment }}
            </p>
        </div>                                
        <span class="d-block text-right tm-color-primary">{{ $reply->created_at->diffForHumans() }}</span>
    </div>
@endforeach