<html>
<head>
<meta charset="utf-8">
@if (Auth::check())
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endif
    <style>
        textarea {
            height: 80vh !important;
            width: 100vw !important;
        }

        body {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
            font-family: sans-serif;
        }

        input[type="text"] {
            width: 100%;
        }

        textarea, input[type="text"] {
            font-size: 1rem;
            line-height: 1.4;
            font-family: sans-serif;
            padding: 10px;
        }

        button {
            background: #6cb2eb;
            color: #fff;
            padding: 15px 80px;
            font-size: 1.2rem;
        }

        div {
            margin-bottom: 10px;
            margin-top: 40px;
        }
        img {
            max-width: 100%;
            width: 200px;
        }
    </style>
</head>
<body>
    <div id="app">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST" class="mb-4">   
            @csrf 
            <div>
                <input name="id" hidden="true" value="{{ $post-> id}}">
            </div>
            <div>
                <input name="title" type="text" v-model="post.title">
            </div>
            <div>
                <textarea name="body" v-html="post.body" v-model="post.body"></textarea>
            </div>
            <div>
                <label for="published">Draft</label>
                <input name="published" type="radio" value="0" id="published">
                <label for="published">Published</label>
                <input checked="checked" name="published" type="radio" value="1" id="published">
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </form>
        <div class="mt-3 mb-4">
            <a  href="/posts/{{ $post->id }}/destroy">Delete Post</a>
        </div>
        <div class="mt-3 mb-4">
            <h3>Images</h3>
            <div>
                <input type="file" name="imageFile" @change="getImage($event)">
            </div>
            <div>
            <input type="text" name="alt" v-model="altText">
            </div>
            <div>
                <a href="javascript:void(0)" type="submit" @click="uploadImage">Upload</a>
            </div>
        </div>
        <Images></Images>
</div>
        <script src="https://cdn.jsdelivr.net/lodash/4.13.1/lodash.js"></script>
        <script>
            localStorage.setItem('post_{{ $post->id }}', JSON.stringify({!! $post->toJSON() !!}));
            var post = JSON.parse(localStorage.getItem('post_{{ $post->id }}'));
            var postImages = JSON.parse('{!! $post->images !!}'); 
            var isEditor = true;
        </script>
        <script src="{{ mix('/js/app.js') }}"></script>
        @component('components.inline-scripts')
        @endcomponent
    </body>
</html>