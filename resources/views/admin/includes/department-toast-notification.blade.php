@if (session('save'))           
    <script>
        Command: toastr["success"]("Department added successfully", "Added")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('delete'))           
    <script>
        Command: toastr["error"]("Department Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('update'))           
    <script>
        Command: toastr["success"]("Department Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('deleteAll'))           
    <script>
        Command: toastr["error"]("Departments Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif