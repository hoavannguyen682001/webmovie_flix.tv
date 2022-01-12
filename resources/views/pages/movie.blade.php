@extends('layout')
@section('facebook')

@endsection

@section('content')
@php
    echo $episode_first->link;
@endphp
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category',$movie->category->slug)}}">{{ $movie->category->title }}</a> » <span>
                   <a href="{{route('country',$movie->country->slug)}}">{{ $movie->country->title }}</a> » <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span></span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">

             <div class="halim-movie-wrapper">
                <div class="title-block">
                   {{-- <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                      <div class="halim-pulse-ring"></div>
                   </div>
                   <div class="title-wrapper" style="font-weight: bold;">
                      Bookmark
                   </div> --}}
                </div>
                <div class="movie_info col-xs-12">
                <div class="movie-poster col-md-3">
                      <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{ $movie->title }}">
                      <div class="bwa-content">
                         <div class="loader"></div>
                         <a href="{{ url('episodes/'.$episode_first->slug ) }}" class="bwac-btn">
                         <i class="fa fa-play"></i>
                         </a>
                      </div>
                   </div>
                   <div class="film-poster col-md-9">
                      <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{ $movie->title }}</h1>
                      <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                      <ul class="list-info-group">
                         <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">HD</span><span class="episode">Vietsub</span></li>
                         <li class="list-info-group-item"><span>Thời lượng</span> : 133 Phút</li>
                         <li class="list-info-group-item"><span>Thể loại</span> : <a href="{{route('genre',$movie->genre->slug)}}" rel="category tag">{{ $movie->genre->title}}</a></li>
                         <li class="list-info-group-item"><span>Danh mục phim</span> : <a href="{{route('category',$movie->category->slug)}}" rel="tag">{{ $movie->category->title}}</a></li>
                         <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{ $movie->country->title}}</a></li>
                         </ul>

                         <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="7vaWVBy7"></script>

                        <div class="fb-share-button" data-href="{{$url}}" data-layout="box_count" data-size="small"><a target="_blank"
                         href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                         <p>Đánh giá của bạn:</p>
                         <ul class="list-inline rating" title="Average Rating" style="float: left;" >
                            @for( $count = 5; $count>=1; $count--)
                                    @php
                                        if($count <= $rating){
                                            $color = 'color:#ffcc00';
                                        }else{
                                            $color = 'color:#ccc';
                                        }
                                    @endphp
                            <li title="Đánh giá sao"
                                id="{{$movie->id}}-{{$count}}"
                                data-index="{{$count}}"
                                data-movie_id="{{ $movie->id }}"
                                data-rating="{{$rating}}"
                                class="rating"
                                style="cursor: pointer;{{$color}};font-size: 30px;">
                                &#9733;
                            </li>
                            @endfor
                         </ul>

                      <div class="movie-trailer hidden"></div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div id="halim_trailer"></div>
             <div class="clearfix"></div>
             <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
             </div>
             <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                   <article id="post-38424" class="item-content">
                      Phim <a href="#">{{ $movie->title }}</a> :
                      {{ $movie->description }}
                   </article>
                </div>
             </div>
          </div>
       </section>

       <div class="fb-comments" data-href="http://127.0.0.1:8000/phim/ma-tran" data-width="" data-numposts="5" style="background-color: while !important; color: while !important;"></div>

       <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
             </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">

               @foreach($related as $key => $relate)
               <article class="thumb grid-item post-38498">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie',$relate->slug)}}" >
                        <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$relate->image)}}" title="{{$relate->title}}"></figure>
                        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$relate->title}}</p>
                              <p class="original_title">{{$relate->name_eng}}</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
            @endforeach

             </div>
             <script>
                $(document).ready(function($) {
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({
                   loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,
                   navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                   responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section>
    </main>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
</div>
<style>
    .fb-comments{
        background-color: while !important; color: while !important;
    }
</style>
@endsection
