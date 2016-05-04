<?php
include './adminMenu.php';

$title = $sum = $teori = $pratik =  "";
$titleErr = $sumErr = $contentErr = $teoriErr = $pratikErr = "";

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
    
    if (empty($_POST["teori"])) {
        $teoriErr = "Teori is empty";
    } else {
        $teori = test_input($_POST["teori"]);
    }
    
    if (empty($_POST["pratik"])) {
        $pratikErr = "Pratik is empty";
    } else {
        $pratik = test_input($_POST["pratik"]);
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
            throw new RuntimeException('No file sent.');
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
        throw new RuntimeException('Failed to move uploaded file.');
    }

    $file_dir = "./uploads/".$fname;
    
} catch (RuntimeException $e) {
    echo $e->getMessage();
}
    
    $result = insertDB("professions(title, summary, img_name, img_src, teori, pratik)", "(\"$title\" , \"$sum\" , \"$fname\" , \"$file_dir\" , $teori, $pratik)");
    
    if(!$result){
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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <br><br>
            <div class="article_text_field" style = "margin-left: 450px;">
                <input type="text" name="title" value="Title" class="art_title_form"></input>
                <br>
                <textarea cols="60" rows="20" name="summary" class="art_textfield_form_small" >Summary</textarea>
                <br>
                <label class="art_title_label">TEORICHAL</label><br>
                <select name ="teori" class="art_title_form">
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3" selected>Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                </select><br>
                <label class="art_title_label">PRATICHAL</label><br>
                <select name ="pratik" class="art_title_form">
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3" selected>Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                </select>
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