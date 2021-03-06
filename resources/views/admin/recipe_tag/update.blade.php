@extends('admin.layout.index')
@section('content')
    <div class="food-content dashboard-wrapper">
        <div class="breadcrumb">
            <a href="">Spicy Food</a> / <a href="">Recipe</a> / <a href="admin/recipe/tag/list">Tag</a> / <span>Update</span>
        </div>
        <h1>Tag >> {{$tag->title}}</h1>
        <div class="wrap">
            <div class="post-all">
                <div class="post categories">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            @foreach($errors->all() as $err)
                                <p>{{$err}}</p>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                    @endif
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h4>Update categories</h4>
                        <fieldset>
                            <label for="ingre_name">Name</label>
                            <input type="text" name="tag_name" id="tagrname" placeholder="{{$tag->title}}" required>
                        </fieldset>
                        <fieldset>
                            <label for="ingre_description">Description</label>
                            <input type="text" name="tag_description" id="tagdescript" placeholder="{{$tag->description}}">
                        </fieldset>
                        <div class="post__submit">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--  Side bar   -->
        </div>
    </div>
@endsection
