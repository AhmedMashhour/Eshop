function selectAll() {
    $("input[class='admins_check']:checkbox").each(function () {
        if($('input[class="selectAll"]:checkbox:checked').length==0)
        {
            $(this).prop('checked',false);
        }else
        {
            $(this).prop('checked',true);
        }
    });

}
function deleteAll_admin()
{
    $(document).on('click','#adminDelete_submit',function () {
       $('#admins_form').submit();
    });
    $(document).on('click','.delBtn',function () {
       $("#deleteAdmins").modal('show');
    });
}