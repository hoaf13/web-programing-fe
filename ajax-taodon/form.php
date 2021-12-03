<!-- add/edit form modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding: 0 2%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Order <i class="fa fa-user-circle-o"
            aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Mã đơn hàng</label>
            <input type="text" class="form-control" id="order_id_form_edit" aria-describedby="" disabled="disabled" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tên khách hàng</label>
            <input type="text" class="form-control" id="employer_id_form_edit" disabled="disabled" aria-describedby="" placeholder="">
          </div>
          <div class="form-group" style="margin: 2% 0;">
              <label for="trangthaiduyet_form_edit">Trạng thái đơn hàng</label>
            <select id="trangthaiduyet_form_edit" class="form-control">
              <option value="1">Đã duyệt</option>
              <option value="2">Đang chờ</option>
              <option value="0">Đã hủy</option>
            </select>
          </div>
          <div class="form-group" style="margin: 2% 0;">
            <label for="trangthaithanhtoan_form_edit">Trạng thái thanh toán</label>
            <select id="trangthaithanhtoan_form_edit" class="form-control"> 
              <option value="1">Đã thanh toán</option>
              <option value="0">Chưa thanh toán</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Khách phải trả</label>
            <input type="number" class="form-control" id="total_form_edit" aria-describedby="" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ngày tạo đơn</label>
            <input type="text" class="form-control" id="appointment_form_edit" aria-describedby="" placeholder="">
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="updateOrder">Submit</button>
          <input type="hidden" name="action" value="adduser">
          <input type="hidden" name="userid" id="userid" value="">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add/edit form modal end -->
