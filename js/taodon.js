var stt=1;
porduct_ids=[]
$('#form1').click((e)=>{
    e.stopPropagation()
    $('#search_form1').css("display","block");
    if ($('#form1').val() == '')
    {
        $('#search_form1').html('')
    }
})
$('#form1').keyup((e)=>{
    if ($('#form1').val()) {
        $.post('ajax-taodon/search-employer.php',
        {
            data:$('#form1').val(),
        }, function (res) {
            if (res.data.length) {
                list =''
                res.data.forEach(employer => {
                    list += '<li class="employer_item" id="employer_'+employer['employer_id']
                    +'" onclick="selected('+employer['employer_id']+')"><span id="employer_id'+employer['employer_id']+'" class="employer_id">ID:'
                    +employer['employer_id']+'</span><span id="employer_fullname'+employer['employer_id']+'" class="employer_fullname">'
                    +employer['fullname']+'</span><span id="employer_phone'+employer['employer_id']+'" class="employer_phone">'
                    +employer['phone']+'</span></li>'+'<span style="display:none" id="employer_address'+employer['employer_id']+'" class="employer_address">'
                    +employer['address']+'</span></li>'
                });
                $('#search_form1').html(list)
            }
            else $('#search_form1').html('<li class="employer_item">Khong ton tai khach hang thoa man</li>')
        },'json'
        )
    }

})
$(document).ready(()=>{
    $.post('ajax-taodon/get-list-admin.php',
    {
    }, function (res) {
        list = ''
        res.data.forEach(admin => {
            list += '<option value="'+admin.id+'">'+admin.fullname+'</option>'
        });
        $('#nhan-vien').html(list)
    },'json'
    )
})
$(document).click(()=>{
    $('#search_form1').css("display","none");
    $('#search_form2').css("display","none");
})
function selected (id) {
    $('#search_form1').css("display","none");
    $('#infor_employer_id').html(id)
    $('#infor_employer_fullname').html($('#employer_fullname'+id).html())
    $('#infor_employer_phone').html($('#employer_phone'+id).html())
    $('#infor_employer_address').html($('#employer_address'+id).html())
    $('#form1').val('')
}
function selected_pro (id) {
    $('#search_form2').css("display","none");
    item = '<tr class="item_product"><td>'+stt+'</td><td class="product_ids">'+id+'</td><td>'+$('#product_name'+id).html()+'</td><td>'+$('#product_unit'+id).html()+'</td><td class="numberic" id="soluong'+id+'"contenteditable="true" onclick="savesoluong('+id+')" onblur="validates('+$('#product_quantity'+id).html()+','+id+')">1</td><td id="dongia'+id+'">'+$('#product_price'+id).html().replace(/[^0-9]/g, '')+'</td><td id="thanhtien'+id+'">'+$('#product_price'+id).html().replace(/[^0-9]/g, '')+'</td></tr>'
    $('#list_product').append(item)
    stt +=1;
    total = Number($('#total').html())
    total += Number($('#product_price'+id).html().replace(/[^0-9]/g, ''));
    $('#total').html(total)
    porduct_ids.push(id)
    total = Number($('#total').html())
    phi = Number($('#phigiaohang').html())
    $('#thanhtien').html(total+phi)
    $('#form2').val('')
    // console.log($('#product_phone'+id).html())
    // $('#infor_product_id').html(id)
    // $('#infor_product_fullname').html($('#product_fullname'+id).html())
    // $('#infor_product_phone').html($('#product_phone'+id).html())
    // $('#infor_product_address').html($('#product_address'+id).html())
}
$('#form2').click((e)=>{
    e.stopPropagation()
    $('#search_form2').css("display","block");
    if ($('#form2').val() == '')
    {
        $('#search_form2').html('')
    }
})
$('#form2').keyup((e)=>{
    if ($('#form2').val()) {
        $.post('ajax-taodon/search-product.php',
        {
            data:$('#form2').val(),
        }, function (res) {
            console.log(res)
            if (res.data.length) {
                list =''
                res.data.forEach(product => {
                    list += '<li class="product_item" id="product_'+product['product_id']
                    +'" onclick="selected_pro('+product['product_id']+')"><span id="product_id'+product['product_id']+'" class="product_id">ID:'
                    +product['product_id']+'</span><span id="product_name'+product['product_id']+'" class="product_name">'
                    +product['product_name']+'</span><div class="price_quantity"><span id="product_price'+product['product_id']+'" class="product_price">Gia:'
                    +product['product_price']+'</span><span id="product_quantity_unit'+product['product_id']+'" class="product_quantity">Con:<span id="product_quantity'+product['product_id']+'" >'
                    +product['product_quantity']+'</span> <span id="product_unit'+product['product_id']+'">'+product['product_unit']+'</span></span></div></li>'
                });
                $('#search_form2').html(list)
            }
            else $('#search_form2').html('<li class="product_item">San pham khong ton tai</li>')
        },'json'
        )
    }

})
function validates(quantity, id) {
    value = $('#soluong'+id).html()
    soluong=value.replace(/[^0-9]/g, '')
    if (soluong> quantity) {
        alert('So luong khong duoc qua ' + quantity)
        soluong = quantity
    } else if (soluong < 1) {
        alert('So luong khong duoc nho hon 1')
        soluong = 1
    }
    $('#soluong'+id).html(soluong)
    $('#thanhtien'+id).html($('#dongia'+id).html()*soluong)
    total = Number($('#total').html())
    total -= Number(soluongtruockhiclick)*$('#dongia'+id).html()
    total+=($('#dongia'+id).html()*soluong)
    $('#total').html(total)
    total = Number($('#total').html())
    phi = Number($('#phigiaohang').html())
    $('#thanhtien').html(total+phi)
}
var soluongtruockhiclick = 0
function savesoluong(id) {
    soluongtruockhiclick = $('#soluong'+id).html()
}
function phigiaohang (){
    if($('#chinhanh').val()==2) {
        $('#phigiaohang').html(20000)
    } else if($('#chinhanh').val()==3) {
        $('#phigiaohang').html(15000)

    } else $('#phigiaohang').html(30000)
    total = Number($('#total').html())
    phi = Number($('#phigiaohang').html())
    $('#thanhtien').html(total+phi)
}
function taodon(){
    var options = {};
    options['user_id'] = $('#nhan-vien').val()
    options['employer_id'] = $('#infor_employer_id').html()
    options['appointment'] = $('#ngay-hen-giao').val()
    options['phuongthucthanhtoan'] =  $('#hinhthucthanhtoan').val()
    options['hinhthucvanchuyen'] = $('#hinhthucvanchuyen').val()
    options['chinhanh'] = $('#chinhanh').val()
    options['trangthaithanhtoan'] = $('input[name="flexRadioDefault"]:checked').val()
    options['product'] = {}
    options['total'] = $('#thanhtien').html()
    $('.item_product').get().forEach(function(entry, index) {
        id = $('.product_ids').eq(index).html()
        quantity = $('.numberic').eq(index).html()
        options['product'][index]= {}
        options['product'][index]['product_id'] = id
        options['product'][index]['quantity'] = quantity

    });
    if (!options['employer_id']) {
        alert('Vui long chon khach hang thanh toan')
    } else if (!options['product'][0]) {
        alert('Don hang chua co san pham')
    } else if(!options['appointment'] ){
        alert('Vui long chon ngay hen tra')
    }else (
        $.post('ajax-taodon/taodon.php',
        {
            data: JSON.stringify(options)
        }, function (res) {
        window.location = 'home.php?page=duyet-don-hang';
        },'json'
        )
    )
}