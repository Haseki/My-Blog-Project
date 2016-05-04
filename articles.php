<!DOCTYPE html>
<?php 
include './normalMenu.php';
?>

<script>


    function list_articles(){
            $(document).ready(function () {
               $.get( "listArt.php", function( data ) {
                    $("#list").html(data);
                    });
        });
    }


</script>

<div id="list"><script>list_articles();</script></div>

<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>

<?php
// put your code here
?>
</body>
</html>
