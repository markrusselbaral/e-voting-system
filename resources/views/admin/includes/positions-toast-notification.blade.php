@if (session('save'))           
    <script>
        Command: toastr["success"]("Position added successfully", "Added")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('delete'))           
    <script>
        Command: toastr["error"]("Position Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('update'))           
    <script>
        Command: toastr["success"]("Position Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('deleteAll'))           
    <script>
        Command: toastr["error"]("Positions Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif