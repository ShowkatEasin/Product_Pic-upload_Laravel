
jQuery(document).ready(function(){
    
  jQuery(".save").click(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var name =jQuery(".name").val();
    var des =jQuery(".des").val();
    var status =jQuery(".status").val();
    $.ajax({
      url:"/addcategory",
      type:"POST",
      data:{
        'name':name,
        'des':des,
        'status':status
      },
      success:function(response){
        show();
        alert(response.status);
      }
    })
  });
  show();
  function show(){
    $.ajax({
      url:"/showcategory",
      type:"GET",
      success:function(response){
        var tdata = "";
        var sl=1;
        $.each(response.data, function(key, value){
          if(value.status == 1){
            var status='<button class="btn btn-warning btn-sm active" value="'+value.id+'">Active</button>';
          }
          else{
            var status='<button class="btn btn-secondary btn-sm inactive" value="'+value.id+'">Inactive</button>';
          }
          tdata +='<tr>\
          <td>'+sl+'</td>\
          <td>'+value.name+'</td>\
          <td>'+value.des+'</td>\
          <td>'+status+'</td>\
          <td>\
          <button class="btn btn-danger btn-sm delete" value="'+value.id+'">Delete</button>\
          <button class="btn btn-info btn-sm edit" value="'+value.id+'">Edit</button>\
          </td>\
          </tr>';
          sl++;
        })
        jQuery(".tdata").html(tdata);
      }
    })
  }
  jQuery(document).on("click",".delete",function(){
    var id = jQuery(this).val();
    jQuery("#delete").modal("show");
    jQuery(".mdelete").val(id);
  });

  jQuery(document).on("click",".mdelete",function(){
    var id =jQuery(this).val();
     $.ajax({
      url:"/deletecategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == '404'){
          alert("Data Not Found");
        }
        else if(response.status == '200'){
          alert("Data Deleted");
          jQuery("#delete").modal("hide");
          show();
        }
      }
    })
  });
  jQuery(document).on("click",".edit",function(){
    
    jQuery("#add").modal("show");
    var id = jQuery(this).val();
    $.ajax({
      url:"/editcategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == "200"){
          jQuery("#name").val(response.data.name);
          jQuery("#des").val(response.data.des);
          jQuery("#status").val(response.data.status);
          jQuery("#save").hide();
          jQuery("#update").show();
          jQuery("#update").val(response.data.id);
        }
      }
    })
  });
  jQuery(document).on("click","#update",function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    var id = jQuery(this).val();
    var name =jQuery("#name").val();
    var des =jQuery("#des").val();
    var status =jQuery("#status").val();
    $.ajax({
      url:"/updatecategory/"+id,
      type:"POST",
      data:{
        'name':name,
        'des':des,
        'status':status
      },
      success:function(response){
        if(response.status == "200"){
          show();
          alert("Data Updated");
          jQuery("#update").hide();
          jQuery("#save").show();
          jQuery("#name").val("");
          jQuery("#des").val("");
          jQuery("#status").val(1);
          jQuery("#add").modal("hide")
        }
        else{
          alert("Data Not Found")
        }
      }
    })
  });
  jQuery(document).on("click",".active",function(){
    var id =jQuery(this).val();
    $.ajax({
      url:"/activecategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == "200"){
          alert("Category Inactived");
          show();
        }
      }
    })
  })
  jQuery(document).on("click",".inactive",function(){
    var id =jQuery(this).val();
    $.ajax({
      url:"/inactivecategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == "200"){
          alert("Category Actived");
          show();
        }
      }
    });
  });

  jQuery(document).on("click","#save",function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var name =jQuery("#name").val();
    var des =jQuery("#des").val();
    var status =jQuery("#status").val();
    $.ajax({
      url:"/addcategory",
      type:"POST",
      data:{
        'name':name,
        'des':des,
        'status':status
      },
      success:function(response){
        show();
        alert(response.status);
        jQuery("#add").modal("hide");
      }
    })
  });





});