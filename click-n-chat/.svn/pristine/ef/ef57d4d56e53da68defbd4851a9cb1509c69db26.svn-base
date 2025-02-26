<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_lead_list($limit) {
	?>
    <div class="my-3">   
        <h1 class="wp-heading-inline">Social Users</h1>
        <button id="export-csv" class="page-title-action">Download CSV</button>
    </div>
    <div class="cnc-container-no-padding cnc-bg-white cnc-shadow">
        <div class="table-responsive">  
            <div class="table-container"> 
                <table id="leadsTable" class="wp-list-table cnc-list-table striped widefat fixed table-view-list pages" id="sortable-user-list">
                    <thead>
                        <tr>
                        	<th id="Name" class="sorted desc" abbr="Name">
                            	<a href="#" class="sort" data-sort="name"><span>Name</span>
                                	<span class="sorting-indicators">
                                    	<span class="sorting-indicator asc" aria-hidden="true"></span>
                                        <span class="sorting-indicator desc" aria-hidden="true"></span>
                                   	</span>
                                </a>
                            </th> 
                            <th id="Email" class="sorted desc" abbr="Email">
                            	<a href="#" class="sort" data-sort="email"><span>Email</span>
                                	<span class="sorting-indicators">
                                    	<span class="sorting-indicator asc" aria-hidden="true"></span>
                                        <span class="sorting-indicator desc" aria-hidden="true"></span>
                                   	</span>
                                </a>
                            </th> 
                            <th id="Phone" class="sorted desc" abbr="Phone">
                            	<a href="#" class="sort" data-sort="phone"><span>Phone</span>
                                	<span class="sorting-indicators">
                                    	<span class="sorting-indicator asc" aria-hidden="true"></span>
                                        <span class="sorting-indicator desc" aria-hidden="true"></span>
                                   	</span>
                                </a>
                            </th> 
                            <th id="Date" class="sorted desc" abbr="Date">
                            	<a href="#" class="sort" data-sort="created_at"><span>Date</span>
                                	<span class="sorting-indicators">
                                    	<span class="sorting-indicator asc" aria-hidden="true"></span>
                                        <span class="sorting-indicator desc" aria-hidden="true"></span>
                                   	</span>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th><input type="text" id="search-name" placeholder="Search Name"></th>
                            <th><input type="text" id="search-email" placeholder="Search Email"></th>
                            <th><input type="text" id="search-phone" placeholder="Search Phone"></th>
                            <th><input type="date" id="search-date" placeholder="Search Date"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
       	</div>
 	</div> 
    <div id="pagination">
	</div>	
<?php 
} 