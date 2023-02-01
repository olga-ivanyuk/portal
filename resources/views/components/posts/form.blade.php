@if($post->exists)
    <form method="POST"
          action="{{ route('posts.update', compact(['post'])) }}"
          enctype="multipart/form-data">
        @method('put')
        @else
            <form method="POST"
                  action="{{ route('posts.store') }}"
                  enctype="multipart/form-data">
                @endif

                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   name="title" placeholder="Title" required="required"
                                   value="{{ old('title',$post->title) }}">
                            @error('title')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description" required="required"
                >{{ old('description',$post->description) }}</textarea>
                            @error('description')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                <textarea class="form-control" name="postContent" placeholder="postContent" required="required"
                >{{ old('postContent',$post->content) }}</textarea>
                            @error('postContent')
                            <p style="color: red"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" class="form-control" name="image"
                                   onchange="document.querySelector('#preview').hidden = true">
                        </div>
                    </div>

                    @if($post->exists)
                        <img id="preview" src="{{$post->image}}" alt="">
                        @endif
                       <x-category-select :$post/>
                       <x-tag-checkboxes :currentTags="$post->tags"/>


                    <div class="col-12">

                        <button type="submit" class="btn btn-bordered active btn-block mt-3">
                            @if($post->exists)
                                Update Post
                            @else
                                Create Post
                            @endif
                        </button>
                    </div>
                </div>
            </form>
    </form>
