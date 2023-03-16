$('#delete_baker').on('click','.delete',function () {

   
        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr("id");

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
                url:'delete_baker.php',
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

});

$('#delete_promotions').on('click','.delete', function () {
    //alert('Hello');
    let message = confirm('Are you sure to delete');
    if (message) {
        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr("id");
        $.ajax({
            url: 'delete_promotion.php',
            type: 'post',
            data: { id: id },
            success: function(response){
                // console.log(response)
                window.location.href = 'promotions.php'
            },
            error: function () {

            }
        })
        tr.closest('tr').fadeOut();
    }
});

$('#delete_size').on('click','.delete',function (){

        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr("id");

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
                url:'delete_size.php',
                type:'post',
                data:{id:id},
                success:function(response){
                    console.log(response);
                   
                },
                error:function(){
    
                }
            })
            tr.closest('tr').fadeOut();
            } else {
              swal("Your imaginary file is safe!");
            }
          });

});

$('#delete_cream').on('click','.delete',function () {

        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr('id');

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
                url:'delete_cream.php',
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
});

$('#delete_doll').on('click','.delete',function () {
  
        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr('id');

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
                url:'delete_doll.php',
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
});

//
$('#delete_feedback').on('click', '.deletebtn',function () 
    {
        let tr = $(this).closest('td');
        let id = $(this).closest('td').attr('id');
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
                url:'delete_feedback.php',
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
    
});