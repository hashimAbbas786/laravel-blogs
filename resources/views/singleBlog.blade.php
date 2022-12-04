<x-app>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <x-search />            
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <!-- Video player 1422x800 -->
                    <video width="954" height="535" controls class="tm-mb-40">
                        <source src="video/wheat-field.mp4" type="video/mp4">							  
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{ $blog->title }}</h2>
                            <p class="tm-mb-40">{{ $blog->readableDate() }} posted by {{ $blog->user->name }}</p>
                            <p>
                                {{ $blog->description }}    
                            </p>
                            <span class="d-block text-right tm-color-primary">{{ $blog->keywords }}</span>
                        </div>
                        
                        <!-- Comments -->
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <hr class="tm-hr-primary tm-mb-45">
                            
                            @foreach($comments as $comment)
                                <x-comment :comment="$comment"/>
                            @endforeach
                            <form action="/comments/post" method="POST" name="formAdd" id="formAdd" class="mb-5 tm-comment-form">
                                @csrf
                                <input type="hidden" name="blog" value="{{ $blog->id }}">
                                <input type="hidden" value="null" id="replyingTo" name="reply">
                                <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                                <div class="mb-4">
                                    <input class="form-control" name="name" placeholder="name" name="name" type="text">
                                </div>
                                <div class="mb-4">
                                    <input class="form-control" name="email" placeholder="email" name="email" type="text">
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" name="message"rows="6"></textarea>
                                </div>
                                <div class="text-right">
                                    <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                                </div>                                
                            </form>                          
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            @foreach($categories as $category)
                                <li><a href="/blogs/category/{{ $category->slug }}" class="tm-color-primary">{{ $category->category }}</a></li>
                            @endforeach
                        </ul>
                        @if(count($relatedPosts) > 0 )
                            <x-relatedBlog :relatedPosts="$relatedPosts"/>
                        @endif
                    </div>                    
                </aside>
            </div>
</x-app>