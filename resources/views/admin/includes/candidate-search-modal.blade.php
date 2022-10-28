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
                    if(data)
                    {
                        $('#position').val(d[0].position)
                        $('#firstname').val(d[0].fname)
                        $('#lastname').val(d[0].lname)
                        $('#partylist').val(d[0].partylists)
                    }
  
                }
            })
        }
    })
</script>
