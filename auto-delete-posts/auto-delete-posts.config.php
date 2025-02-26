<?php
  /*
   * Copyright (c) 2007-2018 Ashwin Bihari
   * http://www.ashwinbihari.com/
   *
   * Permission is hereby granted, free of charge, to any person obtaining a copy
   * of this software and associated documentation files (the "Software"), to deal
   * in the Software without restriction, including without limitation the rights
   * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
   * copies of the Software, and to permit persons to whom the Software is
   * furnished to do so, subject to the following conditions:
   *
   * The above copyright notice and this permission notice shall be included in
   * all copies or substantial portions of the Software.
   *
   * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
   * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
   * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
   * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
   * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
   * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
   * SOFTWARE.
   */
?>

<style type="text/css">
  table.optiontable {
  border-width: 1px 1px 1px 1px;
  border-spacing: 2px;
  border-style: none;
  border-color: gray gray gray gray;
  border-collapse: separate;
  background-color: white;
  }
  table.optiontable tr {
  border-style: none;
  }
  table.optiontable th {
  border-width: 1px 1px 1px 1px;
  padding: 1px 1px 1px 1px;
  border-style: none none dashed none;
  border-color: gray gray gray gray;
  background-color: #dddddd;
  color: #000000;
  -moz-border-radius: 0px 0px 0px 0px;
  }
  table.optiontable td {
  border-width: 1px 1px 1px 1px;
  padding: 1px 1px 1px 1px;
  border-style: none none dashed none;
  border-color: gray gray gray gray;
  background-color: #dddddd;
  color: #000000;
  -moz-border-radius: 0px 0px 0px 0px;
  }
</style>
<div class='wrap'>
  <h2>Auto Delete Posts Options</h2>
  <fieldset class='options'>
    <table class='optiontable' cellspacing='10' width='100%'>
      <tr valign="top">
	<td>
	  <table width="100%">
	    <form method='POST'>
	    <tr valign="top">
	      <th style='text-align: left'>
		<strong>Plugin Function</strong>
	      </th>
	      <td style='text-align: left'>
		<input type='radio' name='PerPostOrSite' value='<?php echo SITE_WIDE; ?>'
		<?php
		if (SITE_WIDE == $this->settings['PerPostOrSite']) {
		echo " checked='checked'";
		}
		echo "/>";
		?>
		&nbsp; Site Wide<br/>
		<input type='radio' name='PerPostOrSite' value='<?php echo PER_POST; ?>'
		<?php
		if (PER_POST == $this->settings['PerPostOrSite']) {
		echo " checked='checked'";
		}
		echo "/>";
		?>
		&nbsp; Per Post
	      </td>
	    </tr>
	    <tr valign="top">
	      <th style='text-align:left;'>
		<strong>Plugin Action</strong>
	      </th>
	      <td style='text-align:left;'>
		<input type='radio' name='PostAction' value='<?php echo DELETE_POSTS; ?>'
		<?php
		if (DELETE_POSTS == $this->settings['PostAction']) {
			echo " checked='checked'";
		}

		echo "/>";
		?>
		&nbsp; Delete<br/>
		<input type='radio' name='PostAction' value='<?php echo MOVE_POSTS; ?>'
		<?php
		if (MOVE_POSTS == $this->settings['PostAction']) {
			echo " checked='checked'";
		}

		echo "/>";
		?>
		&nbsp;  Move<br/>
		<input type='radio' name='PostAction' value='<?php echo ADD_CAT; ?>'
		<?php
		if (ADD_CAT == $this->settings['PostAction']) {
			echo " checked='checked'";
		}
		if (PER_POST == $this->settings['PerPostOrSite']) {
			echo " disabled";
		}
		echo "/>";
		?>
		&nbsp;  Add Category<br/>
		<input type='radio' name='PostAction' value='<?php echo PREVIEW; ?>'
		<?php
		if (PREVIEW == $this->settings['PostAction']) {
			echo " checked='checked'";
		}
		if (PER_POST == $this->settings['PerPostOrSite']) {
			echo " disabled";
		}
		echo "/>";
		?>
		&nbsp; Preview
	      </td>
	    </tr>
	    <tr valign="top">
	      <th style='text-align:left;'>
		<strong>How long to keep posts</strong>
	      </th>
	      <td>
		<input type='text' size='10' name='PostAge' value=" <?php echo $this->settings['PostAge']; ?>"
		<?php if (PER_POST == $this->settings['PerPostOrSite']) {
		echo " disabled";
		}
		echo "/>";
		?>
		&nbsp; in days
	      </td>
	    </tr>
	    <tr valign="top">
	      <td align='right' colspan='2'>
		<input type='submit' name='submit' value='Update Options'>
	      </td>
	    </tr>
	  </form>
	  </table>
	</td>
      </tr>
    </table>
  </fieldset>
  <div style='clear: both;'>&nbsp;</div>
  
  <?php
  if (SITE_WIDE == $this->settings['PerPostOrSite']) {

	  /* Choose which category to delete from */
	  if (DELETE_POSTS == $this->settings['PostAction']) {
	  		
		  require_once(dirname(__FILE__) . '/auto-delete-posts.delete.php');
	  } 

	  /* Choose which category to move posts to */
	  if ((MOVE_POSTS == $this->settings['PostAction']) || (ADD_CAT == $this->settings['PostAction'])) {
		  require_once(dirname(__FILE__) . '/auto-delete-posts.move.php');		
	  }

	  /* Preview what posts would be deleted. */ 
	  if (PREVIEW == $this->settings['PostAction']) {
		  require_once(dirname(__FILE__) . '/auto-delete-posts.preview.php');		
	  }
	} else {
		  if (MOVE_POSTS == $this->settings['PostAction']) {
		  		require_once(dirname(__FILE__) . '/auto-delete-posts.move.php');
		  }
		  require_once(dirname(__FILE__) . '/auto-delete-posts.preview.php');		
	}
  ?>
		</div>
