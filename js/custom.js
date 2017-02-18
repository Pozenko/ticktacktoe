$(document).ready(function () {
    var startBtn = $('#startBtn');
    var userName = $('#userName');
    var waiting = $('#waitingDiv');
    var cells = $('.cellGame');
    var checkPlayerInterval = 5000;
    var checkAnswerInterval = 1000;
    var postData = {
        "player":"",
        "isPlayer": "",
        "gameId":0,
        "id": "",
        "place": "",
        "position": "",
        "status": ""
    };
    startBtn.on('click',function(){
        startBtn.hide();
        waiting.show();
        userName.prop('disabled', true);
        postData['player'] = $('#userName').val();
        $.ajax({
            type: 'POST',
            url: "/php/AddPlayer.php",
            dataType: 'json',
            data: {playerData: postData},
            success: function (json) {
                if(json.status == "success"){
                    postData['isPlayer'] = json.isPlayer;
                    postData['gameId'] = json.gameId;
                    postData['place'] = json.place;
                    if(postData['isPlayer'] == ""){
                        checkPlayer2();
                    }
                    else{
                        waiting.text("Player " + json.isPlayer + " connected!");
                        if(postData['place'] == "second"){
                            checkAnswer();
                        }
                    }
                    console.log("Success");
                }
            }
        });
    });
    function checkPlayer2() {
        $.ajax({
            type: 'POST',
            url: "/php/CheckPlayer.php",
            dataType: 'json',
            data: {playerData: postData},
            success: function (json) {
                if(json.isPlayer == ""){
                    setTimeout(checkPlayer2,checkPlayerInterval);
                }
                else{
                    waiting.text("Player " + json.isPlayer + " connected!");
                    postData['isPlayer'] = json.isPlayer;
                }
            }
        });
    }
    cells.on('click', function (event) {
       if(postData['isPlayer'] != ""){
           postData['id'] = event.target.id;
           $.ajax({
               type: 'POST',
               url: "/php/Game.php",
               dataType: 'json',
               data: {gameData: postData},
               success: function (json) {
                   if(json.status == "success"){
                       console.log('Success');
                       if(json.place == "first"){
                           $('#'+json.id).text("X");
                       }
                       else{
                           $('#'+json.id).text("O");
                       }
                       checkAnswer();
                   }
               }
           });
       }
    });
    function checkAnswer() {
        $.ajax({
            type: 'POST',
            url: "/php/CheckAnswer.php",
            dataType: 'json',
            data: {answerData: postData},
            success: function (json) {
                if(json.status == ""){
                    setTimeout(checkAnswer, checkAnswerInterval);
                }
                else if(json.place == "first"){

                    $('#'+json.position).text("O");
                }
                else{
                    $('#'+json.position).text("X");
                }
            }
        });
    }
    startBtn.prop('disabled',true);
    userName.on('keyup',function(){
        if($(this).val().length !=0){
            startBtn.prop('disabled', false);
        }
        else{
            startBtn.prop('disabled',true);
        }
    });
    userName.on('input', function () {
        var regexp = /[^a-zA-Z1-9]/g;
        if($(this).val().match(regexp)){
            $(this).val( $(this).val().replace(regexp,'') );
        }
    });
});
