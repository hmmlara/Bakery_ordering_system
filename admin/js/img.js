function file_changed(){
    var selectedFile=document.getElementById('photo').files[0];
    var img=document.getElementById('img');
    var reader=new FileReader();
    reader.onload=function(){
        img.src=this.result;
    }
    reader.readAsDataURL(selectedFile);
}
