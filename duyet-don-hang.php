<div class="row" id="workspace" style="min-height: 913px;">
    <div class="container">
        <!-- hang 1 -->
        <div class="row">
            <div class="col">
            </div>
        </div> <!--end hang 1-->


        <!-- hang 2 -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary"><a class='sd' href="./home.php?page=tao-don-hang">Tạo Đơn Hàng</a></button>
                    </div>

                    <br><br><br>
                    <div class="card" style="padding: 2%;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">Tất cả đơn hàng</li>
                            <li class="breadcrumb-item"><a href="#">Đang giao dịch</a></li>
                            </ol>
                        </nav>
                        <br>
                        <div class="input-group">
                            <div class="form-outline">
                                <div class="d-flex">
                                <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm theo mã đơn hàng, vận đơn, tên, SĐT ..." style="width: 600px;"/>

                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <button type="button" class="btn btn-light">Ngày tạo <input type="date" id="ngay-tao"> </button>
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Trạng Thái
                                        </button>
                                        <select id="trangthaigiaodich" name="trangthaigiaodich" class="form-control" style="width:180px">
                                            <option class="dropdown-item"></option>
                                            <option class="dropdown-item" value="0">Đặt hàng</option>
                                            <option class="dropdown-item" value="1">Đang giao dịch</option>
                                            <option class="dropdown-item" value="2">Hoàn thành</option>
                                            <option class="dropdown-item" value="3">Đã hủy</option>
                                        </select>


                                    </div>
                                    <div class="dropdown" style="margin-left:10px">
                                        <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Nhân viên phụ trách
                                        </button>
                                        <select id="nhanvienphutrach" name="nhanvienphutrach" class="form-control" style="width:180px">
                                            <option class="dropdown-item"></option>
                                            <option class="dropdown-item">Nguyễn Văn Hòa</option>
                                            <option class="dropdown-item">Lê Thị Ebra</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <!-- thao tác -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success" id="duyetdon">Duyệt đơn</button>
                            <button type="button" class="btn btn-primary" id="duyetthanhtoan">Duyệt thanh toan</button>
                            <button type="button" class="btn btn-danger" id="huydon">Hủy Đơn</button>
                        </div>
                        <br>
                        <!-- end thao tác -->
                        <table class="table table-hover">
                            <thead >
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã Đơn Hàng</th>
                                <th scope="col">Ngày Tạo Đơn</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Trạng Thái Đơn Hàng</th>
                                <th scope="col">Trạng Thái Thanh Toán</th>
                                <th scope="col">Khách Phải Trả</th>
                                </tr>
                            </thead>
                            
                            <tbody id='danhsachdonhang'>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

        <!-- pagination -->
        <br><br><br><br>
        <div class="d-flex justify-content-between">

            <div class="dropdown">
                <label for="" style="margin-right:15px;font-size:20px;">Hien thi:</label>
                <select id="selec-display" class="btn btn-secondary dropdown-toggle" >
                    <option class="dropdown-item" value="5">5</option>
                    <option class="dropdown-item" value="10">10</option>
                    <option class="dropdown-item" value="20">20</option>
                </select>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination" id="pagination">

                </ul>
            </nav>
        </div>

        <div class="modal" id="myModal"
            data-backdrop="static"
            data-keyboard="false"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="width:60%;max-width: 1000px;">
                <div class="modal-content" >
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Chi tiet don hang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div style="display: flex;">
                            <div style="flex: 1;">
                                <div><label>Khach hang:</label><span id="employer_fullname1"></span></div>
                                <div><label>So dien thoai:</label><span id="employer_phone1"> </span></div>
                                <div><label>Dia chi:</label><span id="employer_address1"></span></div>
                            </div>
                            <div style="flex: 1;">
                                <div><label>Nguoi tao don:</label><span id="user_fullname1"></span></div>
                                <div><label>Ngay tao don:</label><span id="appointment1"></span></div>
                                <div><label>Tong hoa don:</label><span id="total1"></span></div>
                            </div>
                        </div>


                        <table class="table table-hover">
                            <thead >
                                <tr>
                                <th scope="col">Mã san pham</th>
                                <th scope="col">Ten san pham</th>
                                <th scope="col">So luong</th>
                                <th scope="col">Don vi</th>
                                <th scope="col">Don gia</th>
                                <th scope="col">Thanh tien</th>
                                </tr>
                            </thead>
                            <tbody id='chitietdonhang'>

                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>
    </div> <!-- end container-->
</div>
<?php include('ajax-taodon/form.php') ?>
<script  src="./js/duyetdon.js"></script>
