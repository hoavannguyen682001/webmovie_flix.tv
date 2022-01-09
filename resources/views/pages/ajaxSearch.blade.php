@foreach($result_search as $key => $mov)
    <div class="media">
        <a class="pull-left" href="{{ route('movie',$mov->slug) }}">
            <img class="media-object" width="60"
                src="{{asset('uploads/movie/'.$mov->image)}}"
                alt="{{$mov->title}}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('movie',$mov->slug) }}">{{$mov->title}}</a></h4>
            <p>{{$mov->name_eng}}</p>
        </div>
    </div>
@endforeach