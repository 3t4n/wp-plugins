<?php
$campaign_id = $metabox['args']['campaign_id'];

$data = $this->GetOptinRecords( $campaign_id );

if( $completed_accounts )
    arsort( $completed_accounts ); // order it latest first
?>

<table class="wp-list-table widefat fixed posts data_table" style="table-layout:auto;">
    <thead>
        <tr>
            <th style="width:50px; text-align:center;">#</th>
            <th style="width:auto; text-align:center;">Name</th>
            <th style="width:auto; text-align:center;">Email</th>
            <th style="width:auto; text-align:center;">Date</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    if( $data )
    {
        $iter = 0;
        
        foreach( $data as $key => $value )
        {
            $custom = $this->get_post_custom( $value->ID );
            
            $iter++; ?>
        <tr>
            <td style="text-align:center;">
                <?php echo $iter; ?>
            </td>
            <td style="text-align:center;">
                <?php echo $custom['optin_name']; ?>
            </td>
            <td style="text-align:center;">
                <?php echo $custom['optin_email']; ?>
            </td>
            <td style="text-align:center;">
                <?php echo $this->NumberTimeToStringTime( time() - strtotime($value->post_date) ); ?> ago
            </td>
        </tr>
        <?php
        }
    } ?>
    
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align:center;">#</th>            
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">Email</th>
            <th style="text-align:center;">Date</th>
        </tr>
    </tfoot>
</table>

<div style="clear:both;"></div>

