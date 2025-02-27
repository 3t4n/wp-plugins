<div style='text-align:center;'>
    <h2 style="font-size: 32px;">Bulk Coupon Duplicator</h2>
    <h4 style='color: #818181; font-size: 18px;'><?=$coupon_code ?></h4>
</div>
<hr>
<div class="container">
    <div>
        <section style="text-align: center; direction: ltr;">
            <form>
                <div class="es_form_group" style="margin: 10px;">
                    <label for="code_prefix">Coupon-Code prefix</label>
                    <div>
                        <input type="text" class="form-control" id="code_prefix" aria-describedby="prefixHelp" placeholder="prefix" value="bulker" style="border-width: 2px; border-radius: 5px; direction: ltr; font-size: 18px; border-color: #0270bc;">
                    </div>
                    <div>
                        <small id="prefixHelp" class="form-text text-muted">set the prefix for the coupons you want to generate</small>
                    </div>
                </div>
                <div class="form-group" style="margin: 10px;">
                    <label for="bulker_num">Number of Coupons</label>
                    <div>
                        <input type="number" class="form-control" id="bulker_num" value="1" style="border-width: 2px; border-radius: 5px; direction: ltr; font-size: 18px; border-color: #0270bc;">
                    </div>
                </div>
            </form>
            <hr>
            <div id="coupon_bulker_csv"></div>
            <hr>
            <button id="coupon_bulk_generate" data-id="<?= $coupon_id ?>" type="button" class="btn btn-primary" style="text-align: center; border-radius: 5px; font-size: 20px; background-color: #2784b5; color: #ffffff; padding: 10px;">Generate</button>
        </section>
    </div>
</div>
