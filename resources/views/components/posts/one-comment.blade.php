<div class="admin media py-4 qwerty" @isset($margin) style="margin-left: {{ $margin }}px" @endisset>
    <div class="admin-thumb avatar-lg">
        <img class="rounded-circle" src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="">
    </div>
    <!-- Admin Content -->
    <div class="admin-content media-body pl-3 pl-sm-4">
        <h4 class="d-flex mb-2">
            <a href="#">{{ $comment->user->name }}</a>
            @auth
            <a href="#" class="ml-auto" onclick="showForm('{{ $comment->id }}')">Reply</a>
            @endauth
        </h4>
        <p>{{ $comment->body }}</p>
    </div>
</div>
<form method="POST"  id="form{{ $comment->id }}" class="commentForm"
      action="{{ route('comments.store') }}" hidden>
    @csrf
    <input type="text" name="post_id" value="{{ $postId }}"hidden>
    <input type="text" name="comment_id" value="{{ $comment->id }}" hidden>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Message"
                                  required="required"></textarea>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-bordered mt-3" type="submit">Send Message
            </button>
        </div>
    </div>
</form>

@foreach($comment->comments ?? [] as $comment)
    <x-posts.one-comment :$comment :$postId :margin="$margin + 80" />
@endforeach
