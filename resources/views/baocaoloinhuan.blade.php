@extends('default')
@section('title','Báo cáo lợi nhuận bán hàng')
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo lợi nhuận bán hàng</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <div>
                            <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                                    class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-info" id="exportExcelDBLotNo1" style="display:none"><i
                                    class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-info" id="exportExcelDBLotNo2" style="display:none"><i
                                    class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{asset('baocao')}}">
                            <button type="button" class="btn btn-danger" id="inTab2">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                Trở về
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="row tx-gray-900">
                    <div class="col-md-3 col-lg-2">
                        <label for="">Kiểu hiển thị</label>
                        <select class="js-example-basic-single form-control" id="type" name="state">
                            <option value="money">Tiền</option>
                            <option value="promiss">Phiếu</option>
                            <option value="bill">Hóa đơn</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Trạng thái</label>
                        <select class="js-example-basic-single form-control" id="time" name="state">
                            <option value="">Năm</option>
                            <option value="">Quý</option>
                            <option value="">Tháng</option>
                            <option value="">Ngày</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-5">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#" class="text-primary">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã hoá đơn hoặc tên khách hàng..." id="searchProduct">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" id="searchData">
                                <em class="fa fa-search"></em>
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20" id="table1" style="display: block;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thời gian</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền khác hàng trả lại
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá khách trả
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Doanh thu</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giá vốn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Lợi nhuận</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" id="table2" style="display: none;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3"
                        style="width:100%;overflow-x: auto;">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">TKhách hàng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày giao dịch</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền hàng </th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá </th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giá vốn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Lợi nhuận</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" id="table3" style="display: none;">
                    <div class="table table-scrollable" style="overflow-x:auto;margin: 5px 0 !important">
                        <label for="" class="tx-bold tx-gray-800" id="info-data-table4"></label>
                        <table class="table table-bordered margin-bottom-0 tx-13 tx-gray-700 mg-b-0 bd display"
                            id="data-table4" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 50px;text-align: right;">
                                        #</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Mã hàng hóa</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Tên hàng hóa</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        Số lô</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        ĐVT</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Tỷ lệ quy đổi</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Số lượng bán</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        Giá bán</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 130px;text-align: right;">
                                        Tổng tiền hoá đơn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 170px;text-align: right;">
                                        Tổng giảm giá hóa đơn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Số lượng trả</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Đơn giá trả </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 150px;text-align: right;">
                                        Tổng tiền khách hàng trả
                                        lại
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 150px;text-align: right;">
                                        Tổng giảm giá khách trả
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        Doanh thu</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        Giá vốn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 100px;text-align: right;">
                                        Tổng giá vốn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 80px;text-align: right;">
                                        Lợi nhuận</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{asset('baocao')}}">
                        <button class="btn btn-danger" id="outTab2">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Trở về
                        </button>
                    </a>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden" id="tab2">
    </div>
    <!-- end tab2 -->

</div><!-- br-mainpanel -->

<!-- ########## END: MAIN PANEL ########## -->
<script>
    function decialNumber(number){
		return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
	}
    function checkRangeValue(value){
      if(value<10){
        return "00000"+value
      }else if(value<100){
        return "0000"+value
      }else{
        return "000"+value
      }
    }
    $(document).ready(function () {
      var table1 = $('#data-table1').DataTable({
        processing: true,
      "order": [[ 1, "desc" ]],
        "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
        "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first":"Đầu",
          "last":"Cuối",
          "next": "Sau",
          "previous": "Trước"
        },
      },

        "ajax": {
          type:"GET",
          url : "{{ url('baocaoloinhuan/money') }}",dataType : "json",
        },
        "columns": [
          { data: 'id', name: 'id'},
          { data: null,
            "render": function(data,type,row) {
                    return data['day']
            }
         },
          { data: null,
            "render": function(data,type,row) { return decialNumber(data["totalMoney"])}
          },
          { data: null,
            "render": function(data,type,row) { return decialNumber(data["sales"])}
          },
          { data: null,
            "render": function(data,type,row) { return decialNumber(data["totalpaid"])}
          },
          { data: null,
            "render": function(data,type,row) { return decialNumber(data["discounts"])}
          },
          { data: null, orderable: false,
            "render": function(data,type,row) {
              return decialNumber(parseFloat(data['totalMoney'])-parseFloat(data["totalpaid"])+parseFloat(data['discounts'])-parseFloat(data['sales'])|| 0)
            }
          },
          { data: null, orderable: false,
            "render": function(data,type,row) {
              return decialNumber(parseFloat(data['totalPrice']))
            }
          },
          { data: null, orderable: false,
            "render": function(data,type,row) {
              return decialNumber((parseFloat(data['totalMoney'])-parseFloat(data['totalpaid'])+parseFloat(data['discounts'])-parseFloat(data['sales']))-parseFloat(data['totalPrice'])||0)
            }
          },
          ],
          columnDefs: [
            {
                targets: [2,3,4,5],
                render: $.fn.dataTable.render.number(',', 0, '')
            }
            ],
          dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoLoiNhuanBanHang_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcelDBLotNo');
      table1.on('order.dt search.dt', function () {
		table1.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table1
    // .columns(1)
    .search( $('#searchProduct').val())
    .draw();
    });

      var table2 = $('#data-table3').DataTable({
        processing: true,
       "order": [[ 1, "desc" ]],
      "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
        "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first":"Đầu",
          "last":"Cuối",
          "next": "Sau",
          "previous": "Trước"
        },
      },
        ajax: "{{ url('baocaoloinhuan/promiss') }}",
        columns: [
          { data: 'id', name: 'id'},
          { data: null,
            "render": function(data,type,row) {
            if(row['type'] =="sell"){
                return "HD"+checkRangeValue(data["id"])
                }else{
                    return "PKT"+checkRangeValue(data["id"])
                }

                }
                    },
          { data: null,
        "render": function(data,type,row) {
            if(data["nameSell"]!==null){
                return data['nameSell'];
            }else if(data["nameCustomer"]!==null){
                return data['nameCustomer'];
            }else{
                return 'Khách lẻ'
            }
        }
    },
          { data: null,
           "render":function(data){
            if(data['type']=='sell'){
                if(data['nameSell']==null){
                    return data['dateSell'] +'<span> - </span>'+data['hourSell'];
                }else{
                    return data['dateSell'] +'<span> - </span>'+data['hourSell'];
                }
              }else if (data['type']=='return_from_customer'){
                if(data['nameCustomer']==null){
                    return data['dateCustomer'] +'<span> - </span>'+data['hourCustomer'];
                }else{
                    return data['dateCustomer'] +'<span> - </span>'+data['hourCustomer'];
                }
              }else{
                return data['dateSell'] +'<span> - </span>'+data['hourSell'];
              }
           }
          },
          { data: null,
           "render":function(data){
            if(data['type']=='sell'){
                if(data['nameSell']==null){
                    return decialNumber(data['Prices_import']||0);
                }else{
                    return decialNumber(data['Prices_import']||0);
                }
              }else if (data['type']=='return_from_customer'){
                if(data['nameCustomer'] ==null){
                    return '-' + decialNumber(data['totalpaid'] ||0);
                }else{
                    return '-' + decialNumber(data['totalpaid']||0);
                }
              }else{
                return "0.00";
              }
           }
          },
          { data:null,
            "render":function(data,type,row){
              if(data['type']=='sell'){
                if(data['checkbox']==1){
                  return  decialNumber(data['sale']);
                }else if(data['checkbox']==0){
                  return decialNumber(data['sale']);
                }else{
                  return "0.00";
                }
              }else if (data['type']=='return_from_customer'){
                if(data['status']==1){
                return "-" +decialNumber(data['discount']||0);
                }else{
                    return "0.00"
                }

              }else{
                return "0.00"
              }

            }
          },
          { data: null,
            'render':function(data,type,row){
               if(data['type']=='sell'){
                if(data['checkbox']==1){
                  return decialNumber(data['Prices_import']-data['sale']);
                }else if(data['checkbox']==0){
                  return decialNumber(data['Prices_import']-data['sale']);
                }else{
                  return "0.00";
                }
              }else if (data['type']=='return_from_customer'){
                return decialNumber(parseInt(data['totalpaid']) + parseInt(data['discount'])||0);
              }else{
                return "0.00"
              }

            }
          },
          { data: null,
            'render':function(data,type,row){
               if(data['type']=='sell'){
                if(data['checkbox']==1){
                  return decialNumber(data['Lotno_price']);
                }else if(data['checkbox']==0){
                  return decialNumber(data['Lotno_price']);
                }else{
                  return "0.00";
                }
              }else if (data['type']=='return_from_customer'){
                return decialNumber(data['Lotno_price']);
              }else{
                return "0.00"
              }

            }
          },
          { data: null,
            'render':function(data,type,row){
               if(data['type']=='sell'){
                if(data['checkbox']==1){
                  return decialNumber((data['Prices_import']-data['sale'])-(data['Lotno_price']));
                }else if(data['checkbox']==0){
                    return decialNumber((data['Prices_import']-data['sale'])-(data['Lotno_price']));
                }else{
                    return "0.00";
                }

              }else if (data['type']=='return_from_customer'){
                return decialNumber(data['Lotno_price'] -(data['totalpaid']) + parseInt(data['discount']));
              }else{
                return "0.00"
              }

            }
          },
          ],
          columnDefs: [
            {
                targets: [4],
                render: $.fn.dataTable.render.number(',', 0, '')
            }
          ],
          dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoLoiNhuanBanHang_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table3"]').appendTo('#exportExcelDBLotNo1');
      table2.on('order.dt search.dt', function () {
		table2.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table2
    // .columns(1)
    // .columns(2)
    .search( $('#searchProduct').val())
    .draw();
    });

      var table4 = $('#data-table4').DataTable({
        processing: true,
      "order": [[ 1, "desc" ]],
        "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
        "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first":"Đầu",
          "last":"Cuối",
          "next": "Sau",
          "previous": "Trước"
        },
      },

        "ajax": {
          type:"GET",
          url : "{{ url('baocaoloinhuan/bill') }}",dataType : "json",
        },
        "columns": [
          { data: 'id', name: 'id'},
          { data: null,
              'render':function(data,type,row){
                return 'HH' +checkRangeValue(data['stock_id']);
              }
          },
          { data: 'name', name: 'name' },
          { data: 'lot_no', name: 'lot_no' },
          { data: 'unit', name: 'unit' },
          { data: 'exchange', name: 'exchange' },
          { data: null,
            'render':function(data,type,row){
              if(data['type']=='sell'){
                return data['qty'];
              }else{
                return 1;
              }
            }
          },
          { data: null,
              'render':function(data,type,row){
                return decialNumber(data['price_import']);
              }
          },
          { data: null,
              'render':function(data,type,row){
                return decialNumber(data['qty']*data['price_import']);
              }
          },
          { data: null,
            'render':function(data,type,row){
              if(data['type']=='sell'){
                return decialNumber(data['sale']);
              }else{
                return '0.00';
              }
            }
          },
          { data: null,
            'render':function(data,type,row){
              if(data['type']!='sell'){
                return data['qty'];
              }else{
                return 0;
              }
            }
          },
          { data: null,
              'render':function(data,type,row){
                return decialNumber(data['price']);
              }
          },
          { data: null,
              'render':function(data,type,row){
                return decialNumber(data['qty']*data['price']);
              }
          },
          { data: null,
            'render':function(data,type,row){
              if(data['type']=='return_from_customer'){
                return decialNumber(data['discount']);
              }else{
                return '0.00';
              }
            }
          },

          { data: null,
            'render':function(data,type,row){
                return decialNumber(((data['qty']*data['price_import'])-(data['qty']*data['price'])) + (data['sale']-data['discount'])) ;
            }
          },
          { data: null,
            'render':function(data,type,row){
                return decialNumber(data['totalPrice']) ;
            }
          },
          { data: null,
            'render':function(data,type,row){
                return decialNumber(data['totalPrice']*data['qty'])
            }
          },
          { data: null,
            'render':function(data,type,row){
                return decialNumber((((data['qty']*data['price_import'])-(data['qty']*data['price'])) + (data['sale']-data['discount']))-(data['totalPrice']*data['qty'])) ;
            }
          },
          ],
     dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoDanhThuBanHang_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
                exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12,13,14]
                },
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table4"]').appendTo('#exportExcelDBLotNo2');

      table4.on('order.dt search.dt', function () {
		table4.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table4
    // .columns(1)
    // .columns(2)
    .search( $('#searchProduct').val())
    .draw();
    });
    });
    // Datepicker
        $(document).ready(function () {
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });

        $('#data-table4_paginate').after($('#data-table4_length'));
      $('#data-table4_info').detach().appendTo('#info-data-table4');
        $('#tpBasic').timepicker();
        $('#tpBasic1').timepicker();
        $('#tpBasic2').timepicker();

        $("#inTab2").click(function () {
            $("#tab1").addClass("hidden");
            $("#tab2").removeClass("hidden");
        })
        $("#outTab2").click(function () {
            $("#tab1").removeClass("hidden");
            $("#tab2").addClass("hidden");
        })
        $('#type').on('change',function(){
        if($(this).val()=='money'){
          $('#table3').css("display","none");
          $('#table2').css("display","none");
          $('#table1').css("display","block");
          $('#exportExcelDBLotNo2').css("display","none");
          $('#exportExcelDBLotNo1').css("display","none");
          $('#exportExcelDBLotNo').css("display","block");

        }else if($(this).val()=='promiss'){
           $('#table3').css("display","none");
          $('#table2').css("display","block");
          $('#table1').css("display","none");
          $('#exportExcelDBLotNo2').css("display","none");
          $('#exportExcelDBLotNo1').css("display","block");
          $('#exportExcelDBLotNo').css("display","none");

        }else{
          $('#table3').css("display","block");
          $('#table2').css("display","none");
          $('#table1').css("display","none");
          $('#exportExcelDBLotNo2').css("display","block");
          $('#exportExcelDBLotNo1').css("display","none");
          $('#exportExcelDBLotNo').css("display","none");

        }
      })

        });

        var xlsBuilder = {
    customize: function(xlsx) {
      var sheet = xlsx.xl.worksheets['sheet1.xml'];
      var downrows = 5;
      var clRow = $('row', sheet);
      var msg;

      clRow.each(function() {
        var attr = $(this).attr('r');
        var ind = parseInt(attr);
        ind = ind + downrows;
        $(this).attr("r", ind);
      });


      $('row c ', sheet).each(function() {
        var attr = $(this).attr('r');
        var pre = attr.substring(0, 1);
        var ind = parseInt(attr.substring(1, attr.length));
        ind = ind + downrows;
        $(this).attr("r", pre + ind);
      });

      function Addrow(index, data) {

        msg = '<row r="' + index + '">';
        for (var i = 0; i < data.length; i++) {
          var key = data[i].k;
          var value = data[i].v;
          msg += '<c t="inlineStr" r="' + key + index + '">';
          msg += '<is>';
          msg += '<t>' + value + '</t>';
          msg += '</is>';
          msg += '</c>';
        }
        msg += '</row>';
        return msg;
      }
      var r1 = Addrow(1, [{
        k: 'A',
        v: 'Hộ Kinh Doanh Nhà Thuốc Morioka'
      }
      ]);
      var r2 = Addrow(2, [{
        k: 'A',
        v: '68 Ngõ 10 Nguyễn Thị Định'
      }
      ]);
      var r3 = Addrow(3, [{
        k: 'C',
        v: 'BÁO CÁO LỢI NHUẬN BÁN HÀNG:'
      }
      ]);
    //   var r4 = Addrow(4, [{
    //     k: 'C',
    //     v: 'Từ ngày'
    //   }
    //   ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6]
    },
  }
</script>
@endsection

