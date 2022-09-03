<x-panel-layout>
    <x-slot name="title">
        - ایجاد مقاله جدید
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('posts.index')}}"> مقالات</a></li>
            <li><a href="{{route('posts.create')}}" class="is-active">ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.store')}}" class="padding-30" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="text" placeholder="عنوان مقاله">
                    @error('title')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <p>دسته بندی های مقاله
                        <small>( از بین دسته بندی های ایجاد شده در بخش موبوطه، (نام دسته بندی) مورد نظر را در اینجا وارد نموده و اینتر بزنید! )</small>
                    </p>

                    <ul class="tags">
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

                    <textarea placeholder="متن مقاله" class="text" name="content"></textarea>
                    @error('content')
                    <p class="error">{{$message}}</p>
                    @enderror

                    <button class="btn btn-webamooz_net">ایجاد مقاله</button>
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