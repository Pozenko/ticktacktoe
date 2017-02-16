$(document).ready(function () {
    var startBtn = $('#startBtn');
    var userName = $('#userName');
    var waiting = $('#waitingDiv');
    var cells = $('.cellGame');
    var postData = {
        "player":"",
        "isPlayer": "",
        "gameId":0,
        "error": ""
    };
    var postGame = {
        "id": "",
        "player": ""
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
                    if(postData['isPlayer'] == ""){
                        checkPlayer2();
                    }
                    else{
                        waiting.text("Player " + json.isPlayer + " connected!");
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
    cells.on('click', function () {
       if(postData['isPlayer'] != ""){
           postGame['player'] = postData['player'];
           $.ajax({
               type: 'POST',
               url: "/php/Game.php",
               dataType: 'json',
               data: {gameData: postGame},
               success: function (json) {
                   console.log('Success');
               }
           });
       }
    });
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
