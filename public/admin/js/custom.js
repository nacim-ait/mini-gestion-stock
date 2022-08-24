

$(document).ready(function(){
  
 
    $("#section_id").change(function(){
        var section_id =$(this).val();
        $.ajax({
          headers: {
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          },
          type:get,
          url:'/admin/append-categories-level',
          data:{section_id:section_id},
          success:function(resp){
            alert(resp);
            $("#appendCategoriesLevel").html(resp);
          }

        })
        
              });

});
