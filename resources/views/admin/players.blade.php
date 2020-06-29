@extends('../layout/base')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div id="playerData" class="invisible" 
    dartStyle="{{implode(',',array_map(function($i){return $i['dart_style'];},$players))}}" 
    throwingStyle="{{implode(',',array_map(function($i){return $i['throwing_style'];},$players))}}" ></div>

<div class="container-fluid px-3 mt-3">

  <div class="row">
    
  <div class="px-5 pt-2 col-sm-6 mb-5 animated bounceInRight delay-1s">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Dart Style</h6>
        <canvas id="bar"></canvas>
      </div>
    </div>
  </div>
  <div class="px-5 pt-2 col-sm-6 mb-5 animated bounceInLeft delay-1s">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Throwing Style</h6>
        <canvas id="donut"></canvas>
      </div>
    </div>
  </div>

    <div class="col-sm-12">
      <div class="card p-3 shadow-lg animated bounceInUp delay-1s">
        <div class="card-body w-100 text-nowrap" style="overflow-x: scroll">
           <table id="playerTable" class="table table-hover table-bordered">
            <thead>
              <tr>
                @foreach($players as $player)
                  @foreach($player as $key=>$item)
                    @if ($key !== "created_at" && $key !== "updated_at")
                    <th>{{ Str::ucfirst( Str::replaceArray('_',[' '], $key)  ) }}</th>
                    @endif
                  @endforeach
                  @break
                @endforeach
              </tr>
            </thead>

            <tbody> 
              @foreach($players as $player)
              <tr>
                @foreach($player as $key=>$item)
                    @if ($key !== "created_at" && $key !== "updated_at")
                      <td class="p-0 py-2 m-0 text-center">
                        @if($key === 'image')
                           <img src="{{$item}}" class="rounded" alt="player-img">
                        @elseif($key === 'description')
                          {{ Str::limit($item,25) }}
                        @else
                          {{$item}}
                        @endif
                      </td>
                  @endif
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>


    <div class="col-sm-6">
    </div>

    <div class="col-sm-6">
    </div>

  </div>

</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>

  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
@endpush

@push('custom-scripts')
 <script>
  $(document).ready( function () {
      $('#playerTable').DataTable({
        "aLengthMenu": [
          [10, 30, 50, -1],
          [10, 30, 50, "All"]
        ],
        select: true,
        "iDisplayLength": 10,
        "language": {
          search: ""
        }
      });

      $('#playerTable').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });

  // Bar chart

    let styleData = $("#playerData").attr('dartstyle');
    let styleArray = styleData.split(',');
    let styleUniqueArray = styleArray.filter( (item,i,arr) => arr.indexOf(item) === i ).slice(); 
    let countOfEveryUniqueDartStyle = new Array(styleUniqueArray.length);
    countOfEveryUniqueDartStyle.fill(0);
    
    for(let y=0;y<styleArray.length;y++){
      for(let x=0;x<styleUniqueArray.length;x++){
        if(styleArray[y] == styleUniqueArray[x]){
          countOfEveryUniqueDartStyle[x] += 1;
        }  
      }
    }


    new Chart($("#bar"), {
      type: 'horizontalBar',
      data: {
        labels: styleUniqueArray,
        datasets: [
          {
            label: "Style User",
            backgroundColor: ["rgba(204,255,51,1)","#66d1d1","#f77eb9"],
            data: countOfEveryUniqueDartStyle
          }
        ]
      },
      options: {
        legend: { display: false },
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
      }
    });


    let throwData = $("#playerData").attr('throwingStyle');
    let throwArray = throwData.split(',');
    let throwUniqueArray = throwArray.filter( (item,i,arr) => arr.indexOf(item) === i ).slice(); 
    let countOfEveryUniqueThrowStyle = new Array(throwUniqueArray.length);
    countOfEveryUniqueThrowStyle.fill(0);
    
    for(let y=0;y < throwArray.length;y++){
      for(let x=0;x < throwUniqueArray.length;x++){
        if(throwArray[y] == throwUniqueArray[x]){
          countOfEveryUniqueThrowStyle[x] += 1;
        }  
      }
    }



    new Chart($('#donut'), {
      type: 'doughnut',
      data: {
        labels: throwUniqueArray,
        datasets: [
          {
            label: "Throwing Style Users",
            backgroundColor: ["#7ee5e5","#f77eb9"],
            data: countOfEveryUniqueThrowStyle
          }
        ]
      }
    });


    });

function countUnique(iterable) {
  return new Set(iterable).size;
}

 </script>
@endpush
