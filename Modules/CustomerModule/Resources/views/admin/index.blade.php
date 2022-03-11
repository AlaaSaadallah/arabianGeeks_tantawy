@extends('layoutmodule::admin.main')

@section('content')
<div class="page-title">
              <div class="title_left">
                <h3>عملاءنا <small>طنطاوى</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
               </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                  <a href="{{route('admin.customers.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> اضافة عميل جديد </a>
                   <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-striped projects" id="customersTable">
                      <thead>
                        <tr>
                        <th style="width: 1%"></th>
                          <th style="width: 20%">اسم العميل</th>
                          <th>العنوان</th>
                          <th>رقم التليفون</th>
                          <th> اسم الدخول</th>
                          <th>الرقم السرى</th>
                          <th style="width: 20%"></th>
                   <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
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


        var Customer_table = $('#customersTable').DataTable({
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
                "emptyTable": "لا توجد عناصر ",
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
                url: "{{route('admin.customers.index') }}", // call datatable data
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
                    data: 'address',
                    name: 'address',
                    "searchable": true,

                },
                {
                    data: 'phone',
                    name: 'phone',
                    "searchable": true
                },
                {
                    data: 'email',
                    name: 'email',
                    "searchable": true
                },
                {
                    data: 'password',
                    name: 'password',
                    "searchable": true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ]
        });
        $('#filter_auction_status').change(function() {
            Customer_table.draw();
            
        });

       

    });
</script>
@endpush
@endsection