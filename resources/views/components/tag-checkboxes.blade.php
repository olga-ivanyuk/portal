<div class="form-group">
    <p>Tags</p>
</div>
<div class="row">
   @foreach($tags as $tag)
        <div class="col-md-4">
            <input type="checkbox" onchange="validate()"
                   class="tag-ch"
                   @checked($currentTags->contains($tag))

                   name="tags[]"
                   value="{{$tag->id}}"
                   id = "tag {{$tag->id}}">
            <label for="tag {{$tag->id}}">{{ $tag->title }}</label>
        </div>
    @endforeach
       @error('tags')
       <p style="color: red"> {{$message}}</p>
       @enderror
</div>
<script>
function validate(){
    let checkboxes = document.querySelectorAll('.tag-ch')
    let number = 0
    checkboxes.forEach((ch) => {
        if (ch.checked) {
            number++
        }
        })
            if(number===3){
                checkboxes.forEach((ch) => {
                    if (!ch.checked) {
                        ch.disabled = true
                    }
                })
    }else {
                checkboxes.forEach((ch) => {
                        if (!ch.checked) {
                            ch.disabled = false
                        }
                    })
                }
}
document.oncontextmenu = () => {
    return false;
};
document.onkeydown = function(e) {
    if(e.keyCode === 123) {
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode === 'I'.charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode === 'J'.charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.keyCode === 'U'.charCodeAt(0)){
        return false;
    }
}
</script>
