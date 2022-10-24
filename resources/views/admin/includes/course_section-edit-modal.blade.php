<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-course_section/"+pid,
         success: function (response) {
            $('#edit-course_section-id').val(pid)
            $('#course_section-edit').val(response.course_sections.course_sections)
         }
     });
    });
});
 
</script>