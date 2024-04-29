@extends('layouts.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')

@section('breadcrumb-item-active', 'Kumpulan Data Provinsi Kalimantan Selatan')

@section('css')
    <!-- [Page specific CSS] start -->
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
    <!-- [Page specific CSS] end -->
@endsection

@section('content')
        <!-- [ Main Content ] start -->
        <div class="row">
         
          <!-- Row Grouping table start -->
          <div class="col-sm-12">
            <div class="card">
                
              <div class="card-body">
                <div class="table-responsive dt-responsive">
                  <table id="multi-table" class="table table-striped table-bordered nowrap">

                 <!-- Button trigger modal -->
                 <div class="col-auto">
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Import Data
                   </button>
                 </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="/importexcel" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-body">
                      <div class="formgroup">
                        <input type="file" name="file" required>
                      </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </form>

                </div>
              </div>

                  <thead>
                        <tr>
                            <td>Nama Kota</td>
                            <td>Jenis Barang</td>
                            <td>Nama Barang</td>
                            <td>Harga Satuan</td>
                            <td>Kuartal</td>
                            <td>Tahun</td>
                            <td>Update & Delete</td>
                          </tr>
                        </thead>
                    
                    @foreach ($managementdata as $mgdata )
                    
                    <tbody>
                        <tr>
                            <td>{{$mgdata->nama_kota}}</td>
                            <td>{{$mgdata->jenis_barang}}</td>
                            <td>{{$mgdata->nama_barang}}</td>
                            <td>{{$mgdata->harga_satuan}}</td>
                            <td>{{$mgdata->kuartal}}</td>
                            <td>{{$mgdata->tahun}}</td>
                            <td>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-light-primary"><a href="{{ url('data_read', $mgdata->id) }}">Update</a></button>
                    <button type="button" class="btn btn-light-danger"><a href="{{ url('data_delete', $mgdata->id) }}">Delete</a></button>
                </div>
                  </td>
                          </tr>
                    </tbody>

                    @endforeach
                  
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Row Grouping table end -->
     
        </div>
        <!-- [ Main Content ] end -->
      
@endsection

@section('scripts')
    <!-- [Page Specific JS] start -->
    <!-- datatable Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script>
      // [ DOM/jquery ]
      var total, pageTotal;
      var table = $('#dom-jqry').DataTable();
      // [ column Rendering ]
      $('#colum-render').DataTable({
        columnDefs: [
          {
            render: function (data, type, row) {
              return data + ' (' + row[3] + ')';
            },
            targets: 0
          },
          {
            visible: false,
            targets: [3]
          }
        ]
      });
      // [ Multiple Table Control Elements ]
      $('#multi-table').DataTable({
        dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
      });
      // [ Complex Headers With Column Visibility ]
      $('#complex-header').DataTable({
        columnDefs: [
          {
            visible: false,
            targets: -1
          }
        ]
      });
      // [ Language file ]
      $('#lang-file').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json'
        }
      });
      // [ Setting Defaults ]
      $('#setting-default').DataTable();
      // [ Row Grouping ]
      var table1 = $('#row-grouping').DataTable({
        columnDefs: [
          {
            visible: false,
            targets: 2
          }
        ],
        order: [[2, 'asc']],
        displayLength: 25,
        drawCallback: function (settings) {
          var api = this.api();
          var rows = api
            .rows({
              page: 'current'
            })
            .nodes();
          var last = null;

          api
            .column(2, {
              page: 'current'
            })
            .data()
            .each(function (group, i) {
              if (last !== group) {
                $(rows)
                  .eq(i)
                  .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

                last = group;
              }
            });
        }
      });
      // [ Order by the grouping ]
      $('#row-grouping tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
          table.order([2, 'desc']).draw();
        } else {
          table.order([2, 'asc']).draw();
        }
      });
      // [ Footer callback ]
      $('#footer-callback').DataTable({
        footerCallback: function (row, data, start, end, display) {
          var api = this.api(),
            data;

          // Remove the formatting to get integer data for summation
          var intVal = function (i) {
            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
          };

          // Total over all pages
          total = api
            .column(4)
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

          // Total over this page
          pageTotal = api
            .column(4, {
              page: 'current'
            })
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

          // Update footer
          $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        }
      });
      // [ Custom Toolbar Elements ]
      $('#c-tool-ele').DataTable({
        dom: '<"toolbar">frtip'
      });
      // [ Custom Toolbar Elements ]
      $('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');
      // [ custom callback ]
      $('#row-callback').DataTable({
        createdRow: function (row, data, index) {
          if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
            $('td', row).eq(5).addClass('highlight');
          }
        }
      });
    </script>
    <!-- [Page Specific JS] end -->
@endsection