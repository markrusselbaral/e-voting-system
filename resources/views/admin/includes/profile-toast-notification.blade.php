@if (session('Profile Successfully Updated'))           
    <script>
        Command: toastr["success"]("Profile Successfully Updated", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('Incorrect Password'))           
    <script>
        Command: toastr["success"]("Incorrect Password", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif


