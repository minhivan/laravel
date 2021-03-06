@extends('admin.layout.index')
@section('content')
<div class="food-content">
    <div class="breadcrumb">
        <a href="/">Spicy Food</a> / <a href="">Recipe</a> / <a href="admin/recipe/category/list">Category</a>
    </div>
    <h1>Recipe Categories</h1>
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
                    <h4>Add new categories</h4>
                    <fieldset>
                        <label for="ingre_name">Name</label>
                        <input type="text" name="ingre_name" id="ingrname" placeholder="Category Name" required>
                    </fieldset>
                    <fieldset>
                        <label for="ingre_description">Description</label>
                        <input type="text" name="ingre_description" id="ingdescript" placeholder="Description">
                    </fieldset>
                    <div class="post__submit">
                        <button type="submit">Add new</button>
                    </div>
                </form>
            </div>
            <form action="admin/recipe/category/find" method="get" id="post_filter">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <p class="search-box">
                    <label class="screen-reader-text" for="post-search-input">Search categories</label>
                    <input type="search" id="post-search-input" name="keyword" value="">
                    <input type="submit" id="search-submit" class="button" value="Search">
                </p>
                <div class="tablenav top">
                    <div class="pagination_links">
                        {{$cat->links()}}
                    </div>
                </div>
                <div class="table-view">
                    <div class="row-header">
                        <div class="col-select">
                            <input id="cb-select-all-1" type="checkbox">
                        </div>
                        <div class="col-title">
                            <span>Name</span>
                        </div>
                        <div class="col-rcategories">
                            <span>Description</span>
                        </div>
                        <div class="col-used">
                            <span>Count</span>
                        </div>
                    </div>
                    @foreach($cat as $i)
                    <div class="row-content">
                        <div class="col-select">
                            <input id="{{$i->id}}" type="checkbox">
                        </div>
                        <div class="col-title">
                            <span><a href="#">{{$i->title}}</a></span>
                            <div class="row-content__action">
                                <a href="admin/recipe/category/edit/id={{$i->id}}">Edit</a> | <a href="admin/recipe/category/delete/id={{$i->id}}" class="color-red">Delete</a> | <a href="page/category/{{$i->slug}}">View</a>
                            </div>
                        </div>
                        <div class="col-rcategories">
                            <span>
                                @if($i->description=='')
                                    -
                                @else
                                    {{$i->description}}
                                @endif
                            </span>
                        </div>
                        <div class="col-used">
                            <span>{{\App\recipe::where('cat_id','=',$i->id)->count()}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tablenav top">
                    <div class="pagination_links">
                        <ul class="pagination">
                            {{$cat->links()}}
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <!--  Side bar   -->
    </div>
</div>
@endsection
