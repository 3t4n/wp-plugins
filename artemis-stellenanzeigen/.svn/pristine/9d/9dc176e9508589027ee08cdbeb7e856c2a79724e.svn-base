<?php

class ASA_Paginator
{

    private $_conn;
    private $_limit;
    private $_page;
    private $_query;
    private $_total;
    private $_suchText;
    private $_ort;
    private $_radius;
    private $_joblistAnchorName;

    public function __construct($_joblistAnchorName = null, $limit = null, $total = null, $page = null, $suchText = null, $ort = null, $radius = 20)
    {

        $this->_joblistAnchorName = $_joblistAnchorName;
        $this->_limit = $limit;
        $this->_total = $total;
        $this->_page = $page;
        $this->_suchText = $suchText;
        $this->_ort = $ort;
        $this->_radius = $radius;
    }

    public function ASA_getData($limit = 10, $page = 1)
    {

        $this->_limit   = $limit;
        $this->_page    = $page;

        if ($this->_limit == 'all') {
            $query      = $this->_query;
        } else {
            $query      = $this->_query . " LIMIT " . (($this->_page - 1) * $this->_limit) . ", $this->_limit";
        }
        $rs             = $this->_conn->query($query);

        while ($row = $rs->fetch_assoc()) {
            $results[]  = $row;
        }

        $result         = new stdClass();
        $result->page   = $this->_page;
        $result->limit  = $this->_limit;
        $result->total  = $this->_total;
        $result->data   = $results;

        return $result;
    }

    public function ASA_createLinks($links, $list_class)
    {
        if ($this->_limit == 'all') {
            return '';
        }

        $joblistAnchorName = $this->_joblistAnchorName;
        $baseUrl = '?limit=' . $this->_limit . '&stellenpage=%s&suchText=' . $this->_suchText . '&suchOrt=' . $this->_ort . '&radius=' . $this->_radius . '&scrollTo=' . $joblistAnchorName;

        $last = ceil($this->_total / $this->_limit);

        $start = (($this->_page - $links) > 0) ? $this->_page - $links : 1;
        $end = (($this->_page + $links) < $last) ? $this->_page + $links : $last;

        $html = '<ul class="' . $list_class . '">';

        $class = ($this->_page == 1) ? " job__paging-element--disabled" : "";
        $html .= '<li class="job__paging-element' . $class . '"><a class="job__paging-link" href="' . sprintf($baseUrl, $this->_page - 1) . '" >&laquo;</a></li>';

        if ($start > 1) {
            $html .= '<li><a class="job__paging-link" href="' . sprintf($baseUrl, 1) . '">1</a></li>';
            $html .= '<li class="job__paging-element job__paging-element--disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->_page == $i) ? " job__paging-element--active" : "";
            $html .= '<li class="job__paging-element' . $class . '"><a class="job__paging-link" href="' . sprintf($baseUrl, $i) . '" >' . $i . '</a></li>';
        }

        if ($end < $last) {
            $html .= '<li class="job__paging-element job__paging-element--disabled"><span>...</span></li>';
            $html .= '<li class="job__paging-element"><a class="job__paging-link" href="' . sprintf($baseUrl, $last) . '" >' . $last . '</a></li>';
        }

        $class = ($this->_page == $last) ? " job__paging-element--disabled" : "";
        $html .= '<li class="job__paging-element' . $class . '"><a class="job__paging-link" href="' . sprintf($baseUrl, $this->_page + 1) . '" >&raquo;</a></li>';

        $html .= '</ul>';

        // JavaScript zum Scrollen basierend auf "scrollTo"
        //     $html .= '<script>
        //     document.addEventListener("DOMContentLoaded", function() {
        //         const urlParams = new URLSearchParams(window.location.search);
        //         const scrollTo = urlParams.get("scrollTo");
        //         if (scrollTo) {
        //             const target = document.getElementById(scrollTo);
        //             if (target) {
        //                 target.scrollIntoView({ behavior: "smooth" });
        //             }
        //         }
        //     });
        // </script>';

        return $html;
    }
}
