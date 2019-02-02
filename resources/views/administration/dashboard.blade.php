@extends('layouts.adminLayout.masterLayout')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <!-- RECENT REPORT-->
            <div class="recent-report3 m-b-40">
                <div class="title-wrap">
                    <h3 class="title-3">recent reports</h3>
                    <div class="chart-info-wrap">
                        <div class="chart-note">
                            <span class="dot dot--blue"></span>
                            <span>Blue</span>
                        </div>
                        <div class="chart-note mr-0">
                            <span class="dot dot--green"></span>
                            <span>green</span>
                        </div>
                    </div>
                </div>
                <div class="filters m-b-55">
                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                        <select class="js-select2" name="property">
                            <option selected="selected">Products Sales</option>
                            <option value="">Products</option>
                            <option value="">Services</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                        <select class="js-select2 au-select-dark" name="time">
                            <option selected="selected">All Time</option>
                            <option value="">By Month</option>
                            <option value="">By Day</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="chart-wrap">
                    <canvas id="recent-rep3-chart"></canvas>
                </div>
            </div>
            <!-- END RECENT REPORT-->
        </div>
        <div class="col-lg-4">
            <!-- CHART PERCENT-->
            <div class="chart-percent-3 m-b-40">
                <h3 class="title-3 m-b-25">chart by %</h3>
                <div class="chart-note m-b-5">
                    <span class="dot dot--blue"></span>
                    <span>products</span>
                </div>
                <div class="chart-note">
                    <span class="dot dot--red"></span>
                    <span>services</span>
                </div>
                <div class="chart-wrap m-t-60">
                    <canvas id="percent-chart2"></canvas>
                </div>
            </div>
            <!-- END CHART PERCENT-->
        </div>
    </div>
@endsection