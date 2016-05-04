<!DOCTYPE html>
<?php 
include './normalMenu.php';
?>

<script>
    function listProfessions(){
            $(document).ready(function () {
               $.get( "listProfessions.php", function( data ) {
                    $("#list1").html(data);
                    });
        });
    }
    
    function listProjects(){
            $(document).ready(function () {
               $.get( "listProjects.php", function( data ) {
                    $("#list2").html(data);
                    });
        });
    }
    
    

</script>

<div class="abm_c_head">
    <table>
        <td><div    class="abm_logo_me"></div></td>
        <td>
    <div    class="abm_textarea_white">
        <label id="title">Hakan Oğuz Vural</label>
        <p id="text">Computer Engineer Student at Yıldız Technical University <br>
                     hakanovural@gmail.com | +90 (506) 456 02 37
        </p>
        <label id="text">CV <a class="cv" href="./pdfCreator.php">Here...</a></label>
    </div>
    </td>
    </table>
</div>
<script>listProfessions()</script>
<script>listProjects()</script>
<div class="abm_sub_title">Professions</div>
<div id= "list1"></div>

<!--Burada özelliklerim yer alacak. Bildiğim dilleri ve programları burada anlatacağım.-->
<div class="abm_sub_title">Projects</div>
<div id= "list2"></div>



<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>
</body>
</html>
