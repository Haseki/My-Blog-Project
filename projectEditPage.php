<?php
include './adminMenu.php';


$title = $sum = $link =  "";
$titleErr = $sumErr = $contentErr = $linkErr = "";
$isFileSet = false;
$id = intval($_GET['id']);

$result = selectDBforAdmin("*", "projects", "id = $id");

$title = $result['title'];
$sum = $result['summary'];
$link = $result['link'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title= test_input($_POST["title"]);
    }
    
    if (empty($_POST["summary"])) {
        $sumErr = "Summary is empty";
    } else {
        $sum = test_input($_POST["summary"]);
    }
    
    if (empty($_POST["link"])) {
        $linkErr = "link is empty";
    } else {
        $link = test_input($_POST["link"]);
    }
      
    try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
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
    $fname = $date."_".$_FILES['upfile']['name'];
    $ftmp_name = $_FILES['upfile']['tmp_name'];
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'], "./uploads/".$fname)   
    ) {
        throw new RuntimeException('Warning! No image uploaded');
    }
    $isFileSet = true;
    $file_dir = "./uploads/".$fname;
    
} catch (RuntimeException $e) {
    echo $e->getMessage();
}   

    $result2 = "";
    if($isFileSet){
    $result2 = updateDB("projects" , "title = \"$title\", summary = \"$sum\", img_name = \"$filename\", img_src = \"$img_src\", link = \"$link\"", "id = $id");
    } else {
    $result2 = updateDB("projects" , "title = \"$title\", summary = \"$sum\", link = \"$link\"", "id = $id");       
    }
    if(!$result2){
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


<div class="article_blue_form" style="height: auto; padding-bottom: 100px;">
    <form method="POST" action="<?php echo './projectEditPage.php?id='.$id; ?>" enctype="multipart/form-data">
            <br><br>
            <div class="article_text_field" style = "margin-left: 450px;">
                <input type="text" name="title" value="<?php echo $title;?>" class="art_title_form"></input>
                <br>
                <textarea cols="60" rows="20" name="summary" class="art_textfield_form_small" ><?php echo $sum;?></textarea>
                <br>
                <input type="text" name="link" value="<?php echo $link;?>" class="art_title_form"></input>
                <br>
                    <input class="art_button" type="file" name="upfile" >
                <br>
                <input type="submit" name="submit" value="Save Article" class="art_button"></input><br>
            </div>
    </form> 
</div>




<div id="copyright" class="container">
    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
</div>

</body>
</html>