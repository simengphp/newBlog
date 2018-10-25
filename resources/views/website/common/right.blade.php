<div class="container sidebar">
    @foreach($nav_list as $k=>$v)
    <div class="col-md-5" style="background-color:{{$v->color}};">
        <a href="{{$v->url}}" style="color: white">{{$v->name}}</a>
    </div>
    @endforeach
    <br>
    <ul class="ad">
        <a href="/" target="_blank">
            <img src="/uploads/{{$config->pic}}" width="240">
        </a>
    </ul>
</div>