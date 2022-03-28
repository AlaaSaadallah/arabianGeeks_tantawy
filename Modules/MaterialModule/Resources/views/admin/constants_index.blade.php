@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
              <div class="title_left">
                <h3>منتجاتنا <small>طنطاوى</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div> -->
               </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                   <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-striped projects" id="paperTypesTable">
                      <thead>
                        <tr>
                          <th style="width: 1%">م</th>
                          <th style="width: 20%">اسم المنتج</th>
                          <th>السعر</th>
                          <!-- <th>متاح</th> -->
                   <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td>1</td>
                          <td>
                            <a>بروشور</a>
                            <br />
                          </td>
                          <td>
                            A4
                          </td>
                      
                          <td>
                            <a href="edite_item.html" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> اضافة مقاس جديد </a>
                         -->
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>

            @push('scripts')
<script>
    $(document).ready(function() {


        var Auction_table = $('#paperTypesTable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            retrieve: true,
            pageLength: 25,
            "order": [
                [0, "asc"]
            ],
            //  datatable info
            "language": {
                "decimal": "",
                "emptyTable": "لا يوجد عناصر",
                "emptyTable": "لا يوجد عناصر مشابه",
                "info": "عرض _START_ من _END_  إلى _TOTAL_ عنصر",
                "infoEmpty": "عرض 0 to 0 of 0 عنصر",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "عرض _MENU_ عنصر",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "بحث ",
                "zeroRecords": "لا توجد عناصر",
                "paginate": {
                    "first": "الاول",
                    "last": "الاخير",
                    "next": "التالي",
                    "previous": "السابق"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
            },
            ajax: {
                url: "{{ route('admin.material.constants.index') }}", // call datatable data
                // data: function(d) {
                    // d.auction_status = $('#filter_auction_status').val(),
                    //     d.date_start = $("input[name=daterangepicker_start]").val(),
                    //     d.date_end = $("input[name=daterangepicker_end]").val()

                // }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                },
                {
                    data: 'name',
                    name: 'name',
                    "searchable": true,

                },
                {
                    data: 'price',
                    name: 'price',
                    "searchable": true,

                },
               
                // {
                //     data: 'is_available',
                //     name: 'is_available',
                //     "searchable": true
                // },
                
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ]
        });
        $('#filter_auction_status').change(function() {
            Auction_table.draw();
            
        });

       
        // $('#auction_table').on('click', '.deleteAuction', function() { // when delete button clicked
        //     var ContentOfText; //msg text
        //     var auction_id = $(this).data("id"); // id of clicked row
        //     ContentOfText = "Delete this Auction"
        //     swal({ // confirmation alert
        //             title: 'Are you sure?',
        //             text: ContentOfText,
        //             icon: 'warning',
        //             buttons: true,
        //             dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) { // delete action
        //                 var url = '/admin/auctions/delete/' + auction_id;
        //                 $.ajax({
        //                     url: url,
        //                     type: 'DELETE',
        //                     data: {
        //                         "_token": "{{ csrf_token() }}",
        //                     },
        //                     success: function(data) {
        //                         if (data === "true") { // if deleted
        //                             swal({ // success msg
        //                                 title: 'Done',
        //                                 text: "{{__('messages.deleted_Successfully')}}",
        //                                 icon: 'success',
        //                             }).then((result) => { // reload page after clicked
        //                                 location.reload();
        //                             })
        //                             return true;
        //                         } else if (data == 'ended') { // couldn't delete if had sub categories
        //                             swal('Can not Delete', 'Auction has been ended', 'info');
        //                         } else { // error while deleting
        //                             swal('Error', 'Please, Try Again Later!', 'error');
        //                             return false;
        //                         }
        //                     }
        //                 });
        //             }
        //         });
        // });

    });
</script>
@endpush
@endsection