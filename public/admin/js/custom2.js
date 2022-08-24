$(document)
.ready(function(){
    $("#section_id").change(function(){
        var section_id =$(this).val();
        alert(section_id);
        });
})