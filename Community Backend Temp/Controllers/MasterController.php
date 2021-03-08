<?php

require_once "date.php";

class MasterController {

    public static function display_topics_count($db){

        $query = 'SELECT * FROM topic';
        $result = $db->query($query);

        return $result->num_rows;

    }

    public static function  retrieve_topics($db){


            $NUMBER_OF_REPLIES=null;
            $REPLYER=null;
            $DATE_REPLIED=null;


            $query = "SELECT * FROM topic ORDER BY id DESC";
            $result = $db->query($query);
            $count = $result->num_rows;
            $topics=array();


            for($j=0;$j<$count;++$j)
            {


                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $id = $row['id']; ///search id later appended to url;
                $title = $row['title']; ///topic title
                $author= "posted by ".$row['author']; ///topic author

                $query = "SELECT * FROM reply WHERE title = \"$title\"";
                $result2 = $db->query($query);
                $number_of_replies = $result2->num_rows;

                if($number_of_replies != 0)
                {
                    $result2->data_seek($number_of_replies - 1);
                    $row= $result2->fetch_array(MYSQLI_ASSOC);

                    $REPLYER = $row['replyer'] ; //////latest replyer
                    $DATE_REPLIED =$row['date_replied'];
                    $DATE_REPLIED=ago($DATE_REPLIED); //replied date
                    $NUMBER_OF_REPLIES.= $number_of_replies > 1 ? " replies": " reply";  ///number of replies
                } else{
                    $REPLYER = "not replied yet";
                    $NUMBER_OF_REPLIES = "zero replies";
                    $DATE_REPLIED = "Unavailable";
                }

                $topics[]=array(
                    'id'=>$id,
                    'title'=>$title,
                    'author'=>$author,
                    'number_of_replies'=>$NUMBER_OF_REPLIES,
                    'replyer'=>$REPLYER,
                    'date_replied'=>$DATE_REPLIED
                );
            }
            return $topics;

        }
    }
