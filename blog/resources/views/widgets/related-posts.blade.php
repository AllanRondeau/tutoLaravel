<h3>Articles similaire</h3>

<div class="row">
    @foreach($related_posts as $post)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{Illuminate\Support\Facades\Storage::url($post['featured_image'])}}">
                <div class="card-body">
                    <p class="card-text">{{Illuminate\Support\Str::limit(strip_tags($post['content']), 100, '...')}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="http://localhost:8000/post/{{$post['slug']}}" class="btn btn-sm btn-outline-secondary">En savoir →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
