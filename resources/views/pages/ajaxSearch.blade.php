@foreach($result_search as $key => $mov)
    <div class="media">
        <a class="pull-left" href="{{ route('movie',$mov->slug) }}">
            <img class="media-object" width="50"
                src="{{asset('uploads/movie/'.$mov->image)}}"
                alt="{{$mov->title}}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('movie',$mov->slug) }}">{{$mov->title}}</a></h4>
        </div>
    </div>
@endforeach