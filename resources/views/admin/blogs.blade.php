@extends('../layout/base')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

@php /*
<div id="playerData" class="invisible" 
    dartStyle="{{implode(',',array_map(function($i){return $i['dart_style'];},$players))}}" 
    throwingStyle="{{implode(',',array_map(function($i){return $i['throwing_style'];},$players))}}" ></div>
*/ @endphp

<div class="container-fluid px-3 mt-3">

  <div class="row">
    
  @php /*
    <div class="px-5 pt-2 col-sm-6 mb-5 animated bounceInRight delay-1s">

      @if ($players)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Dart Style</h6>
            <canvas id="bar"></canvas>
          </div>
        </div>
      @else
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Dart Style</h6>
            <p>No Players Data Detected</p>
          </div>
        </div>
      @endif

    </div>
    <div class="px-5 pt-2 col-sm-6 mb-5 animated bounceInLeft delay-1s">
      @if ($players)
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Throwing Style</h6>
          <canvas id="donut"></canvas>
        </div>
      </div>
      @else
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Throwing Style</h6>
          <p>No Players Data Detected</p>
        </div>
      </div>
      @endif

    </div>
  */ @endphp

    <div class="col-sm-12">
      <div class="card p-3 shadow-lg animated bounceInUp delay-1s">
        @if ($blogs)
          <div class="card-body w-100 text-nowrap" style="overflow-x: scroll">
        @else
          <div class="card-body w-100 text-nowrap">
        @endif
           <h3 class="py-3">Blogs Data</h3>
           @if ($blogs)
             <table id="playerTable" class="table table-hover table-bordered">
              <thead>
                <tr>
                  @foreach($blogs->toArray()[0] as $key => $item)
                      @if ($key === 'user_id')
                      <th>Author</th>
                      @elseif ($key === 'category_id')
                      <th>Category</th>
                      @else
                      <th>{{ Str::ucfirst( Str::replaceArray('_',[' '], $key)) }}</th>
                      @endif
                  @endforeach
                </tr>
              </thead>

              <tbody> 
                @foreach($blogs as $blog)
                <tr class="admin-row" row="{{$blog->id}}" style="cursor: pointer;">
                  @foreach($blog->toArray() as $key=>$item)
                    <td class="p-0 py-2 m-0 text-center" 
                        id="{{ $blog->id }}-{{$key}}" 
                        cat="{{ $blog->category_id }}"
                        auth="{{ $blog->user_id }}"
                        content="{{ $key == 'content' ? $item : '' }}">
                      @if ($key === 'image')
                         <img src="{{$item}}" class="rounded" alt="player-img">
                      @elseif ($key === 'content')
                        {{ Str::limit($item,25) }}
                      @elseif ($key === 'created_at' || $key === 'updated_at')
                        {{ date('Y-m-d H:i:s',strtotime($item)) }}
                      @elseif ($key === 'user_id')
                        {{ $blog->user->name }}
                      @elseif ($key === 'category_id')
                        {{ $blog->category->name }}
                      @else
                        {{$item}}
                      @endif
                    </td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
            </table> 
           @else
             <p>No Players Data Detected</p>
           @endif
        </div>
      </div>
    </div>





  </div>


    <div id="form-data" class="row py-5">
        <div class="col-sm-12  grid-margin stretch-card ">
          <div class="card shadow-lg animated bounceInRight delay-1s">
            <div class="card-body">
              <h3 class="card-title">Blog Base Information</h3>
              <div class="form-group">
                <label for="profileImage">Profile Image</label>
                <input type="file" class="dropify" id="profileImage" data-height="200" data-default-file="/assets/images/notfound.jpg"/>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="contentBox" class="form-control" id="content" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="dartstyle">Author</label>
                <select class="form-control" id="author">
                  <option value="Select Style">Select Style</option>
                    @foreach (App\User::all() as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="throwingstyle">Category</label>
                <select class="form-control" id="category">
                  <option value="Select Style">Select Style</option>
                    @foreach (App\BlogCategory::all() as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn btn-outline-success ml-4 px-5 shadow-lg animated bounceInUp delay-2s">Submit</button>
              </div>
            </div>
          </div>
        </div>
        
        <form action="#" id="form" >
        </form>

  </div>


</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>


  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
 <script>
$(document).ready( function () {

      $('.dropify').dropify();
      let contentBox = new SimpleMDE({ element : document.getElementById("contentBox") });

      @if (session('status'))

      const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
          timer : 5000 
      });
      
      Toast.fire({
        icon: 'success',
        title: "{{session('status')}}",
        showClass: {
          popup: 'animated fadeInDown delay-1s'
        },
        hideClass: {
          popup: 'animated fadeOutUp delay-1s'
        }
      });

      @endif

      $(".admin-row").click(function() {
          let rowID = $(this).attr("row");

          $(`#form-data .dropify-render img`).attr("src",$(`td#${rowID}-image img`).attr('src'));
          $(`#form-data .dropify-filename-inner`).text($(`td#${rowID}-image img`).attr('src').split("/").pop());

          $(`#form-data #title`).attr("value",$(`td#${rowID}-title`).text().trim());
          contentBox.value($(`td#${rowID}-content`).attr('content'))


          $(`#form-data #category`).val($(`td#${rowID}-category_id`).attr('cat'));
          $(`#form-data #category`).change();

          $(`#form-data #author`).val($(`td#${rowID}-user_id`).attr('auth'));
          $(`#form-data #author`).change();
          
          $('html, body').animate({
              scrollTop: $("#form-data").offset().top
          }, 500);

      });


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
