<?php
include './adminMenu.php';
?>

<script>
    function msgSelect(id){
            $(document).ready(function () {
                $.post("selectMsg.php" , {id: id} , function(data){
                    $(".message_content").html(data);
                    listMsgNews();
                    listMsgOlds();
                });
        });
    }
 
    function listMsgNews(){
        $(document).ready(function () {
                $.post("showMSG.php" , {q: 0} , function(data){
                    $("#news").html(data);
                });
        });
    }
    
    function listMsgOlds(){
        $(document).ready(function () {
                $.post("showMSG.php" , {q: 1} , function(data){
                    $("#olds").html(data);
                });
        });
    }
    
    
    function deleteMsg(id){
        $(document).ready(function () {
                $.post("deleteMsg.php" , {id: id} , function(){
                    listMsgNews();
                    listMsgOlds();
                });
        });
    }
    
    
    
   
</script>

<div id="extra" class="container">
    <table>
        <td>
          <div class="msg_menu">
        <label id="title">News</label><br>
            <script>listMsgNews();</script>
            <div id="news"></div>
        <label id="title">Olds</label><br> 
            <script>listMsgOlds();</script>
            <div id="olds"></div>
          </div>   
        </td>
        <td>
        <div class="message_content">    
        </div>
        </td>
    </table>
</div>



<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>

<?php
// put your code here
?>
</body>
</html>