
@if (session('update'))           
    <script>
        Command: toastr["success"]("Title Updated Successfully", "Updated")
        toastr.options = {
            "closeButton": true,
        }
    </script>
@endif