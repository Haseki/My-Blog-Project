<?php
include './adminMenu.php';
?>


<script>
function crtProfession(){
    window.location = "./createProfession.php";
}

function crtProject(){
    window.location = "./createProject.php";
}

function listProfessionsAdm(){
            $(document).ready(function () {
               $.get( "listProfessionsADM.php", function( data ) {
                    $("#list1").html(data);
                    });
        });
    }
    
    function listProjectsAdm(){
            $(document).ready(function () {
               $.get( "listProjectsADM.php", function( data ) {
                    $("#list2").html(data);
                    });
        });
    }
    
    function deleteProfession(id) {
                $(document).ready(function () {
                $.post("professionsDeletePage.php" , {id: id} , function(){
                listProfessionsAdm();
                });
        });
    }
    
    function deleteProject(id) {
               $(document).ready(function () {
                $.post("projectDeletePage.php" , {id: id} , function(){
                listProjectsAdm();
                });
        });
    }
    
    function editProfession(id) {
        window.location = "./professionEditPage.php?id="+id;
    }
    
    function editProject(id) {
        window.location = "./projectEditPage.php?id="+id;
        listProfessionsAdm();
        listProjectsAdm();
    }
    
    
    
</script>


<div class="abm_c_head" style="margin: auto auto;">
    <div    class="abm_textarea_white">
        <label id="title">Career Edit Page</label>
        <button class="art_button" onclick="crtProfession();">CREATE PROFESSION</button>
        <button class="art_button" onclick="crtProject();">CREATE PROJECT</button>
    </div>
</div>
<script>listProfessionsAdm();
        listProjectsAdm();
</script>
<div class="abm_sub_title">Professions</div>1
<div id = "list1"></div>
<div class="abm_sub_title">Projects</div>
<div id = "list2"></div>

<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>

<?php
// put your code here
?>
</body>
</html>