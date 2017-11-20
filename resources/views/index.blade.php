@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Home</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <!-- Column -->
                <div class="card">
                    <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap">
                    <div class="card-block little-profile text-center">
                        <div class="pro-img"><img src="../assets/images/users/4.jpg" alt="user" /></div>
                        <h3 class="m-b-0">MUH FAISAL NATSIR ASRAFI</h3>
                        <p>15/386067/SV/09453</p>
                        <a href="https://twitter.com/zeronatsir" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>
                        <div class="row text-center m-t-20">
                            
                        </div>
                    </div>
                </div>
            </div>
             
            <!-- Column -->
            <div class="col-lg-8 col-md-9">
                <div class="card">
                    <div class="card-block">
                        <h1 class="card-title">TWIT FUN SAD ANALYS</h1>
                        <h2 class="card-subtitle">Type in the Search bar for search twit keyword</h2>
                    </div>
                </div>
            </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection