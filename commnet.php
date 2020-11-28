<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/comment.css">

    <?php
    require "includes/connection.php";
    $records = "SELECT `commentnumber`,`comment`,`commenter`, `commenttime`,`replyto`  FROM `comments` order by commentnumber asc ";
    $result = mysqli_query($connection, $records);
    $comment_array = [];
    $reply_array = [];


    while ($row = mysqli_fetch_assoc($result)) {


        $comment_array[$row['commentnumber']]['commentnumber'] =(int) $row['commentnumber'];
        $comment_array[$row['commentnumber']]['comment'] = $row['comment'];
        $comment_array[$row['commentnumber']]['commenter'] = $row['commenter'];
        $comment_array[$row['commentnumber']]['commenttime'] = $row['commenttime'];
        $comment_array[$row['commentnumber']]['replyto'] =(int) $row['replyto'];
        $comment_array[$row['commentnumber']]['total_reply'] = (int)total_replies($row['commentnumber']);

        $reply_array[$row['replyto']][] = $row['commentnumber'];


    }

    function total_replies($comment_id)
    {
        global $connection;
        $total = 0;

        $query = "SELECT COUNT(*) as total_reply FROM `comments` where replyto >0 and replyto =$comment_id";

        $result = mysqli_query($connection, $query);
        if ($result == true) {
            $result_row = mysqli_fetch_array($result);
            $total = $result_row['total_reply'];
            if ($total != 0) {

                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }
    }
    function sortByTotalReply($a, $b)
    {
        if ($a["total_reply"] == $b["total_reply"]) {
            return 0;
        }
        return ($a["total_reply"] < $b["total_reply"]) ? -1 : 1;
    }
//    function sortByTotalReply($a, $b)
//    {
//        $a = $a['total_reply'];
//        $b = $b['total_reply'];
//
//        if ($a == $b) {
//            return 0;
//        }
//        else {
//            return ($a > $b) ? -1 : 1;
//        }
//    }


    function buildCategory($replyto, $arraycomment, $arrayreply)
    {


        if (isset($arrayreply[$replyto])) {

            foreach ($arrayreply[$replyto] as $comment_id) {

                if (!isset($arrayreply[$comment_id])) {

                    return $arraycomment;
                }
                if (isset($arrayreply[$comment_id])) {

                    buildCategory($comment_id, $arraycomment, $arrayreply);
                    return $arraycomment;

                }
            }


        }

    }

    $final = buildCategory(0, $comment_array, $reply_array);

    array_multisort( array_column($final, "total_reply"), SORT_DESC, $final );
//    usort($final, 'sortByTotalReply');
//    echo '<pre>';
//print_r($final);

    ?>

    <div class="container">
        <h2>Chittagong Autos</h2>
        <div class="wrapper">
            <div class="table-container">
                <table id="comment" class="add_comment">

                    <tr>

                        <th>No.</th>
                        <th>Commenter</th>
                        <th>Time</th>
                        <th>Comment</th>
                    </tr>
                    <?php
                    foreach ($final

                             as $key => $value) {
                        ?>

                        <tr id='top_<?php echo $value['commentnumber'] ?>' number="<?php echo $value['commentnumber'] ?>"  value="<?php echo $value['total_reply'] ?>" commenter="<?php echo $value['commenter'] ?>" total_reply='total_<?php echo $value['total_reply'] ?>' total="<?php echo $value['total_reply'] ?>" >

                            <td><?php echo $value['commentnumber'] ?></td>
                            <td><?php echo $value['commenter'] ?></td>
                            <td><?php echo $value['commenttime'] ?></td>
                            <td><?php echo $value['comment'] ?>
                            <td>
                                <input type='button' value='[Reply]' id='replyto_<?php echo $value['replyto'] ?>'
                                       commenter='<?php echo $value['commenter'] ?>'
                                       total_reply='total_<?php echo $value['total_reply'] ?>'
                                       reply-id='<?php echo $value['commentnumber'] ?>'
                                       style=' color: #364d73;'>
                            </td>
                        </tr>


                        <?php
                    }

                    ?>
                </table>
            </div>
        </div>


        <br><br>
        <div class="form-inline">

            <input type="name" id="name" placeholder="Type your name here" name="name">
            <input type="comment" id="com" placeholder="Type your comment here" name="comment">

            <button type="submit" class="submit">Post</button>
        </div>
    </div>
    </div>

</head>
<script src="js/jquery.js"></script>
<?php
include 'js/comment_js.php';


?>