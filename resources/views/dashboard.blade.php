@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    @if (auth()->user()->role == 2)
        <h1 class="text-center">{{ config('app.name') }}</h1>
    @else
        <div class="row">

{{--            <div class="col-lg-3 col-6">--}}
{{--                <div class="small-box bg-dark">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>৳ {{ number_format($todaySale, 2) }}</h3>--}}
{{--                        <p>TODAY'S TOTAL SALE</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    @endif
@endsection

@section('script')
    <script src="{{ asset('themes/backend/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script>
        var ctx = document.getElementById('chart-sales-amount');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                // labels: saleAmountLabel,
                datasets: [{
                    // label: 'Sales Amount',
                    // data: saleAmount,
                    backgroundColor: 'rgba(60, 141, 188, 0.2)',
                    borderColor: 'rgba(60,141,188,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    displayColors: false,
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return "৳" + tooltipItems.yLabel;
                        }
                    }
                }
            }
        });

        var ctx2 = document.getElementById("chart-order-count").getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                // labels: saleAmountLabel,
                datasets: [{
                    // data: orderCount,
                    backgroundColor: 'rgba(60, 141, 188, 0.2)',
                    borderColor: 'rgba(60,141,188,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    displayColors: false
                }
            }
        });
    </script>
@endsection
