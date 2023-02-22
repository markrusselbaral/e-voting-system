@if (session('save'))           
    <script>
        Command: toastr["success"]("User added successfully", "Added")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('delete'))           
    <script>
        Command: toastr["error"]("User Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('update'))           
    <script>
        Command: toastr["success"]("User Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('deleteAll'))           
    <script>
        Command: toastr["error"]("Users Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif