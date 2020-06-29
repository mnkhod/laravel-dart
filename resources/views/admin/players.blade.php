@extends('../layout/base')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="container-fluid px-5 my-5">
   <table id="player-table" class="table-dark table-bordered w-100">
    <tr>

    @foreach($players as $player)
      @foreach($player as $key=>$item)
        @if ($key !== "created_at" && $key !== "updated_at")
        <th class="p-3">{{ Str::ucfirst( Str::replaceArray('_',[' '], $key)  ) }}</th>
        @endif
      @endforeach
      @break
    @endforeach

    </tr>
    @foreach($players as $player)
    <tr>
      @foreach($player as $key=>$item)
          @if ($key !== "created_at" && $key !== "updated_at")
            @if($key === 'image')
              <td class="p-3"> <img src="{{$item}}" class="rounded" alt="player-img" width="200" height="200" style="object-fit: cover;"> </td>
            @else
              <td class="p-3">{{$item}}</td>
            @endif
        @endif
      @endforeach
    </tr>
    @endforeach
  </table> 
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
 <script>
  $(function() {
    'use strict';

    $(function() {
      $('#player-table').DataTable({
        "aLengthMenu": [
          [10, 30, 50, -1],
          [10, 30, 50, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: ""
        }
      });

      /* $('#player-table').each(function() { */
      /*   var datatable = $(this); */
      /*   // SEARCH - Add the placeholder for Search and Turn this into in-line form control */
      /*   var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input'); */
      /*   search_input.attr('placeholder', 'Search'); */
      /*   search_input.removeClass('form-control-sm'); */
      /*   // LENGTH - Inline-Form control */
      /*   var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select'); */
      /*   length_sel.removeClass('form-control-sm'); */
      /* }); */
    });

  });
 </script>
@endpush
