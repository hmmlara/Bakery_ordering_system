$('#tbody').on('click','.delete',function(){
    let id=$(this).closest('td').attr('id');
    let tr=$(this).closest('td');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          }),
           $.ajax({
            url:'delete_products.php',
            type:'post',
            data:{id:id},
            success:function(response){
                console.log(response);
               
            },
            error:function(){

            }
        })
        tr.closest('tr').fadeOut();;
        } else {
          swal("Your imaginary file is safe!");
        }
      });
  
})


$('#tbody').on('click','.deletebtn',function(){
    let id=$(this).closest('td').attr('id');
    let tr=$(this).closest('td');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Sure? ! Your imaginary file has been deleted!", {
            
            icon: "success",
            
          }),
          $.ajax({
            url:'delete_categories.php',
            type:'post',
            data:{id:id},
            success:function(response){
              // alert(response)
                if(response==1)
                {
                      tr.closest('tr').fadeOut();
                }else
                {
                 
                  swal("You Can't Delete!", "...This categories have Products!");
                }
               
            },
            error:function(){

            }
        });
        } else {
          swal("Your imaginary file is safe!");
        }
      });

  

})