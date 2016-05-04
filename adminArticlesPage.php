<?php
include './adminMenu.php';
?>

<script>
    
    function toCreate(){
        window.location="./adminArticlesCreate.php";
    }
    
    function list_articles(){
            $(document).ready(function () {
               $.get( "listArtAdm.php", function( data ) {
                    $("#list").html(data);
                    });
        });
    }


    function deleteArt(id){
        $(document).ready(function () {
                $.post("deleteArt.php" , {id: id} , function(){
                list_articles();
                });
        });
    }
    
</script>

<div class="abm_c_head">
    <div    class="abm_textarea_white">
        <label id="title">Articles Edit Page</label>
        <p id="text">To change or delete a article press Edit button near articles.
                     To create a new article press create button
        </p>
        <button class="art_button" onclick="toCreate();">CREATE!</button>
    </div>
</div>

<div class="abm_sub_title">Articles</div>

<div id="list"><script>list_articles();</script></div>

<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>

</body>
</html>