<?php
include './adminMenu.php';

$title = $sum = $content = "";
$titleErr = $sumErr = $contentErr = "";
$id = intval($_GET['id']);

$result = selectDBforAdmin("*", "articles", "id = $id");

if ($result) {
    $d_title = $result['title'];
    $d_sum = $result['summary'];
    $d_cont = $result['content'];
    $d_src = $result['img_dir'];
} else {
    echo'NOPE!';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["content"])) {
        $contentErr = "Content is required";
    } else {
        $content = test_input($_POST["content"]);
    }

    if (empty($_POST["summary"])) {
        $sumErr = "Summary is empty";
        $sum = substr($content, 0, 500);
    } else {
        $sum = test_input($_POST["summary"]);
    }

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        $isFileSet=false;
        
        if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['upfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES['upfile']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }


        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.

        $date = date('m-d-Y-h-i-s-a', time());
        $fname = $date . "_" . $_FILES['upfile']['name'];
        $ftmp_name = $_FILES['upfile']['tmp_name'];
        if (!move_uploaded_file(
                        $_FILES['upfile']['tmp_name'], "./uploads/" . $fname)
                        
        ) {
            throw new RuntimeException('Warning! No image uploaded');
        }

        $isFileSet = true;
        $file_dir = "./uploads/" . $fname;
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
    
    $result2="";
    
    if($isFileSet){
        $result2 = updateDB("articles", "title = \"$title\", summary = \"$sum\", content = \"$content\", img_name = \"$fname\", img_dir = \"$file_dir\"", "id = $id");
    }
    else
    {
        $result2 = updateDB("articles", "title = \"$title\", summary = \"$sum\", content = \"$content\"", "id = $id");
    }

    if (!$result2) {
        echo 'Nope';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<script>
     function changeImg(){
        $(document).ready(function () {
               
                    $("#change-btn").hide();
                    $("#image_panel").hide();
                    $("#file-btn").show();
        });
    }

</script>


<table>
    <td>
    <div class="article_left_img" id="image_panel" style="margin-top:0px;"><img class = "abm_image" src="<?php echo $d_src; ?>"></img></div>
</td>
<td>
<div class="article_blue_form_2">
    <form method="POST" action="<?php echo './adminArticlesEdit.php?id='.$id; ?>" enctype="multipart/form-data">
        <br><br>
        <div class="article_text_field">
            <input type="text" name="title" value="<?php echo $d_title; ?>" class="art_title_form"></input>
            <label></label>
            <br>
            <textarea cols="60" rows="20" name="summary" class="art_textfield_form_small" ><?php echo $d_sum; ?></textarea>
            <br>
            <textarea cols="60" rows="20" name="content" class="art_textfield_form" ><?php echo $d_cont; ?></textarea>
            <br>
            <input id="file-btn" class="art_button" type="file" name="upfile" style="display:none;">
                <input type="button" id="change-btn" class="art_button" value="Change Image" onclick ="changeImg();"/>
            <br>
                <input type="submit" name="submit" value="Save Article" class="art_button"></input><br>
        </div>
    </form> 
</div>
</td>
</table>






                <div id="copyright" class="container">
                    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
                </div>

                </body>
                </html>