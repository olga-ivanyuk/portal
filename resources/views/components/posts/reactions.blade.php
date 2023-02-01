<a id="likeButton" class="bg-white facebook" style="cursor: pointer"
   onclick="reaction('{{ $postId}}', true,'{{ route('reaction') }}', '{{ csrf_token() }}'), like()">
    @if ($reaction===1)
        <i class="fas fa-thumbs-up"></i>
        <i class="fas fa-thumbs-up"></i>
    @endif
    @if(is_null($reaction))
        <i class="far fa-thumbs-up"></i>
        <i class="far fa-thumbs-up"></i>
    @endif
    @if ($reaction===0)
        <i class="far fa-thumbs-up"></i>
        <i class="far fa-thumbs-up"></i>
    @endif
</a><b id="countLike">{{ $likes }}</b>
<a id="disLikeButton" class="bg-white facebook" style="cursor: pointer"
   onclick="reaction('{{ $postId}}', false,'{{ route('reaction') }}', '{{ csrf_token() }}'), dislike()">
    @if ($reaction===1)
        <i class="far fa-thumbs-down"></i>
        <i class="far fa-thumbs-down"></i>
    @endif
    @if(is_null($reaction))
        <i class="far fa-thumbs-down"></i>
        <i class="far fa-thumbs-down"></i>
    @endif
    @if ($reaction===0)
        <i class="fas fa-thumbs-down"></i>
        <i class="fas fa-thumbs-down"></i>
    @endif
</a><b id="countDisLike">{{ $disLikes }}</b>
<script>
    let myReaction = '{{ $reaction }}'
    function like() {
        let button = document.querySelector('#likeButton')
        let disLikeButton = document.querySelector('#disLikeButton')
        let countLike = document.querySelector('#countLike')
        let countDisLike = document.querySelector('#countDisLike')

        if (myReaction === '1') {
            button.innerHTML =  `<i class="far fa-thumbs-up"></i>
                                <i class="far fa-thumbs-up"></i>`
            myReaction = ''
            countLike.innerHTML = parseInt(countLike.innerHTML)-1;
        }else
        if (myReaction === '0') {
            button.innerHTML =  `<i class="fas fa-thumbs-up"></i>
                                <i class="fas fa-thumbs-up"></i>`
            disLikeButton.innerHTML =   `<i class="far fa-thumbs-down"></i>
                                        <i class="far fa-thumbs-down"></i>`
            myReaction = '1'
            countLike.innerHTML = parseInt(countLike.innerHTML)+1;
            countDisLike.innerHTML = parseInt(countDisLike.innerHTML)-1;
        }else
        if (myReaction === '') {
            button.innerHTML = `<i class="fas fa-thumbs-up"></i>
                                <i class="fas fa-thumbs-up"></i>`
            myReaction = '1'
            countLike.innerHTML = parseInt(countLike.innerHTML)+1;
        }
    }

    function dislike() {
        let button = document.querySelector('#likeButton')
        let disLikeButton = document.querySelector('#disLikeButton')

        if (myReaction=== '1') {
            disLikeButton.innerHTML =   `<i class="fas fa-thumbs-down"></i>
                                        <i class="fas fa-thumbs-down"></i>`
            button.innerHTML = `<i class="far fa-thumbs-up"></i>
                                 <i class="far fa-thumbs-up"></i>`
            myReaction = '0'
            countDisLike.innerHTML = parseInt(countDisLike.innerHTML)+1;
            countLike.innerHTML = parseInt(countLike.innerHTML)-1;
        }else
        if (myReaction === '0'){
            disLikeButton.innerHTML = `<i class="far fa-thumbs-down"></i>
                                         <i class="far fa-thumbs-down"></i>`
            myReaction = ''
            countDisLike.innerHTML = parseInt(countDisLike.innerHTML)-1;
        }else
        if (myReaction === ''){
            disLikeButton.innerHTML =  `<i class="fas fa-thumbs-down"></i>
                                        <i class="fas fa-thumbs-down"></i>`
            myReaction = '0'
            countDisLike.innerHTML = parseInt(countDisLike.innerHTML)+1;
        }
    }
</script>
