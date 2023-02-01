<div class="blog-comments p-3">
    <!-- Comments -->
    <div class="mt-4 mb-3">

        <h3 class="comments-title text-uppercase text-left text-lg-right mb-3">Recent Comments</h3>
    @foreach($comments as $comment)
            <x-posts.one-comment :$comment :$postId margin="5"/>
    @endforeach
    </div>
</div>
@auth
<div class="blog-contact p-3">
    <h3 class="comments-title text-uppercase text-left text-lg-right mb-3">Post your Comments</h3>
    <div class="contact-box comment-box">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="text" name="post_id" value="{{ $postId }}" hidden>
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
    </div>
</div>
@endauth

<script>
    function showForm(id){
        let forms = document.querySelectorAll('.commentForm')
        forms.forEach((form) => {
            form.hidden = true
        })
    document.querySelector('#form'+ id).hidden = false
    }
</script>
