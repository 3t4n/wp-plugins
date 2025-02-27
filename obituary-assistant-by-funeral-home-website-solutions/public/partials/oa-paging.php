<?php

  /**
   * @link       https://www.obituary-assistant.com
   * @since      7.2.0
   *
   * @package    Fhw_Solutions_Obituaries
   * @subpackage Fhw_Solutions_Obituaries/public/partials
   */

?>


<ul class="ps-3 m-auto pagination">

  <?php

    if ($page >= 2) {
      echo '<li class="page-item">';
      echo '<a class="page-link" aria-disabled="false" aria-label="Previous" href="' . $actual_link . '/' . ($page - 1) . '/">&laquo; ' .  $previous . '</a>';
      echo '</li>';
    }

    if ($totalpages > $page) {
      echo '<li class="page-item">';
      echo '<a class="page-link" aria-disabled="false" aria-label="next" href="' . $actual_link . '/' . ($page + 1) . '/">' . $more . ' &raquo;</a>';
      echo '</li>';
    }

  ?>

</ul>
