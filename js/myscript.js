$(document).ready(function(){
    console.log('Hello js ');
    $('#fetchval').on('change',function(event){
        event.preventDefault();
        var value = $(this).val();
        //  alert(value);
        //  console.log('Hello ');
        $.ajax({
            url:"fetch.php",
            type:"POST",
            data:{value:value},
            success:function(response){
                
                let data = JSON.parse(response);
                t_row=$('#filter_row')

                let show='';
            
                for(let i = 0; i < data.length;i++){

                    show +=
                    `<form class='col-lg-3 col-md-6 col-sm-6 ' action='Insertcart.php' method='post'>
                    <div class='product__item'>
                    <div class='product__item__pic set-bg' data-setbg='admin/uploads/${data[i].image}'>
                    <img src='admin/uploads/${data[i].image}' class='img-fluid product__item__pic set-bg'/>
                    <div class='product__label'>
                    <span>${data[i].name}</span>
                    </div>
                    </div>

                    <div class='product__item__text'>

                    <input type='hidden' name='Pname' value="${data[i].name}">
                    <input type='hidden' name='Pindex' value="${data[i].id}">
                    <input type='hidden' name='Pprice' value="${data[i].price}">

                    <h6> <a href='#'>${data[i].name}</a><br>
                        <input type='number' size='2' name='Pquantity' min='1' class='mt-3' value='1' max='20' style='cursor:pointer;caret-color:transparent' onkeydown='return false;'> </h6>
                    <div class='product__item__price'>${data[i].price}</div>
                     
                    <button type='submit' class='btn w-50' name='addCart' style='background-color:#f08632' >Add to cart</button>
                
                    </div>
                    </div>
                    </form>`
                }
                t_row.html(show);
            }
        })
    })
   })


   