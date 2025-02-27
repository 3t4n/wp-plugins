<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div style='text-align:center;'>
<h2 style='color: red;'>Bulk Coupon Delete</h2>
</div>
<hr>

<div class="container">

    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <section style="text-align: center; direction: ltr;">
                <form>
                    <div class="form-group">
                        <label for="code_prefix">Coupon-Code prefix</label>
                        <input type="text" class="form-control" id="code_prefix" aria-describedby="prefixHelp" placeholder="prefix" value="bulker">
                        <small id="prefixHelp" class="form-text text-muted">Delete all unused coupons with this prefix</small>
                    </div>

                </form>
                <button id="coupon_bulk_delete" data-id="<?= $coupon_id ?>" type="button" class="btn btn-warning" style="text-align: center;">Delete</button>
                
                <hr>
                <div id="coupon_bulker_csv"></div>
                <hr>
                
            </section>
        </div>
        <div class="col-2">

        </div>
    </div>
</div>


