
$(function (){
   $(document).on('click', '.action_vote', actionVote);
});

function actionVote(event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlRequest,
        success: function (data) {
            if (data.code === 200) {
                console.log('success');
                $("#total-rate").text(data.totalRate);
            }
        },
        error: function (data){
            if (data.code === 500) {
                console.log('failed');
            }
        }
    });
}


