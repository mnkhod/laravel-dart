@extends('../layout/base')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 stretch-card grid-margin">
        <div class="card shadow-lg mt-4 p-3  animated bounceInUp delay-1s">
          <div class="card-body">
            <div class="accordion" id="pageAccordion">
              <h2 class="bg-transparent" 
                      type="button" data-toggle="collapse" 
                      data-target="#faqSection" 
                      aria-controls="faqSection">FAQ Page Settings <i data-feather="arrow-down" class="float-right"></i></h2>

              <div id="faqSection" class="collapse" aria-labelledby="headingOne" data-parent="#faqSection">
                <div class="card-body">
                @if ($faqs)
                  <div class="mb-3 pb-3" style="overflow-x: scroll">
                    <table id="faqTable" class="table">
                      <thead>
                        <tr>
                          @foreach($faqs[0] as $key => $item)
                              <th>{{$key}}</th>
                          @endforeach
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($faqs as $items)
                          <tr class="faq-row" style="cursor: pointer;">
                            @foreach($items as $key => $item)
                              @if ($key === 'created_at' || $key === 'updated_at')
                                <td>{{ date('Y-m-d H:i:s',strtotime($item)) }}</td>
                              @else
                                <td>{{$item}}</td>
                              @endif

                              @if ($loop->last)
                                <form action="{{ route('pages.faq.delete',['id' => $items['id']]) }}" method="POST">
                                  @csrf
                                  <td>
                                    <button type="submit" class="float-right px-5 btn btn-danger" >Delete</button>
                                  </td>
                                </form>
                              @endif
                            @endforeach
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                @else
                  <h4>No FAQ Data</h4>
                @endif
                  </div>

                  <form class="mt-5 pt-3" action="{{ route('pages.faq.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="question">Question</label>
                      <input name="question" type="text" class="form-control" id="question">
                    </div>
                    <div class="form-group">
                      <label for="answer">Answer</label>
                      <textarea name="answer" id="answerBox" type="answer" class="form-control" id="answer"></textarea>
                    </div>
                    <button type="submit" class="float-right px-5 btn btn-success">Add</button>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>

  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush


@push('custom-scripts')
 <script>
$(document).ready( function () {

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

      
      new SimpleMDE({ element : document.getElementById("answerBox") });

      $(".faq-row").click(function() {
          let rowID = $(this).attr("row");

          $(`#form-data #playerId`).attr("value",$(`td#${rowID}-id`).text().trim());
          $(`#form-data #name`).attr("value",$(`td#${rowID}-name`).text().trim());
          $(`#form-data #description`).text($(`td#${rowID}-description`).attr('desc'));
          $(`#form-data #nickname`).attr("value",$(`td#${rowID}-nickname`).text().trim());
          $(`#form-data #bestmatch`).attr("value",$(`td#${rowID}-best_match`).text().trim());
          $(`#form-data #ranktitle`).attr("value",$(`td#${rowID}-rank_title`).text().trim());
          $(`#form-data #dartstyle`).val($(`td#${rowID}-dart_style`).text().trim());
          $(`#form-data #dartstyle`).change();

          $(`#form-data #throwingstyle`).val($(`td#${rowID}-throwing_style`).text().trim());
          $(`#form-data #throwingstyle`).change();
          
          $('html, body').animate({
              scrollTop: $("#form-data").offset().top
          }, 500);

      });

      $('#faqTable').DataTable({
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

      $('#faqTable').each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
      });

});

 </script>
@endpush
