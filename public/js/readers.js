
  $(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $('#sub_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:$(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType:false,  
                beforeSend: function(){
      
                },
                success: function(response){
                    console.log(response);
                    if(response.status == 1){
                      $('#sub_success').show();
                    }else{
                      $('#EmailErrMsg').text(response.error.email);
                    }
                },
                error: function(response){
                    console.log(response);
                }
            });
        });
      
  });

  
function checkDelete(){
    return confirm('Are you sure you want to Delete?');
}