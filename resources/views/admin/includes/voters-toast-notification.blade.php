@if (session('save'))           
    <script>
        Command: toastr["success"]("Voter added successfully", "Added")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('delete'))           
    <script>
        Command: toastr["error"]("Voter Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('update'))           
    <script>
        Command: toastr["success"]("Voter Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('deleteAll'))           
    <script>
        Command: toastr["error"]("Voters Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif