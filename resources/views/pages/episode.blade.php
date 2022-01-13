@extends('layout')
@section('content')
<div class="row container" id="wrapper">
        <div class="halim-panel-filter">
           <div class="panel-heading">
              <div class="row">
                 <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="#">{{$episode->movie->category->title}}</a> » <span><a href="#">{{$episode->movie->country->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{$episode->movie->title}}</span></span></span></span></div>
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

                 <iframe width="100%" height="500" src="{{ $episode->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                 <div class="button-watch">
                    <ul class="halim-social-plugin col-xs-4 hidden-xs">
                       <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                    </ul>
                    <ul class="col-xs-12 col-md-8">
                       <div id="autonext" class="btn-cs autonext">
                          <i class="icon-autonext-sm"></i>
                          <span><i class="fa fa-step-forward"></i> Autonext: <span id="autonext-status">On</span></span>
                       </div>
                       <div id="explayer" class="hidden-xs"><i class="fa fa-expand"></i>
                          Expand
                       </div>
                       <div id="toggle-light"><i class="fa fa-lightbulb-o"></i>
                          Light Off
                       </div>
                       <div id="report" class="halim-switch"><i class="fa fa-exclamation-circle"></i> Report</div>
                       <div class="luotxem"><i class="fa fa-eye"></i>
                          <span>{{ $view_movie->view }}</span> lượt xem
                       </div>
                       <div class="luotxem">
                          <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="fa fa-share-alt"></i> Share</a>
                       </div>
                    </ul>
                 </div>
                 <div class="collapse" id="moretool">
                    <ul class="nav nav-pills x-nav-justified">
                       <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                       <div class="fb-save" data-uri="" data-size="small"></div>
                    </ul>
                 </div>

                 <div class="clearfix"></div>
                 <div class="clearfix"></div>
                 <div class="title-block">
                    {{-- <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                       <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                          <div class="halim-pulse-ring"></div>
                       </div>
                    </a> --}}
                    <div class="title-wrapper-xem full">
                       <h1 class="entry-title"><a href="" title="{{$episode->movie->title}}" class="tl">{{$episode->movie->title}}</a></h1>
                    </div>
                 </div>
                 <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                    <article id="post-37976" class="item-content post-37976"></article>
                 </div>
                 <div class="clearfix"></div>
                 <div class="text-center">
                    <div id="halim-ajax-list-server"></div>
                 </div>
                 <div id="halim-list-server">
                    <ul class="nav nav-tabs" role="tablist">
                       <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="fa fa-tags"></i> Vietsub</a></li>
                    </ul>
                    <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                        <div class="halim-server" style="margin-top:16px ">
                            @foreach($episode_all as $key => $epi)
                                   <span style=" padding:10px 2px; border: 1px solid gray; border-radius: 5px; "> <a href="{{ url('episodes/'.$epi->slug) }}">{{ $key+1 }}</a></span>
                            @endforeach

                             <div class="clearfix"></div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="clearfix"></div>
                 <div class="htmlwrap clearfix">
                    <div id="lightout"></div>
                 </div>
           </section>
           <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="5" style="background-color: white;"></div>
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
              jQuery(document).ready(function($) {
              var owl = $('#halim_related_movies-2');
              owl.owlCarousel(
                 {loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,
                 navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                 responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
           </script>
           </div>
           </section>
        </main>
       <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
         <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
               <div class="section-title">
                  <span>Top Views</span>
                  {{-- <ul class="halim-popular-tab" role="tablist">

                     <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                     </li>
                     <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">All</a>
                     </li>
                     <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                     </li>
                     <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                     </li>
                  </ul> --}}
               </div>
            </div>
            <section class="tab-content">
               <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                  <div class="halim-ajax-popular-post-loading hidden"></div>
                  <div id="halim-ajax-popular-post" class="popular-post">
                     @foreach ($view as $key => $mov)
                     <div class="item post-37176">
                        <a href="{{ route('movie',$mov->slug) }}" title="{{ $mov->title }}">
                           <div class="item-link">
                              <img src="{{asset('uploads/movie/'.$mov->image) }}" class="lazy post-thumb" title="{{ $mov->title }}" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">{{ $mov->title }}</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">{{ $mov->view }} lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     @endforeach

                     {{-- <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div>
                     <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                           <div class="item-link">
                              <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                     </div> --}}


                  </div>
               </div>
            </section>
            <div class="clearfix"></div>
         </div>
           </aside>
</div>
@endsection
