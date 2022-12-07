<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#inputSearch').on('keyup', function(){
        $inputSearch = $(this).val();
        if ($inputSearch == '') {
            alert('no data found')
        }else{
            $.ajax({
                method:"post",
                url:'/candidates-search',
                data:JSON.stringify({
                    inputSearch:$inputSearch
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success: function(data){
                // console.log(data);
                    var searchResultAjax='';
                    d = JSON.parse(data);
                    if(d)
                    {
                        $('#voters_id').val(d[0].id)
                        $('#firstname').val(d[0].fname)
                        $('#lastname').val(d[0].lname)
                        $('#department').val(d[0].departments)
                        $('#college').val(d[0].colleges)
                        $('#department_id').val(d[0].department_id)
                        $('#college_id').val(d[0].college_id)
                        $('.otherInputs').show();
                        console.log(d);
                    }
  
                }
            })
        }
    })
</script>
