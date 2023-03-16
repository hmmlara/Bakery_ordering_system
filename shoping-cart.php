<?php
   include_once "layout/header.php"; 
   include_once "controller/product_controller.php";
   include_once "controller/promotion_controller.php";
   $productController=new ProductController();
   $promotionController=new PromotionController();
   $promotion_rate=$promotionController->today_promotion();
   //echo ( $promotion_rate['percentage']);

    // echo "<pre>";
    // var_dump ($_SESSION['cart']);
    // echo "</pre>";
        
?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping Card</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>  Shop </span>
                            
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Breadcrumb End -->



<?php
if(count($_SESSION['cart'])==0)
{
    echo '<section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <img src="img/empty.png" width="100%" height="350px">
                    </div>
                </div>
            </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="continue__btn">
                        <a href="shop.php" class="mt-3">Continue Shopping</a>
                    </div>
                </div>
        </div>
    </section>'  ;  
}
else
{
    
?>

<section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table class="">
                            <thead class="">
                                <tr>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>UnitPrice</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_SESSION['cart']))
                                {                                    
                                    //$sum=0;
                                    foreach($_SESSION['cart'] as $value)
                                    {
                                        //$total=intval($value['productPrice'])*intval($value['productQty']);
                                        //$sum+=$value['productPrice'];
                                        
                                        $product_id=$value['productId'];
                                        //echo $product_id;
                                        $productController=new ProductController();
                                        $imgName=$productController->getProductImage($product_id);
                                        //echo "img_name".$imgName['image'];

                                        echo' 
                                            <form action="Insertcart.php" method="post">  
                                                <tr>

                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__pic">                                                        
                                                        <img src="admin/uploads/'.$imgName['image'].'" alt="" width="110px">
                                                        <input type="hidden" value="'.$value['productId'].'" name="Pindex" >
                                                    </div>
                                                </td>

                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h6><input type="hidden" value="'.$value['productName'].'" name="Pname">'.$value['productName'].'</h6>
                                                        <h5></h5>
                                                    </div>
                                                </td>

                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        <div class="">
                                                            <input type="number" value="'.$value['productQty'].'" min="1" max="20" name="Pquantity" class="item_quantity" id="'.$value['productId'].'" onchange="subTotal()" style="cursor:pointer;caret-color:transparent" onkeydown="return false;">
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                <td class="quantity__item">
                                                    <h5><input type="hidden" value="'.$value['productPrice'].'" name="Pprice" class="unit_price">'.$value['productPrice'].'</h5>
                                                </td>

                                                <td class="sub_total">
                                                    
                                                </td>

                                                <td>
                                                </td>

                                                <td class="cart__close">
                                                <button class="btn tb" name="remove"><span class="icon_close"></span></button>
                                                </td>                                                                                     
                                                
                                                <td><input type="hidden" name="item" value="'.$value['productId'].'"></td>

                                                </tr>
                                                
                                            </form>
                                            ';
                                    }
                                }
                                ?>
                                                <!-- <td class="cart__close">
                                                <button class="" name="update"><span class="">OK</span></button>
                                                </td> -->
                            </tbody>
                            
                        </table>                                      
                                
                            <tfoot>
                                <div class="cart__total">
                                    <h6>Cart total</h6>
                                    <ul>
                                        <li>Total <span id='final_total' class="total"></span></li>
                                        <li>Promotion (
                                            <b id="promo"> 
                                                <?php 
                                                if(isset($promotion_rate['percentage'])) 
                                                    { 
                                                        echo $promotion_rate['percentage'];
                                                    }
                                                    else 
                                                    {
                                                        $promotion_rate['percentage']=0; 
                                                        echo $promotion_rate['percentage'];
                                                    }
                                                ?>
                                            </b> %) <span id='percentage' class=""></span></li>

                                        <li>Total <span id='result_total'></span></li>
                                    </ul>
                                    <a href="checking_card.php" class="primary-btn">Proceed to checkout</a>
                                </div>
                            </tfoot>
                    </div>
                </div>
                    
            </div>

                <!-- <div class="col-lg-8 justify-content-center">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form> 
                    </div>-->
                    <!-- <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span id='final_total' class="total"></span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div> -->

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="continue__btn">
                        <a href="shop.php" class="mt-3">Continue Shopping</a>
                    </div>
                </div>

        </div>
    </section>

    <?php
    
}
    // echo '<pre>'; 
    //      var_dump($_SESSION['cart']);                                          
    // echo '</pre>';

    // echo '<pre>'; 
    //      var_dump($_SESSION['customize']);                                          
    // echo '</pre>';
?>


    <!-- Breadcrumb Begin -->
    <!-- <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <!-- <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>T-shirt Contrast Pocket</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 30.00</td>
                                    <td class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-2.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>Diagonal Textured Cap</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 32.50</td>
                                    <td class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-3.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>Basic Flowing Scarf</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 47.00</td>
                                    <td class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-4.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>Basic Flowing Scarf</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 30.00</td>
                                    <td class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Shopping Cart Section End -->
<?php
   include_once "layout/footer.php";

   
?>

<script>
    // let total=$('#total').val()+$('#unit_price').val();
    // console.log(total);

    let price=document.getElementsByClassName('unit_price');
    let quantity=document.getElementsByClassName('item_quantity');
    let total=document.getElementsByClassName('sub_total');
    let grand_total=document.getElementById('final_total');
    //console.log(grand_total);

    $('.item_quantity').change(function(){
    let id=this.id;
    let qty=this.value;
    console.log(id);
    console.log(qty);

    $.ajax({
                url:'update_session.php',
                type:'post',
                data:{id:id,qty:qty},
                success:function(response){
                    if(response=='fail')
                    {
                        console.log(response)
                        //console.log("hi")
                        //alert("You Can't Update!!")
                    }
                    else{
                        //alert("You Can Update!!")
                    }
                },
                error:function(){
                    
                }
            })

    });

    function subTotal()
    {
        var gt=0;
        for(let index=0;index<price.length;index++)
        {
            total[index].innerText=(price[index].value)*(quantity[index].value);
            gt+=(price[index].value)*(quantity[index].value);
        }
        grand_total.innerText=gt;

        let promo=document.getElementById('promo').innerText;
        console.log(promo);

        let discount=(grand_total.innerText*(promo/100));
        let percentage=document.getElementById('percentage');
        percentage.innerText=discount;        

        let total1=document.getElementById('result_total');
        total1.innerText=grand_total.innerText-discount;
        
    }
    subTotal();
    
</script>