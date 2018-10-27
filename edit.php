<?php
    require_once("database.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM `students`WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <form action="" method="post">
        <div>
            姓名:<input type="text" name="name" value="<?php echo $row["name"];?>">
        </div>
        <div>
            EMAIL:<input type="text" name="mail" value="<?php echo $row["mail"];?>">
        </div>
        <div>
            <select name="edu">
                <option value="國小"<?php if($row["edu"]=="國小"){echo "selected";} ?>>國小</option>
                <option value="國中"<?php if($row["edu"]=="國中"){echo "selected";} ?>>國中</option>
                <option value="高中"<?php if($row["edu"]=="高中"){echo "selected";} ?>>高中</option>
                <option value="大專院校"<?php if($row["edu"]=="大專院校"){echo "selected";} ?>>大專院校</option>
                <option value="研究所"<?php if($row["edu"]=="研究所"){echo "selected";} ?>>研究所</option>
            <select>
        </div>
        <div>
            男<input type="radio" name="gender" value="男"<?php if($row["gender"]=="男"){echo "checked";} ?>>
            女<input type="radio" name="gender" value="女"<?php if($row["gender"]=="女"){echo "checked";} ?>>
        </div>
        <div>
            <?php
                $hobbys = explode(",",$row["hobby"]);
            ?>
            吃<input type="checkbox" name="hobby[]" value="吃"<?php if(in_array("吃",$hobbys)){echo "checked";}?>>
            喝<input type="checkbox" name="hobby[]" value="喝"<?php if(in_array("喝",$hobbys)){echo "checked";}?>>
            玩<input type="checkbox" name="hobby[]" value="玩"<?php if(in_array("玩",$hobbys)){echo "checked";}?>>
            樂<input type="checkbox" name="hobby[]" value="樂"<?php if(in_array("樂",$hobbys)){echo "checked";}?>>
        </div>
        <div>
            意見<textarea name="comment" cols="30" rows="10"><?php echo $row["comment"];?></textarea>
        </div>
        <div>
            <input type="submit" value="送出">
        </div>
</body>
</html>