@extends('layouts.app')
@section('content')
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Search Twitt</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">keyword = {{ $q }}</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-block">
                        <form class="app-search" method="post" action="{{ url('analys')}}">{{ csrf_field() }}
                                <input name="q" type="text" class="form-control" placeholder="Search & enter"></i></a> 
                        </form>
                    </div>
                </div>
            </div>
    <!-- Column -->
    <div class="col-lg-8 col-md-9">
        <div class="card">
            <div class="card-block">
                <h3 class="card-title">Percentage of twitt  </h3>
                <h6 class="card-subtitle">from {{ $result['metadata']['happy_count'] + $result['metadata']['sad_count'] }} twitts</h6>
                <div id="visitor" style="height:290px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-block text-center ">
                <ul class="list-inline m-b-0">
                    <li>
                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Fun</h6> </li>
                        <li>
                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Sad</h6> </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="card">
                <div class="card-block bg-info">
                    <h4 class="text-white card-title">Result</h4>
                    <h6 class="card-subtitle text-white m-b-0 op-5">counter twit</h6>
                </div>
                <div class="card-block">
                    <div class="message-box contact-box">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-2">
                                    <h1>
                                        FUN:
                                    </h1>
                                </div>
                                &emsp;
                                <div class="col-md-10">
                                    <h1>
                                        {{ $result['metadata']['happy_count']}}
                                    </h1>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <h1>
                                        SAD:
                                    </h1>
                                </div>
                                &emsp;
                                <div class="col-md-10">
                                    <h1>
                                        {{ $result['metadata']['sad_count']}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
</div>
<!-- Row -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-6 col-xlg-6 col-md-6">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Fun Twitts</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-block">
                        <div class="profiletimeline">
                            @foreach($result['happy'] as $key)
                                @if(!$loop->first)
                                <hr>
                                @endif
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ $key['user']['profile_image_url'] }}" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link"> {{ '@'. $key['user']['screen_name']}} </a> <span class="sl-date">{{ \Carbon\Carbon::parse($key['created_at'])->diffForHumans()}}</span>
                                            <p class="m-t-10"> 
                                                {!! preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $key['text']) !!}
                                            </p>
                                        </div>
                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">{{ $key['retweet_count']}} Retweet</a>  </div>
                                    </div>
                                </div>
                                @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-6 col-xlg-6 col-md-9">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Sad Twitts</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-block">
                        <div class="profiletimeline">
                        @foreach($result['sad'] as $key)
                            @if(!$loop->first)
                            <hr>
                            @endif
                            <div class="sl-item">
                                <div class="sl-left"> <img src="{{ $key['user']['profile_image_url'] }}" alt="user" class="img-circle"> </div>
                                <div class="sl-right">
                                    <div><a href="#" class="link"> {{ '@'. $key['user']['screen_name']}} </a> <span class="sl-date">{{ \Carbon\Carbon::parse($key['created_at'])->diffForHumans()}}</span>
                                        <p class="m-t-10"> 
                                            {!! preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $key['text']) !!}
                                        </p>
                                    </div>
                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">{{ $key['retweet_count']}} Retweet</a>  </div>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection

@section('page-scripts')
    <!-- chartist chart -->
    <script src="{{ url('assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ url('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{ url('assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{ url('assets/plugins/c3-master/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script type="text/javascript">
        $(function() {
            "use strict";

            // ==============================================================
            // Our visitor
            // ==============================================================

            var chart = c3.generate({
                bindto: '#visitor',
                data: {
                    columns: [
                        ['fun', {{ $result['metadata']['happy_count'] }}],
                        ['Sad', {{ $result['metadata']['sad_count'] }}],
                    ],

                    type: 'donut',
                    onclick: function(d, i) { console.log("onclick", d, i); },
                    onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function(d, i) { console.log("onmouseout", d, i); }
                },
                donut: {
                    label: {
                        show: false
                    },
                    title: "{{ $q }}",
                    width: 20,

                },

                legend: {
                    hide: true
                    //or hide: 'data1'
                    //or hide: ['data1', 'data2']
                },
                color: {
                    pattern: ['#1E87E5', '#26C6DA']
                }
            });
        });
    </script>
@endsection

