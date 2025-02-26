<?php
if (! defined('ABSPATH')) exit;
$nonce = wp_create_nonce('ppc3d_upload_stl_nonce');
?>
<div class="py-5 upload-stl-form-container">
  <form id="upload-stl-form" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center upload-stl-form-row">
      <div id="canvasColumn" class="col-xl-9">
        <div id="show-parsed-3d">
          <span class="stl-file-tooltip">
            <img src="<?php echo esc_url(plugins_url('images/blue-tooltip.svg', dirname(__FILE__))); ?>" width="43"
              height="43" alt="Tooltip Image">
            <span class="stl-file-tooltiptext">
              <div id="upload-file-message">
                <p><strong>Important</strong>!</p>
                <p>Please upload your .stl file to start</p>
              </div>
              <div hidden id="stl-upload-message-tooltip">
                <h2>Current Item Overview</h2>
              </div>
            </span>
          </span>
          <div class="file-upload-container">
            <div class="file-name" id="file-name"></div>
            <label for="stl-file" class="custom-file-upload btn btn-primary btn-md" id="stl-file-label">Upload .stl
              file</label>
            <input type="file" name="stl_file" id="stl-file" accept=".stl" style="display: none;">
            <div id="spinner" style="display: none; margin-left: 10px;">
              <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
              </div>
            </div>
          </div>
          <div id="zoomControls">
            <button id="zoomIn" type="button">
              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.2979 15.1936L18.0275 19.0342" stroke="#484848" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path
                  d="M16.3696 9.64619C16.3696 5.40404 13.03 1.96509 8.91039 1.96509C4.79078 1.96509 1.45117 5.40404 1.45117 9.64619C1.45117 13.8884 4.79078 17.3273 8.91039 17.3273C13.03 17.3273 16.3696 13.8884 16.3696 9.64619Z"
                  stroke="#484848" stroke-width="2" stroke-linejoin="round" />
                <path d="M6.00977 9.64603H11.8114M8.91057 6.65894V12.6331" stroke="#484848" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
            <hr />
            <button id="zoomOut" type="button">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.2979 14.5056L18.0275 18.3462" stroke="#484848" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path
                  d="M16.3696 8.9582C16.3696 4.71605 13.03 1.2771 8.91039 1.2771C4.79078 1.2771 1.45117 4.71605 1.45117 8.9582C1.45117 13.2004 4.79078 16.6393 8.91039 16.6393C13.03 16.6393 16.3696 13.2004 16.3696 8.9582Z"
                  stroke="#484848" stroke-width="2" stroke-linejoin="round" />
                <path d="M6.00977 8.95825H11.8114" stroke="#484848" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </button>
            <hr />
            <button id="cancelZoom" type="button">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.2979 15.033L18.0275 18.8735" stroke="#484848" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path
                  d="M16.3696 9.48604C16.3696 5.24388 13.03 1.80493 8.91039 1.80493C4.79078 1.80493 1.45117 5.24388 1.45117 9.48604C1.45117 13.7282 4.79078 17.1671 8.91039 17.1671C13.03 17.1671 16.3696 13.7282 16.3696 9.48604Z"
                  stroke="#484848" stroke-width="2" stroke-linejoin="round" />
                <path d="M6.85898 7.37391L10.9613 11.5983M10.9613 7.37391L6.85898 11.5983" stroke="#484848"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
            <hr />
            <button id="removeMesh" type="button">
              <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M16.8319 4.51099L16.2613 14.0176C16.1154 16.4465 16.0425 17.6609 15.4513 18.5341C15.1589 18.9658 14.7827 19.3301 14.3462 19.6039C13.4634 20.1577 12.2818 20.1577 9.91852 20.1577C7.55221 20.1577 6.36903 20.1577 5.48567 19.6028C5.04894 19.3286 4.67248 18.9636 4.38026 18.5312C3.78923 17.6567 3.71793 16.4405 3.57533 14.0082L3.01855 4.51099"
                  stroke="#484848" stroke-width="2" stroke-linecap="round" />
                <path
                  d="M1.6377 4.51089L18.2137 4.51089M13.6606 4.51089L13.032 3.17545C12.6144 2.28836 12.4055 1.84481 12.0453 1.56818C11.9655 1.50682 11.8809 1.45224 11.7924 1.40497C11.3935 1.19189 10.9148 1.19189 9.95749 1.19189C8.9761 1.19189 8.48544 1.19189 8.07996 1.41391C7.9901 1.46311 7.90434 1.51991 7.82359 1.5837C7.45924 1.87153 7.25571 2.33131 6.84866 3.25087L6.29089 4.51089"
                  stroke="#484848" stroke-width="2" stroke-linecap="round" />
                <path d="M7.62305 14.9419L7.62305 9.2522" stroke="#484848" stroke-width="2" stroke-linecap="round" />
                <path d="M12.2275 14.9419L12.2275 9.2522" stroke="#484848" stroke-width="2" stroke-linecap="round" />
              </svg>
            </button>
          </div>
          <canvas id="renderCanvas">
          </canvas>
        </div>
      </div>
      <div class="col-xl-4 pl-5 form-selections-container">
        <div class="form-selections">
          <div class="form-selections-heading">
            <h2>Properties</h2>
            <span class="properties-tooltip">
              <img src="<?php echo esc_url(plugins_url('images/properties-tooltip.svg', dirname(__FILE__))); ?>" alt=""
                srcset="">
              <span class="properties-tooltiptext">
                <p>Please select an option for each property.</p>
              </span>
            </span>
          </div>
          <div class="mb-1">
            <?php
            $enabled = get_option('ppc3d_enable_technology_options', 0);
            if ($enabled) {
            ?>
              <div class="form-group">
                <?php
                ppc3d_show_printing_technology_options_field_callback();
                ?>
              </div>
            <?php
            }
            ?>
            <div id="printing-error-message"></div>
          </div>

          <div class="mb-1">
            <?php
            $enabled = get_option('ppc3d_enable_material_options', 0);
            if ($enabled) {
            ?>
              <div class="form-group">
                <?php ppc3d_show_material_options_field_callback(); ?>
              </div>
            <?php
            }
            ?>
            <div id="material-error-message"></div>
          </div>

          <div class="mb-1">
            <?php
            $enabled = get_option('ppc3d_enable_quality_options', 0);
            if ($enabled) {
            ?>
              <div class="form-group">
                <?php ppc3d_show_quality_options_field_callback(); ?>
              </div>
            <?php
            }
            ?>
            <div id="quality-error-message"></div>
          </div>

          <div class="mb-1">
            <?php
            $enabled = get_option('ppc3d_enable_infill_options', 0);
            if ($enabled) {
            ?>
              <div class="form-group">
                <?php ppc3d_show_infill_options_field_callback(); ?>
              </div>
            <?php
            }
            ?>
            <div id="infill-error-message"></div>
          </div>
          <div class="mb-1">
            <?php
            $enabled = get_option('ppc3d_enable_color_options', 0);
            if ($enabled) {
            ?>
              <div class="form-group">
                <?php ppc3d_show_color_options_field_callback(); ?>
              </div>
            <?php
            }
            ?>
          </div>
          <div class="mb-1">
            <div class="form-group">
              <div class="accordion" id="quantityAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="quantityHeading">
                    <button id="quantity-accordion-button" class="accordion-button collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#quantityContent" aria-expanded="false"
                      aria-controls="quantityContent">
                      Quantity
                    </button>
                  </h2>
                  <div id="quantityContent" class="accordion-collapse collapse" aria-labelledby="quantityHeading"
                    data-bs-parent="#quantityAccordion">
                    <div class="accordion-body">
                      <div class="input-group">
                        <button class="quantity-button" type="button" id="quantityDecrement">
                          <svg width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 2H2" stroke="#0D95B3" stroke-width="3" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </button>
                        <input type="number" name="quantity" id="quantity" value="1" class="form-control">
                        <button class="quantity-button" type="button" id="quantityIncrement"
                          onclick="setQuantity(this.value)">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2V18M18 10H2" stroke="#0D95B3" stroke-width="3" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div id="quantity-error-message"></div>
          </div>
        </div>
        <div class="checkout-container">
          <div class="price-container-text">
            <span>ESTIMATED PRICE</span>
            <p id="checkout-total-price">$00.00</p>
          </div>
          <button type="button" id="buy-now-btn" style="display: none;" class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </div>

    <input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>">
  </form>

  <!-- Modal -->
  <div class="modal fade" id="buyNowModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="buyNowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="heading text-center">
          <h2 class="modal-title" id="staticBackdropLabel">Review Your Order</h2>
          <h3>Item Overview</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        <div class="modal-body">
          <!-- Display the uploaded file details table here -->
          <div class="purchase-container">
            <div id="modal-purchase-history"></div>
            <div class="price-container">
              <table id="output">
                <tr>
                  <th>
                    <p>Estimated Price:</p>
                  </th>
                  <td>
                    <p id="checkout-estimated-total-price">$00.00</p>
                  </td>
                </tr>
                <tr>
                  <th>
                    <p>Shipping Price:</p>
                  </th>
                  <td>
                    <p id="checkout-shipping-price">$00.00</p>
                  </td>
                </tr>
                <tr>
                  <th>
                    <p>Total Price:</p>
                  </th>
                  <td>
                    <p id="checkout-total-price-modal">$00.00</p>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <form id="checkoutForm">
            <div class="form-group email-form-container">
              <h3 class="text-center">Enter Your Details</h3>

              <input type="text" value="" id="transient_key_field" name="transient_key_field" hidden />

              <div class="form-group row">
                <label for="inputFullName" class="col-sm-5 col-form-label text-end">Your Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputFullName" name="fullName" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail" class="col-sm-5 col-form-label text-end">Email address</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputShippingAddress" class="col-sm-5 col-form-label text-end">Shipping Address</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="inputShippingAddress" name="shippingAddress" required>
                </div>
              </div>

              <div class="submit-button-container">
                <button id="placeOrder" type="submit" class="btn btn-primary">Place Order
                  <!-- Loading Spinner -->
                  <div id="loadingSpinner" style="display:none;">
                    <div class="spinner-border" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                  </div>
                </button>
              </div>

            </div>
            <div id="formMessage"></div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal for order confirmation -->
  <div class="modal fade" id="orderConfirmationModal" tabindex="-1" role="dialog"
    aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="heading text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 1L8.5 8.5M8.5 8.5L1 16M8.5 8.5L16 16M8.5 8.5L1 1" stroke="#0D95B3" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
          <svg width="88" height="88" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="88" height="88" fill="white" />
            <path
              d="M44 80.333C40.9999 80.333 38.1341 79.1223 32.4021 76.7012C18.134 70.6739 11 67.6603 11 62.5911C11 61.1717 11 36.5695 11 25.333M44 80.333C47.0001 80.333 49.8659 79.1223 55.598 76.7012C69.8661 70.6739 77 67.6603 77 62.5911V25.333M44 80.333V41.3006"
              stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M30.5284 35.2017L19.8173 30.0188C13.9391 27.1744 11 25.7522 11 23.5C11 21.2478 13.9391 19.8256 19.8173 16.9812L30.5284 11.7983C37.1389 8.59944 40.4444 7 44 7C47.5556 7 50.8611 8.5994 57.4717 11.7983L68.1828 16.9812C74.0608 19.8256 77 21.2478 77 23.5C77 25.7522 74.0608 27.1744 68.1828 30.0188L57.4717 35.2017C50.8611 38.4006 47.5556 40 44 40C40.4444 40 37.1389 38.4006 30.5284 35.2017Z"
              stroke="#0D95B3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M22 44L29.3333 47.6667" stroke="#0D95B3" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
            <path d="M62.3327 14.333L25.666 32.6663" stroke="#0D95B3" stroke-width="3" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
          <h2 class="modal-title" id="orderConfirmationModalLabel">Your order has been placed!</h2>
        </div>
        <div class="modal-body">
          <h5>Order code: <strong id="orderCode"></strong></h5>
          <p>To review your order details, kindly check your email. For shipping inquiries and changes, kindly <br />
            contact us at: <a id="adminEmail" href=""></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>