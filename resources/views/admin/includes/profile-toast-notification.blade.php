@if (session('Profile Successfully Updated'))           
    <script>
        Command: toastr["success"]("Profile Successfully Updated", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif



@if (session('Password Successfully Updated'))           
    <script>
        Command: toastr["success"]("Password Successfully Updated", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif

@if (session('Invalid Password'))           
    <script>
        Command: toastr["error"]("Invalid Password", "Error")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif


