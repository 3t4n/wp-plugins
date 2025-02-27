<?php
namespace Nagad\Gateway\Payment;


class nagad_orders{

    public function __construct(){
        add_action('admin_menu', [$this, 'admin_panel']);
    }

    public function admin_panel() {
        $hook = add_menu_page(
            __('Nagad Transactions', 'nagad-pay'), //page title
            __('Nagad Transactions', 'nagad-pay'), //menu title
            'manage_options', //capability
            'nagad-pay', //menu slug
            [$this, 'nagad_order_page'], //function
            NAGAD_PLUGIN_URL . '/logo/ngd.png' //icon url
            //1 //position
        );
    }

    public function nagad_order_page() {
        ?>
        <div class="wrap">
            <div style = "align-items: center;">
                <img src="<?php echo NAGAD_PLUGIN_URL . '/logo/nagad_cover.png'; ?>" alt="" style = "height: 90px; width:130px;">
                <h4 style = "color: red;">Please reactivate the plugin if this is not working</h4>
            </div>

            <form action="" method="post">
                <?php
                    $table = new \Nagad\Gateway\Payment\txn_list();
                    isset( $_POST['s'] ) ? $table->prepare_items( $_POST['s'] ) : $table->prepare_items();
                    ?>
                    <div style = "float:left; margin-bottom: -40px;">
                        <?php $table->search_box( 'Search', 'nagad-pay');?>
                        <h5 style = "transform: translate(10px, 0px);">Search Order Id or Nagad Txn Id</h5>
                    </div>
                    <?php
                    $table->display();
                ?>
            </form>
        </div>
        <?php
    }

}
?>