<?php







if (!function_exists('get_pagination')) {

    function get_pagination($total_results, $limit, $page) {
        // Check for valid and limit
        $page = $page < 1 ? 1 : $page;
        $limit = $limit < 1 ? 1 : $limit;

        $total_pages = ceil($total_results / $limit);
        $page = $page > $total_pages ? $total_pages : $page;
        $offset = (($page * $limit) - $limit);

        return array(
            'limit' => $limit,
            'offset' => $offset < 1 ? 0 : $offset,
            'page' => $page
        );
    }

}

if (!function_exists('is_valid_date')) {

    function is_valid_date($date) {
        // yyyy-mm-dd 
        if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
            if (checkdate($matches[2], $matches[3], $matches[1]))
                return TRUE;
        }
    }

}


