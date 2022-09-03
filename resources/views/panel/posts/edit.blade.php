<x-panel-layout>
    <x-slot name="title">
        - ویرایش مقاله
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('posts.index')}}"> مقالات</a></li>
            <li><a href="{{route('posts.edit', $post->id)}}"  class="is-active" >ویرایش مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقاله: {{$post->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.update', $post->id)}}" class="padding-30" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" name="title" class="text" placeholder="عنوان مقاله"
                           value="{{$post->title}}">
                    @error('title')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <p>دسته بندی های مقاله
                        <small>( از بین دسته بندی های ایجاد شده در بخش موبوطه، (نام دسته بندی) مورد نظر را در اینجا وارد نموده و اینتر بزنید! )</small>                    </p>
                    <ul class="tags">
                        @foreach($post->categories as $category)
                        <li class="addedTag">
                            {{$category->name}}<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="{{$category->name}}" name="categories[]">
                        </li>
                        @endforeach
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>
                    @error('categories')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner" accept="image/*"/>
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    @error('banner')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <textarea placeholder="متن مقاله" class="text" name="content">{!! $post->content !!}</textarea>
                    @error('content')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <button class="btn btn-webamooz_net">ویرایش مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content',{
                language: 'fa',
                filebrowserUploadUrl: '{{route("editor-upload", ["_token" => csrf_token()])}}',
                filebrowserUploadMethod: 'form',

            });
        </script>
        <script src="{{asset('blog/panel/js/tagsInput.js')}}"></script>
    </x-slot>
</x-panel-layout>