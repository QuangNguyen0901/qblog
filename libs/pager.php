<?php

function pager_function($total_page, $current_page, $link)
{
    $start = 1;
    $end = 3;
    if ($total_page < 3) $end = $total_page;
    if ($current_page > 1 && $total_page > 3) {
        $start = $current_page - 1;
        if ($current_page < $total_page - 1) {
            $end = $current_page + 1;
        } else $end = $total_page;
    }
    $html = '';

    if ($total_page > 1) {
        $html .= '<ul class = "pagination justify-content-right">';

        if ($current_page > 1) {
            $html .= '<li "page-item"><a class="page-link" href="' . str_replace('{page}', $current_page - 1, $link) . '">&laquo;</a></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            if ($current_page == $i)
                $html .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
            else
                $html .= '<li "page-item"><a class="page-link" href="' . str_replace('{page}', $i, $link) . '">' . $i . '</a></li>';
        }
        if ($current_page != $total_page) {
            $html .= '<li "page-item"><a class="page-link" href="' . str_replace('{page}', $current_page + 1, $link) . '">&raquo;</a></li>';
        }
        $html .= '</ul>';
    }
    echo $html;
}
