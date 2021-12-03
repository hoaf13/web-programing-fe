<div class="row" id="workspace">
    <div class="container">
        <!-- hang 1 -->
        <div class="row">
            <div class="col">
                <div class="display-6">Trang Tạo Đơn Hàng</div>
                <br>
            </div>
        </div> <!--end hang 1-->

        <!-- hang 2 -->
        <div class="row">
            <div class="col-md-9">
                <div class="customer-search card" style="padding: 2%;">
                    <div class="mini-title">Tim Khách Hàng </div>
                    <br>
                    <div class="form-control">
                        <div class="input-group">
                            <div class="form-inline" style="width: 100%;">
                                <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm khách hàng theo SĐT, tên, mã khách hàng, ..." />
                                <ul id="search_form1"style="display:none;">
                                <ul>
                            </div>
                        </div>
                    </div>
                    <div style='margin-top:30px' class="form-control">

                            <div class="infor_employer"><label  for="" >ID: </label><span id="infor_employer_id"></span></div>
                            <div class="infor_employer"><label  for="" >Ho ten: </label><span id="infor_employer_fullname"></span></div>
                            <div class="infor_employer"><label  for="" >So dien thoai: </label><span id="infor_employer_phone"></span></div>
                            <div class="infor_employer"><label  for="" >Dia chi: </label><span id="infor_employer_address"></span></div>
                    </div>
                </div>
                <br><br><br>
                <div class="product-search card" style="padding: 2%;">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mini-title">Thông Tin Sản Phẩm</div>
                        </div>

                    </div>
                    <br>
                    <div class="form-control">
                        <div class="input-group">
                            <div class="form-inline" style="width: 100%;">
                                <input id="form2" type="search" class="form-control" placeholder="Tìm kiếm sản phẩm theo tên, mã, ..." aria-label="Search" >
                                <ul id="search_form2"style="display:none;">
                                <ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="padding: 2%">
                    <table class="table table-hover">
                        <thead >
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã SKU</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn vị</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody id="list_product">
                        </tbody>
                    </table>
                    <br><br><br>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                            <table class="table table-hover">
                                <thead >
                                    <tr>
                                    <th scope="col">Hình Thức</th>
                                    <th scope="col">Tiền (đồng)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tổng Tiền</td>
                                        <td id="total">0</td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Chiết khấu</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Mã giảm giá</td>
                                        <td>0</td>
                                    </tr> -->
                                    <tr>
                                        <td>Phí giao hàng</td>
                                        <td id="phigiaohang">30000</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bolder; font-size: large;"> Khách phải trả </td>
                                        <td id="thanhtien" style="font-weight: bolder; font-size: large;"> 30000 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><br><br>
                <div class="card" style="padding: 5%;">
                    <div class="mini-title">Xác nhận thanh toán</div><br>
                    <div class="form-check"> <!-- form-check-->
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Khách hàng thanh toán trước
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="0" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Thu COD sau khi giao hàng thành công
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="0" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Thanh toán sau
                        </label>
                    </div>
                    <br>
                    <hr class="divider"></hr>
                    <div class="mini-title"> Hình thức thanh toán dự kiến </div>
                    </br>
                    <div class="form-group">
                        <select id="hinhthucthanhtoan" class="form-group" style="width: 100%; height: 40px;">
                            <option selected value="1"> Tiền mặt </option>
                            <option value="2"> Thẻ ATM nội địa </option>
                            <option value="3"> Thẻ Visa/Mastercard </option>
                        </select>
                    </div><br>
                </div>

                </br></br></br>
                <div class="card" style="padding: 5%;">
                    <div class="mini-title">Đóng gói và giao hàng</div><br>
                    <div class="form-group">
                        <select id="hinhthucvanchuyen" class="form-group" style="width: 100%; height: 40px;">
                            <option value="1" selected> Đẩy Qua Hãng Vận Chuyển </option>
                            <option value="2"> Tự gọi shipper </option>
                            <option value="3"> Nhận tại cửa hàng </option>
                            <option value="4"> Giao hàng sau </option>
                        </select>
                    </div><br>

                </div>
            </div>

            <div class="col-md-3">
                <div class="product-information card" style="padding: 5%;">
                    <div class="mini-title">Thông tin đơn hàng</div><br>
                    <form>
                        <div class="form-group">
                            <label for="">Chi nhánh</label>
                            <br>
                            <select id='chinhanh' class="form-group" style="width: 100%; height: 40px;" onchange="phigiaohang()">
                                <option value="1"> Hà Nội </option>
                                <option value="2"> Đà Nẵng </option>
                                <option value="3"> TP Hồ Chí Minh </option>
                            </select>
                        </div><br>

                        <div class="form-group">
                            <label for="ngay-hen-giao">Ngày hẹn giao</label></br>
                            <input type="date" id="ngay-hen-giao" name="ngay-hen-giao" style="width: 100%; height: 40px;">
                        </div><br>
                        <div class="form-group">
                            <label for="nhan-vien">Nhân Viên</label>
                            <select class="form-control" id="nhan-vien">
                            </select>
                        </div><br>

                    </form>
                </div>
            </div>
        </div> <!--end hang 2-->
        <br>

        <div class="col" style="text-align: right;"> <div onclick="taodon()" class="btn btn-primary" style="font-size: x-large;"> Tạo đơn hàng </div>  </div>
    </div> <!-- end container-->
</div>
<script  src="./js/taodon.js"></script>