@if (session('save'))           
    <script>
        Command: toastr["success"]("Partylist added successfully", "Added")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('delete'))           
    <script>
        Command: toastr["error"]("Partylist Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('update'))           
    <script>
        Command: toastr["success"]("Partylist Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('deleteAll'))           
    <script>
        Command: toastr["error"]("Partylists Deleted successfully", "Deleted")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif