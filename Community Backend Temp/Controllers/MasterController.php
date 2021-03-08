<?php
class MasterController {

    public static function display_topics_count($db){

        $query = 'SELECT * FROM topic';
        $result = $db->query($query);

        return $result->num_rows;

    }
}