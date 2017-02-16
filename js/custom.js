$(document).ready(function () {
    var startBtn = $('#startBtn');
    var userName = $('#userName');
    var waiting = $('#waitingDiv');
    var cells = $('.cellGame');
    var postData = {
        "player":"",
        "isPlayer": "",
        "gameId":0,
        "place": "",
        "error": ""
    };
    var postGame = {
        "id": "",
        "gameId": 0,
        "place": "",
        "status": "",
        "error": ""
    };
    var postAnswer = {
        "id": "",
        "position": "",
        "status": "",
        "gameId": 0
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
                if(json.error == ""){
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
                else{
                    console.log(json.error);
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
                if(json.error == ""){
                    if(json.isPlayer == ""){
                        setTimeout(checkPlayer2,5000);
                    }
                    else{
                        waiting.text("Player " + json.isPlayer + " connected!");
                    }
                    postData['isPlayer'] = json.isPlayer;
                }
                else{
                    console.log(json.error);
                }
            }
        });
    }
    cells.on('click', function (event) {
       if(postData['isPlayer'] != ""){
           postGame['gameId'] = postData['gameId'];
           postGame['place'] = postData['place'];
           postGame['id'] = event.target.id;
           $.ajax({
               type: 'POST',
               url: "/php/Game.php",
               dataType: 'json',
               data: {gameData: postGame},
               success: function (json) {
                   if(json.error == "" && json.status == "success"){
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
        postAnswer['gameId'] = postData['gameId'];
        postAnswer['id'] = postGame['id'];
        $.ajax({
            type: 'POST',
            url: "/php/CheckAnswer.php",
            dataType: 'json',
            data: {answerData: postAnswer},
            success: function (json) {
                if(json.status == ""){
                    setTimeout(checkAnswer, 2000);

                }
                else if(postData['place'] == "first"){

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
