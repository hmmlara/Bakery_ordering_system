let addtocart=document.querySelectorAll('.cart');

session_start();

    if(!isset($_SESSION['user']))
    {
        for(let i=0;i<addtocart.length;i++){
            console.log(addtocart[i]);
            addtocart[i].onclick = function(){
                window.location.replace("http://localhost/Bakery/user_signup_form.php");
            }
        }

    }
    if(isset($_SESSION['user'])) 
    {
        addtocart[i].onclick = function(){
            window.location.replace("http://localhost/Bakery/shop.php");
        }
        exit();
    }
