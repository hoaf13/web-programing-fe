var limit_item = 0;
var total_page;
$(document).ready(()=>{
    render()
    $.post('ajax-taodon/get-list-admin.php',
    {
    }, function (res) {
        list = '<option value="" class="dropdown-item"></option>'
        res.data.forEach(admin => {
            list += '<option value="'+admin.id+'">'+admin.fullname+'</option>'
        });
        $('#nhanvienphutrach').html(list)
    },'json'
    )
})
function render() {
    console.log('abcs');
    console.log($('.active-page').text());
    $.post('ajax-duyetdon/get-list-order.php',
    {
            search: $('#form1').val(),
            date: $('#ngay-tao').val(),
            status: $('#trangthaigiaodich').val(),
            user_id: $('#nhanvienphutrach').val(),
            limit: $('#selec-display').val(),
            page: $('.active-page').text()
    }, function (res) {
        // console.log(res);
        console.log('zed');
        list=''
        res.data.forEach(order => {
            if (order.trangthaiduyet==0) {
                duyet = '<span class="text-danger" style="font-weight: bolder;">Đã hủy'
            } else if (order.trangthaiduyet==1) {
                duyet = '<span class="text-success" style="font-weight: bolder;">Đã duyệt '
            } else duyet='<span class="text-warning" style="font-weight: bolder;"> Đang chờ'

            if (order.trangthaithanhtoan==0) {
                thanhtoan = '<span class="text-warning" style="font-weight: bolder;">Chưa thanh toán'
            } else if (order.trangthaithanhtoan==1) {
                thanhtoan = '<span class="text-success" style="font-weight: bolder;">Đã thanh toán'
            }
            list +=  '<tr >'
                +'<td><input class="form-check-input flexCheckDefault" type="checkbox" value="'+order.order_id+'" ></td>'
                +'<td onclick="show('+order.order_id+')">'+order.order_id+'</td>'
                +'<td>'+order.appointment+'</td>'
                +'<td>'+order.employer_fullname+'</td>'
                +'<td id="trangthaiduyet'+order.order_id+'">'+duyet+'</span></td>'
                +'<td id="trangthaithanhtoan'+order.order_id+'">'+thanhtoan+'</td>'
                +'<td>'+order.total+'</td>'
                +'<td><button class="btn btn-primary edit-ord" data-toggle="modal" data-target="#orderModal" data-id="'+order.order_id+'">sửa</button><button class="btn btn-danger delete-ord" data-id="'+order.order_id+'">xóa</button></td>'

                +'</tr>'
        })


        
        $('#danhsachdonhang').html(list)
        limit = $('#selec-display').val()
        total_page1 = Math.ceil(res.total/limit);
        if (limit != limit_item || total_page != total_page1) {
            limit_item = limit
            total_page =total_page1
            list='<li onclick="chuyenpage(-1)" class="page-link">Previous</li>'
            for (i=1;i<=total_page;i++) {
                if (i==res.page)
                list+='<li onclick="chuyenpage('+i+')" class="page-item page-link active active-page">'+i+'</li>'
                else
                list+='<li onclick="chuyenpage('+i+')" class="page-item page-link">'+i+'</li>'
            }
            list+= '<li onclick="chuyenpage(0)" class="page-link">Next</li>'
            // <li class="page-item page-link">Previous</li>
            // <li class="page-item page-link active active-page">1</a></li>
            // <li class="page-item page-link">2</li>
            // <li class="page-item page-link">3</li>
            // <li class="page-item page-link">Next</li>
            $('#pagination').html(list)
        }
    //     <tr>
    //     <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
    //     <td>A229</td>
    //     <td>12/11/2021 13:20</td>
    //     <td>Mohhamad Ali</td>
    //     <td> <span class="text-success" style="font-weight: bolder;"> Đã duyệt </span></td>
    //     <td><span class="text-warning" style="font-weight: bolder;"> Chưa thanh toán </span></td>
    //     <td>245.000</td>
    // </tr>
    },'json'
    ).fail(function() {
    alert( "error" );
  })
}

$(document).on("click", ".delete-ord", function (e) {
    e.preventDefault();
    console.log(e.target);
    var id_ord = $(this).data("id");
    $.ajax({
        url:'ajax-duyetdon/delete-order.php',
        type:'POST',
        data:{id:id_ord},
        success: function(res){
            render();
        }
    })
})

$(document).on("click", ".edit-ord", function (e) {
    e.preventDefault();
    var id_ord = $(this).data("id");
    $.ajax({
        url:'ajax-duyetdon/get-detail-order.php',
        type:'POST',
        dataType: "json",
        data:{order_id:id_ord},
        success: function(res){
            let order = res.data;
            $("#order_id_form_edit").val(id_ord);
            $("#employer_id_form_edit").val(order.employer_fullname);
            $('#trangthaiduyet_form_edit option[value="'+order.trangthaiduyet+'"]').prop('selected', true);
            $('#trangthaithanhtoan_form_edit option[value="'+order.trangthaithanhtoan+'"]').prop('selected', true);
            $("#total_form_edit").val(order.total);
            $("#appointment_form_edit").val(order.appointment);
        }
    })
})

$(document).on("click", "#updateOrder", function (e) {
    e.preventDefault();

    let id = $("#order_id_form_edit").val();
    let trangthaithanhtoan = $("#trangthaithanhtoan_form_edit").val();
    let trangthaiduyet = $("#trangthaiduyet_form_edit").val();
    let total = $("#total_form_edit").val();
    let appointment = $("#appointment_form_edit").val();
    console.log(id, trangthaiduyet, trangthaithanhtoan, total,appointment);
    $.ajax({
        url:'ajax-duyetdon/update-order.php',
        type:'POST',
        dataType: "json",
        data:{id:id, trangthaiduyet: trangthaiduyet, trangthaithanhtoan: trangthaithanhtoan, total:total, appointment:appointment},
        success: function(res){
            $('#orderModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            render();
        }
    })
})

$('#duyetdon').click(()=>{
    ids = []
    $('.flexCheckDefault:checked').get().forEach(element => {
        if ($('#trangthaiduyet'+element.value+' span').html() == 'Dang cho')
        ids.push(element.value)
    })
    $.post('ajax-duyetdon/duyetdon.php',
        {
            ids: ids,

        }

    , function(){
        ids.forEach(id=>{
            $('#trangthaiduyet'+id).html('<span class="text-success" style="font-weight: bolder;">Da duyet</span>')
        })
    },'json')
})
$('#duyetthanhtoan').click(()=>{
    ids = []
    $('.flexCheckDefault:checked').get().forEach(element => {
        if ($('#trangthaithanhtoan'+element.value+' span').html() == 'Chua thanh toan')
        ids.push(element.value)
    })
    $.post('ajax-duyetdon/duyetthanhtoan.php',
        {
            ids: ids,

        }

    , function(){
        ids.forEach(id=>{
            $('#trangthaithanhtoan'+id).html('<span class="text-success" style="font-weight: bolder;">Da thanh toan</span>')
        })
    },'json')
})
$('#huydon').click(()=>{
    ids = []
    $('.flexCheckDefault:checked').get().forEach(element => {
        if ($('#trangthaiduyet'+element.value+' span').html() == 'Dang cho')
        ids.push(element.value)
    })
    $.post('ajax-duyetdon/huydon.php',
        {
            ids: ids,

        }

    , function(){
        ids.forEach(id=>{
            $('#trangthaiduyet'+id).html('<span class="text-danger" style="font-weight: bolder;"> Da huy</span>')
        })
    },'json')
})
$('#trangthaigiaodich').change(()=> {
    render()
})
$('#nhanvienphutrach').change(()=> {
    render()
})
$('#ngay-tao').change(()=> {
    render()
})
$('#form1').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        render()
    }
});
function show(id) {
    $.post('ajax-duyetdon/get-detail-order.php',
    {
            order_id: id,
    }, function (res) {
        console.log(res)
        list=''
        res.data.detail.forEach(detail => {
            list +=  '<tr >'
                +'<td>'+detail.product_id+'</td>'
                +'<td>'+detail.product_name+'</td>'
                +'<td>'+detail.quantity+'</td>'
                +'<td>'+detail.unit+'</span></td>'
                +'<td ">'+detail.price+'</td>'
                +'<td>'+(Number(detail.quantity) * Number(detail.price))+'</td>'
                +'</tr>'
        })
        $('#chitietdonhang').html(list)
        $('#employer_fullname1').html(res.data.employer_fullname)
        $('#employer_address1').html(res.data.address)
        $('#employer_phone1').html(res.data.phone)
        $('#user_fullname1').html(res.data.fullname)
        $('#appointment1').html(res.data.appointment)
        $('#total1').html(res.data.total)
    },'json'
    )
    $('#myModal').modal('show');
}
function chuyenpage(page){
    if (page< -1) page = -1;
    if (page > total_page) page = total_page
    active = Number($('.active-page').eq(0).html())
    if (page == 0){
        page=(active<total_page)? active+1:total_page
    } else if (page==-1) {
        page=(active>1)? active-1:1
    }
        $('.page-item').eq(active-1).removeClass('active')
        $('.page-item').eq(active-1).removeClass('active-page')
        $('.page-item').eq(page-1).addClass('active')
        $('.page-item').eq(page-1).addClass('active-page')
        render()
}
$('#selec-display').change(()=>{
    render()
}
)