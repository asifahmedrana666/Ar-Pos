
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; {{$footer}} 2022</div>
            
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        

        
        
        
        <script >
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Total Product", "Total Category", "Total Sale", "Alart Low Quntity"],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [1,2,3,4],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});


        </script>

        @php
            $Total_Product = App\Models\Product::count();
            $today = Carbon\Carbon::now()->isoFormat('YYYY-MM-DD');
            $yesterday = Carbon\Carbon::yesterday()->isoFormat('YYYY-MM-DD');
            $yesterday_sale = App\Models\order::where('created_at',$yesterday)->selectRaw('sum(product_price * quantity) as total')->get();
            $today_sale = App\Models\order::where('created_at',$today)->selectRaw('sum(product_price * quantity) as total')->get();

        @endphp

        <script>
          // Set new default font family and font color to mimic Bootstrap's default styling
          Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#292b2c';
          
          // Bar Chart Example
          var ctx = document.getElementById("myBarChart");
          var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ["Sale Yesterday", "Sale Today"],
              datasets: [{
                label: "Revenue",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [{{ $yesterday_sale[0]->total }}, {{$today_sale[0]->total}}],
              }],
            },
            options: {
              scales: {
                xAxes: [{
                  time: {
                    unit: 'month'
                  },
                  gridLines: {
                    display: false
                  },
                  ticks: {
                    maxTicksLimit: 6
                  }
                }],
                yAxes: [{
                  ticks: {
                    min: 0,
                    max: 1000,
                    maxTicksLimit: 5
                  },
                  gridLines: {
                    display: true
                  }
                }],
              },
              legend: {
                display: false
              }
            }
          });
          
          
                  </script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/js/datatables-simple-demo.js') }}"></script>
</body>
</html>