<?php
class GFAnalyticsUI {
	public static $PREFIX = 'gf-analytics';
	public static function join_by($array, $field) {
		$results = array();
		foreach ($array as $row) {
			$key = $row->$field;
			$key = $key == '' ? '(Unknown)' : $key;
			$found = false;
			for ($i = 0; $i<count($results);  $i++) {
				$result = $results[$i];
				if ($result['key'] == $key) {
					$result['amount'] += $row->amount;
					$result['count'] = ($result['count'] * $result['total'] + $row->count) / ($result['total']+1);
					$result['total']++;
					$results[$i] = $result;
					$found = true;
					break;
				}
			}
			if (!$found) {
				$results[] = array(
					'key' =>  $key,
					'amount' => $row->amount,
					'total' => 1,
					'count' => $row->count,
					'average' => $row->amount
				);
			}
		}
		foreach ($results as $result) {
			$result['average'] = $result['amount'] / $result['total'];
		}
		return $results;
	}
	public static function consolidate($array, $field, $amount = 10) {
		$amount = (int) $amount;
		$results = array();
		$other = array(
			'key' =>  '(Other)',
			'amount' => 0,
			'total' => 0,
			'count' => 0,
			'average' => 0
		);
		foreach ($array as $value) {
			if ($value[$field] < $amount) {
				//$other['average'] = ($other['average']*$other['total'] + $value['average']*$value['total']) / ($other['total'] + $value['total'])
				$other['amount'] += $value['amount'];
				$other['count'] = ($other['count']*$other['total'] + $value['count']*$value['total']) / ($other['total'] + $value['total']);
				$other['total'] += $value['total'];
				$other['average'] = $other['amount'] / $other['total']; //Rather than rolling average above, just calculate a new absolute average
			} else {
				$results[] = $value;
			}
		}
		if ($amount > 0) {
			$results[] = $other;
		}
		return $results;
	}
	public static function number_format($number, $decimals = 0) {
		return number_format(self::check_number($number), $decimals);
	}
	public static function check_number($number) {
		return is_nan($number) ? 0 : $number;
	}
	public static function get_oneoff($transactions) {
		$results = array();
		foreach($transactions as $row) {
			if (!$row->recurring) {
				$results[] = $row;
			}
		}
		return $results;
	}
	public static function get_newsubscriptions($transactions) {
		$results = array();
		foreach($transactions as $row) {
			if ($row->recurring && $row->first_payment) {
				$results[] = $row;
			}
		}
		return $results;
	}
	public static function get_recurring($transactions) {
		$results = array();
		foreach($transactions as $row) {
			if ($row->recurring && !$row->first_payment) {
				$results[] = $row;
			}
		}
		return $results;
	}
	public static function by_source($transactions, $joinfield, $cutoff = 10, $outputfield = 'total') {
		$result = self::join_by($transactions, $joinfield);
		//Consolidate always by number of payments, as that makes more sense than average payment, and amount would need to be calculated differently, like < $100 rather than < 10 (payments)
		//$result = self::consolidate($result, $outputfield, $cutoff);
		$result = self::consolidate($result, 'total', $cutoff);
		array_multisort(array_column($result, $outputfield), SORT_DESC, $result);
		return $result;
	}
	public static function escapejs($str) {
		return str_replace("'", "\'", str_replace('\\', '\\\\', htmlspecialchars($str)));
	}
	public static function pie_data($transactions, $joinfield, $cutoff = 10, $outputfield = 'total') {
		$transactions = self::by_source($transactions, $joinfield, $cutoff, $outputfield);
		$js = "[";
		foreach ($transactions as $value) {
			$js .= "['".self::escapejs($value['key'])."', ".self::check_number($value[$outputfield])."],";
		}
		$js .= "
		];";
		return $js;
	}
	public static function output_pie($title, $id, $transactions, $joinfield, $cutoff = 10, $outputfield = 'total', $displayvalue = false, $filter = '') {
		return "var info = ".self::pie_data($transactions, $joinfield, $cutoff, $outputfield)."
			drawPie('$title', '$id', info, ".($displayvalue?'true':'false').", '$filter');";
	}
	public static function output_table($transactions, $field, $cutoff = 10) {
		$transactions = self::by_source($transactions, $field, $cutoff);
		$html = '';
		foreach ($transactions as $value) {
			$average = $value['amount']/$value['total'];
			$html .= '<tr><td>'.self::table_name($value['key'], $field).'</td>
				<td data-sort-value="'.$value['total'].'">'.$value['total'].'</td>
				<td data-sort-value="'.$value['amount'].'">$'.self::number_format($value['amount']).'</td>
				<td data-sort-value="'.self::check_number($average).'">$'.self::number_format($average,2).'</td></tr>';
		}
		return $html;
	}
	public static function table_name($value, $field) {
		if ($value!='(Other)') {// && $field=='page' || $field=='description')
			//if ($field == 'page') {
			//	return '<a href="'.$value.'" target="_blank">'.$value.'</a>';
			//} else {
				return '<a href="'.admin_url('admin.php?page='.self::$PREFIX.
				'&period='.UtilsLib::get('period','').
				'&start='.UtilsLib::get('start','').
				'&end='.UtilsLib::get('end','')).
				'&field='.urlencode($field).'&value='.urlencode($value).
				'">'.$value.'</a>';
			//}
		} else {
			return $value;
		}
	}
	public static function output_subscriptions($transactions, $field, $cutoff = 10) {
		$transactions = self::by_source($transactions, $field, $cutoff);
		$html = '';
		foreach ($transactions as $value) {
			$average = $value['amount']/$value['total'];
			$customervalue = $average * $value['count'];
			$html .= '<tr><td>'.self::table_name($value['key'], $field).'</td>
				<td data-sort-value="'.$value['total'].'">'.self::number_format($value['total']).'</td>
				<td data-sort-value="'.$value['count'].'">'.self::number_format($value['count'],1).'</td>
				<td data-sort-value="'.self::check_number($average).'">$'.self::number_format($average,2).'</td>
				<td data-sort-value="'.self::check_number($customervalue).'">$'.self::number_format($customervalue).'</td></tr>';
		}
		return $html;
	}
	public static function get_transactions($start, $end) {
		$transactions = GFAnalytics::get_transactions($start, $end, true);
		for ($i=0; $i<count($transactions); $i++) {
			if ($transactions[$i]->description == '') {
				$transactions[$i]->description = $transactions[$i]->page;
			}
		}
		$day = 3600*24;
		$month = $day * 25; //25 days just to be long enough
		$new = array();
		for ($i=0; $i<count($transactions); $i++) {
			//First payment, but longer than a month after, so we probably missed first subscription
			if ($transactions[$i]->first_payment) {
				if ($transactions[$i]->date - $transactions[$i]->created > $month) {
					if ($transactions[$i]->created >= $start && $transactions[$i]->created < $end) {
						$transactions[$i]->count = $transactions[$i]->count+1; //TODO: we may need to do all transactions for this entry_id in order for count logic to work correctly
						$backfill = (object) (array) $transactions[$i]; //Within scope, add new transaction
						$backfill->date = $backfill->created;
						$new[] = $backfill;
					}
					$transactions[$i]->first_payment = false; //No longer first payment
				}
			}
			if ($transactions[$i]->date >= $start && $transactions[$i]->date < $end) {
				$new[] = $transactions[$i];
			}
		}
		usort($new, array('GFAnalyticsUI', 'sort_transaction'));
		return $new;
	}
	public static function sort_transaction($a, $b) {
		return $b->date - $a->date;
	}
	public static function filter($array, $filter = null, $value = null) {
		$value = strtolower($value);
		$results = array();
		foreach ($array as $row) {
			if ($filter == 'type') {
				if ($row->recurring) {
					if ($row->first_payment && $value == 'New Subscription') {
						$results[] = $row;
					} elseif (!$row->first_payment && $value == 'Recurring') {
						$results[] = $row;
					}
				} elseif($value == 'One Off') {
					$results[] = $row;
				}
			} elseif ($filter == 'search' && strpos(strtolower($row->description), $value) !== false) {
				$results[] = $row;
			} elseif (!$filter || strtolower($row->$filter) == $value) {
				$results[] = $row;
			}
		}
		return $results;
	}
	public static function history($array, $start, $end, $internal = 'month') {
		$results = array();
		$i=0;
		do {
			$timezone = get_option('gmt_offset');
			$date1 = new DateTime('now', new DateTimeZone($timezone));
			$date1 = $date1->setTimestamp($start);
			$date2 = new DateTime('now', new DateTimeZone($timezone));
			$date2 = $date2->setTimestamp($start);
			if ($i != 0) {
				$date1 = $date1->modify('+'.$i.' '.$internal);
			}
			$date2 = $date2->modify('+'.($i+1).' '.$internal);
			if ($internal == 'month') {
				$format = "M 'y";
			} elseif ($internal == 'hour') {
				$format = 'h:i';
			} else {
				$format = 'j M';
			}
			

			$results[] = array(
				'key' => date($format, $date1->getTimestamp()),
				'amountone' => 0,
				'totalone' => 0,
				'amountrec' => 0,
				'totalrec' => 0,
				'amountnew' => 0,
				'totalnew' => 0,
				'amountpro' => 0,
				'totalpro' => 0,
				'start' => $date1->getTimestamp(),
				'end' => $date2->getTimestamp(),
				'startdate' => date('Y-m-d', $date1->getTimestamp()),
				'enddate' => date('Y-m-d', $date2->getTimestamp()),
			);
			$i++;
		} while ($date2->getTimestamp() < $end);

		foreach ($array as $row) {
			for ($i=0; $i<count($results); $i++) {
				$result = $results[$i];
				if ($row->date >= $result['start'] && $row->date < $result['end']) {
					if ($row->recurring && $row->first_payment) {
						$result['amountnew'] += $row->amount;
						$result['totalnew'] += 1;
					} elseif ($row->recurring) {
						$result['amountrec'] += $row->amount;
						$result['totalrec'] += 1;
					} else {
						$result['amountone'] += $row->amount;
						$result['totalone'] += 1;
					}
					$results[$i] = $result;
					break;
				}
			}
		}
		return $results;
	}
	public static function subscription_length($array) {
		$results = array();
		foreach ($array as $row) {
			if ($row->recurring) {
				$found = false;
				for ($i=0; $i<count($results); $i++) {
					$result = $results[$i];
					if ($result->entry_id == $row->entry_id) {
						//$result->amount += $row->amount;
						//We don't overwite count like join_by because we want the absolute count
						//$result['count'] = ($result['count'] * $result['total'] + $row->count) / ($result['total']+1);
						//$result->total++;
						//$results[$i] = $result;
						$found = true;
						break;
					}
				}
				if (!$found) {
					$results[] = $row;
				}
			}
		}
		return $results;
	}
	public static function analytics_page() {
		$view = UtilsLib::get('view');
		?>
		<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>js/stupidtable.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
		var analyticsurl = '<?php echo admin_url('admin.php?page='.self::$PREFIX); ?>';
		var analyticskey = '<?php echo GFAnalytics::apikey(); ?>';
		function queryParams(name, url) {
			//var url = new URL(url || location.href);
			//return url.searchParams.get(name);

			if (!url) url = window.location.href;
			name = name.replace(/[\[\]]/g, '\\$&');
			var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, ' '));
		}
		function getFilters() {
			var selects = jQuery('#gfa_filters select');
			var url = '';
			selects.each(function(index) {
				var select = jQuery(this);
				var value = select.val();
				url += value == '' ? '' : '&'+select.attr('data-param')+'='+value;
			});
			if (queryParams('period') == 'custom') {
				url += '&start=' + queryParams('start');
				url += '&end=' + queryParams('end');
			}
			return url;
		}
		function getApiUrl(view) {
			view = view ? view : queryParams('view');
			view = view ? view : 'transactions';
			return '/wp-json/gf-stripe-extensions/v1/' + view + '?apikey=' + analyticskey;
		}
		function selectFilters() {
			var view = queryParams('view');
			var url = analyticsurl + (view ? '&view='+view : '');
			location.href = url + getFilters();
		}
		function exportCSV() {
			location.href = getApiUrl() + getFilters() + '&format=csv';
		}
		function recurringCSV() {
			location.href = getApiUrl('recurring') + '&format=csv';
		}
		function descriptionClick(description) {
			jQuery('[data-param="description"]').val(description);
			selectFilters();
		}
		function validateEmail(email) {
			const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		}
		function gfa_search(event) {
			var email = jQuery('#gfa_search').val();
			if (event.keyCode == 13 && validateEmail(email)) {
				gfa_customer(email);
			}
		}
		function gfa_filter(event) {
			if (event.keyCode == 13) {
				var search = jQuery('#gfa_filter').val().trim();
				if (search != '') {
					var url = location.href;
					if (location.href.indexOf('&field=') > 0) {
						url = location.href.substr(0, location.href.indexOf('&field='));
					}
					location.href = url + '&field=search&value=' + encodeURIComponent(search);
				}
			}
		}
		function gfa_customer(email) {
			location.href = analyticsurl + '&view=customer&customer=' + encodeURIComponent(email);
		}
		jQuery(document).ready(function(e) {
			jQuery('.gfa_sort').stupidtable();	
			jQuery('#gfa_search').autocomplete({
				source: getApiUrl('autocomplete'),
				select: function(event, ui) {
					if (ui && ui.item && ui.item.value) {
						gfa_customer(ui.item.value);
					}
				}
			});
		});
		</script>
		<style>
			h2 a {
				cursor: pointer;
			}
			.gfa_image {
				width: 100%;
			}
			.gfa_chart_wrap {
				position: absolute;
				top: 0;
				bottom: 0;
				width: 100%;
				height: 100%;
			}
			.gfa_cell_wrap {
				position: relative;
				width: 100%;
				height: 100%;
			}
			.gfa_chart {
				/*min-height: 320px;*/
				height: 100%;
				width: 100%;
			}
			.gfa_table {
				width: 100%;
			}
			.gfa_table th {
				font-weight: bold;
				text-align: right;
			}
			.gfa_nowrap {
				white-space: nowrap;
			} 
			.gfa_table td {
				vertical-align: top;
				text-align: right;
			}
			.gfa_table2 td {
				width: 50%;
			}
			.gfa_table3 td {
				width: 33%;
			}
			.gfa_table2 table td,
			.gfa_table3 table td {
				width: auto;
			}
			.gfa_table .gfa_left th,
			.gfa_table th:first-child,
			.gfa_table td:first-child {
				text-align: left;
			}
			#gfa_summary th {
				text-align: right;
			}
			#gfa_summary tbody td {
				font-size: 24px;
				vertical-align: bottom;
				height: 36px;
				padding-left: 20px;
				text-align: right;
			}
			#gfa_summary tbody tr:first-child td {
				font-weight: bold;
				font-size: 32px;
			}
			#gfa_summary tbody tr td:last-child {
				font-size: 14px;
				padding-left: 5px;
				position: relative;
				top: 5px;
			}

			/* Customers */
			.gfa_align_right {
				text-align: right;
			}
			.gfa_align_center {
				text-align: center;
			}
			.gfa_customers a {
				cursor: pointer;
			}

			/* Customer */
			.gfa_address {
				font-size: 16px;
    			line-height: 20px;
			}
			.gfa_address th:first-child {
				text-align: right !important;
				vertical-align: top;
			}
			.gfa_address th,
			.gfa_address td {
				padding: 3px 5px;
			}
			.gfa_address td {
				text-align: left;
			}

			/* generic table */
			.gfa_doublerrow tbody tr:nth-child(odd) td {
				border-top: 1px solid #ccd0d4;
			}
			.gfa_doublerrow tbody tr:first-child td {
				border-top: none;
			}
			.gfa_doublerrow tfoot tr:last-child td {
				border-top: none;
			}

			/* autocomplete */
			.gfa_search {
				float: right;
				position: relative;
				top: -5px;
				left: -5px;
			}
		</style>
		<h1><?php
		$views = array(
			'' => 'Transactions',
			'customers' => 'Customers'
		);
		if (GFStripeExtensions::get_option('virtuous-token')) {
			if (GFStripeExtensions::get_option('microsoft-clientid')) {
				$views['calls'] = 'Calls';
			}
			//$views['campaigns'] = 'Campaigns';
			//$views['tags'] = 'Tags';
			$views['reconcile'] = 'Reconcile';
		}
		$firsttime = true;
		if (current_user_can(GFStripeExtensions::get_role())) {
			foreach ($views as $id => $title) {
				echo ($firsttime?'':' | ').'<a href="'.admin_url('admin.php?page='.self::$PREFIX.($id==''?'':'&view='.$id)).'">'.$title.'</a>';
				$firsttime = false;
			}
			if (GFStripeExtensions::get_boolean('analytics-cache')) {
				echo ' | <a href="'.admin_url('admin.php?page='.self::$PREFIX.'&view=clearcache&referer='.urlencode($_SERVER['REQUEST_URI'])).'">Clear Cache</a>';
			}
		}
		if (isset($_GET['view'])) {
			?><input type="text" class="gfa_search" id="gfa_search" onkeydown="gfa_search(event);" placeholder="Customers..." /><?php
		} else {
			?><input type="text" class="gfa_search" id="gfa_filter" onkeydown="gfa_filter(event);" placeholder="Filter..." value="<?php echo UtilsLib::get('field')=='search'?UtilsLib::get('value'):''; ?>" /><?php	
		}
		?>
		</h1>
		<?php
		if (current_user_can(GFStripeExtensions::get_role())) {
			if ($view == 'customer') {
				self::analytics_customer();
			} elseif ($view == 'customers') {
				self::analytics_customers();
			} elseif ($view == 'calls') {
				self::analytics_calls();
			} elseif ($view == 'campaigns') {
				self::analytics_campaigns();
			} elseif ($view == 'tags') {
				self::analytics_tags();
			} elseif ($view == 'reconcile') {
				self::analytics_reconcile();
			} elseif ($view == 'clearcache') {
				GFStripeExtensions::$ValueCache->clear();
				$referer = UtilsLib::get('referer', $_SERVER['HTTP_REFERER']);
				?>
				<script>
				location.href = '<?php echo $referer; ?>';
				</script>
				<a href="<?php echo $referer; ?>">Return...</a>
				<?php
			} else {
				self::analytics_transactions();
			}
		} else {
			self::analytics_transactions();
		}
		GFStripeExtensions::$ValueCache->expire();
	}
	public static function reconcile_table($data, $title) {
		?>
		<h3><?php echo $title; ?></h3>
		<table class="widefat striped gfa_sort">
		<thead><tr>
			<th data-sort="int">Date</th><th data-sort="int">Entry</th><th data-sort="string">Stripe</th><th data-sort="string">Virtuous</th><th data-sort="int">Amount</th><th data-sort="string">Status</th><th data-sort="string">Source</th><th data-sort="string">Charge Id</th><th data-sort="string">Check</th>
		</tr></thead>
		<tbody><?php
		foreach ($data as $row) {
			if ($row['status'] != 'failed') {
				$virtuous = $row['virtuous'];
				$forms = $row['forms'];
				if ($row['type'] == 'paypal') {
					$link = 'https://www.paypal.com/activity/payment/'.$row['transaction_id'];
				/*} elseif ($row['payment_intent']) {
					$link = 'https://dashboard.stripe.com/payments/'.$row['payment_intent'];
				} elseif ($row['customer']) {
					$link = 'https://dashboard.stripe.com/customers/'.$row['customer'];*/
				} else {
					$link = 'https://dashboard.stripe.com/payments/'.$row['id'];
					//metadata->Email, metadata->Url, metdata->Page, metdata->First Name, Last Name, Entry
				}
				$formsname = $forms && ($forms->firstname || $forms->lastname) ? $forms->firstname . ' ' . $forms->lastname : '';
				echo '<tr>
					<td data-sort-value="'.$row['created'].'">'.($forms&&$forms->form_id?'<a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$forms->form_id.'&lid='.$forms->entry_id).'" target="_blank">':'').date('Y-m-d',$row['created']).($forms?'</a>':'').'</td>
					<td data-sort-value="'.($forms&&$forms->form_id?$forms->form_id:'0').'">'.($forms&&$forms->form_id?'<a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$forms->form_id.'&lid='.$forms->entry_id).'" target="_blank">':'').$forms->entry_id.($forms?'</a>':'').'</td>
					<td>'.self::link_name($row['billing_details']['email'],$row['billing_details']['name']).'</a></td>
					<td>'.($virtuous?'<a href="https://app.virtuoussoftware.com/Generosity/Gift/View/'.$virtuous->id.'" target="_blank">'.$virtuous->contactName.'</a>':'-').'</td>
					<td data-sort-value="'.$row['amount'].'">$'.self::number_format($row['amount']/100,2).'</td>
					<td>'.$row['status'].'</td>
					<td>'.($forms?($forms->page_full?'<a href="'.$forms->page_full.'" target="_blank">'.$forms->page_full.'</a>':$forms->description):'').'</td>
					<td><a href="'.$link.'" target="_blank">'.$row['id'].'</a></td>
					<td>'.GFAnalytics::check_last($virtuous?$virtuous->contactName:'', $row['billing_details']['name'], $formsname, '-').'</td>
				</tr>';
			}
		}
		?></tbody>
		</table><?php
	}
	public static function analytics_reconcile() {
		$types = array(
			'' => 'Stripe',
			'paypal' => 'PayPal'
		);
		$months = array(
			'' => 'Recent'
		);
		$map = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$start = intval(date('m')) - 1;
		$start = $start < 0 ? 11 : $start;
		for ($i=$start+12; $i>=0; $i--) {
			$month = $i < 12 ? $map[$i] : $map[$i-12];
			$months[strtolower($month)] = $month;
		}
		echo '<h2 id="gfa_filters">Reconcile | ';
		echo self::select($types, 'type').' | ';
		echo self::select($months, 'period').' | ';
		echo '<button onclick="exportCSV();">Export .csv</button>
		</h2>';
		$startend = GFAnalytics::start_end();
		$start = $startend['start'];
		$end = $startend['end'];
		$reconcile = GFAnalytics::reconcile_both($start, $end, UtilsLib::get('type'));
		$missing = $reconcile['missing'];
		$matched = $reconcile['matched'];
		self::reconcile_table($missing, 'Missing In Virtuous');
		self::reconcile_table($matched, 'Matched');
	}
	public static function analytics_tags() {
		$tags = GFAnalytics::virtuous_tags();
		$list = array('' => '(Tag)');
		$name = '';
		$id = UtilsLib::get('id');
		$report = UtilsLib::get('report');
		foreach ($tags as $tag) {
			$list[''.$tag->id] = $tag->tagName;
			if ($tag->id == $id) {
				$name = $tag->tagName;
			}
		}
		$reports = array('' => 'Month', 'year' => 'Year');
		echo '<h2 id="gfa_filters">Reports | ';
		echo self::select($list, 'id');
		echo ' | '. self::select($reports, 'report');
		if (isset($id)) {
		echo ' | <button onclick="exportCSV();">Export .csv</button>';
		}
		echo '</h2>';

		if (isset($id)) {
			$customers = GFAnalytics::group_gifts($id, $name, $report);
			$year = date('Y');
			$last = ''.(intval(date('Y'))-1);
			if ($report == 'year') {
				?>
				<table class="widefat striped gfa_sort">
				<thead>
					<tr><th data-sort="string">Customer</th><th data-sort="string">Email</th><th data-sort="int">This Year</th><th data-sort="int">Last Year</th></tr>
				</thead>
				<tbody>
				<?php
				$allyear = array('total'=>0, 'count'=>0);
				$alllast = array('total'=>0, 'count'=>0);
				foreach ($customers as $customer) {
					$allyear['count'] = $allyear['count'] + $customer[''.$year.'_count'];
					$allyear['total'] = $allyear['total'] + $customer[''.$year.'_total'];
					$alllast['count'] = $alllast['count'] + $customer[''.$last.'_count'];
					$alllast['total'] = $alllast['total'] + $customer[''.$last.'_total'];
				?>
					<tr>
						<td><a href="https://app.virtuoussoftware.com/Generosity/Contact/View/<?php echo $customer['id']; ?>" target="_blank"><?php echo $customer['name']; ?></a></td>
						<td><a href="<?php echo admin_url('admin.php?page='.self::$PREFIX.'&view=customer&customer='.urlencode($customer['email'])); ?>"><?php echo $customer['email']; ?></a></td>
						<td data-sort-value="<?php echo $customer[''.$year.'_total']; ?>"><?php echo $customer[''.$year.'_count'] == 0 ? '-' : '$'.self::number_format($customer[''.$year.'_total'],2); ?></td>
						<td data-sort-value="<?php echo $customer[''.$last.'_total']; ?>"><?php echo $customer[''.$last.'_count'] == 0 ? '-' : '$'.self::number_format($customer[''.$last.'_total'],2); ?></td>
					</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<tr>
					<td></td>
					<td>Total:</td>
					<td><?php echo $allyear['count'] == 0 ? '-' : '$'.self::number_format($allyear['total'],2); ?></td>
					<td><?php echo $alllast['count'] == 0 ? '-' : '$'.self::number_format($alllast['total'],2); ?></td>
				</tr>
				</foot>
				</table>
				<?php
			} else {
				?>
				<table class="widefat striped gfa_sort gfa_doublerrow">
				<thead>
					<tr>
						<th data-sort="string">Customer</th>
						<th data-sort="int">Year</th>
						<th data-sort="int">January</th>
						<th data-sort="int">February</th>
						<th data-sort="int">March</th>
						<th data-sort="int">April</th>
						<th data-sort="int">May</th>
						<th data-sort="int">June</th>
						<th data-sort="int">July</th>
						<th data-sort="int">August</th>
						<th data-sort="int">September</th>
						<th data-sort="int">October</th>
						<th data-sort="int">November</th>
						<th data-sort="int">December</th>
						<th data-sort="int">Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i = 0;
				$totallast = array('1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0);
				$totalyear = array('1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0);
				while ($i < count($customers)) {
					$customerlast = $customers[$i];
					$customeryear = $customers[$i+1];
				?>
					<tr>
						<td data-sort-value="<?php echo $customerlast['name']; ?>"><a href="https://app.virtuoussoftware.com/Generosity/Contact/View/<?php echo $customerlast['id']; ?>" target="_blank"><?php echo $customerlast['name']; ?></a></td>
						<td data-sort-value="<?php echo $last; ?>"><?php echo $last; ?></td>
						<?php
						$totallast['total'] = $totallast['total'] + $customerlast['total'];
						for ($m=1; $m<=12; $m++) {
							$month = ''.$m;
							$totallast[$month] = $totallast[$month] + $customerlast[$month];
							
							echo '<td data-sort-value="'.$customerlast[''.$month].'">'.
								($customerlast[''.$month] == 0 ? '-' : '$'.self::number_format($customerlast[''.$month],2))
							.'</td>';
						} ?>
						<td data-sort-value="<?php echo $$customerlast['total']; ?>"><?php echo $customerlast['total'] == 0 ? '-' : '$'.self::number_format($customerlast['total'],2); ?></td>
					</tr>
					<tr>
						<td data-sort-value="<?php echo $customeryear['name']; ?>"><a href="<?php echo admin_url('admin.php?page='.self::$PREFIX.'&view=customer&customer='.urlencode($customeryear['email'])); ?>"><?php echo $customeryear['email'] ? '('.$customeryear['email'].')' : ''; ?></a></td>
						<td data-sort-value="<?php echo $year; ?>"><?php echo $year; ?></td>
						<?php
						$totalyear['total'] = $totalyear['total'] + $customeryear['total'];
						for ($m=1; $m<=12; $m++) {
							$month = ''.$m;
							$totalyear[$month] = $totalyear[$month] + $customeryear[$month];
							echo '<td data-sort-value="'.$customeryear[$month].'">'.
								($customeryear[$month] == 0 ? '-' : '$'.self::number_format($customeryear[$month],2))
							.'</td>';
						} ?>
						<td data-sort-value="<?php echo $$customeryear['total']; ?>"><?php echo $customeryear['total'] == 0 ? '-' : '$'.self::number_format($customeryear['total'],2); ?></td>
					</tr>
				<?php 
					$i += 2;
				} ?>
				</tbody>
				<tfoot>
					<tr>
						<td>Total:</td>
						<td><?php echo $last; ?></td>
						<?php for ($m=1; $m<=12; $m++) {
							echo '<td>$'.self::number_format($totallast[''.$m],2).'</td>';
						} ?>
						<td>$<?php echo self::number_format($totallast['total'],2); ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $year; ?></td>
						<?php for ($m=1; $m<=12; $m++) {
							echo '<td>$'.self::number_format($totalyear[''.$m],2).'</td>';
						} ?>
						<td>$<?php echo self::number_format($totalyear['total'],2); ?></td>
					</tr>
				</tfoot>
				</table>
				<?php
			}
		}
	}
	public static function analytics_campaigns() {
		$campaigns = GFAnalytics::virtuous_campaigns();
		$list = array('' => '(Campaign)');
		$name = '';
		$id = UtilsLib::get('id');
		$report = UtilsLib::get('report');
		foreach ($campaigns as $campaign) {
			$list[''.$campaign->campaignId] = $campaign->name;
			if ($campaign->campaignId == $id) {
				$name = $campaign->name;
			}
		}
		$reports = array('' => 'Campaign', 'customer' => 'Customer');
		echo '<h2 id="gfa_filters">Reports | ';
		echo self::select($list, 'id');
		if (isset($id)) {
			echo ' | '. self::select($reports, 'report');
			echo ' | <button onclick="exportCSV();">Export .csv</button>';
		}
		echo '</h2>';
		
		if (isset($id)) {
			if ($report == 'customer') {
				$results = GFAnalytics::campaign_gifts($id, $name, $report);
				$customers = $results['customers'];
				$segments = $results['segments'];
				?>
				<table class="widefat striped gfa_sort gfa_table">
				<thead><tr>
					<th data-sort="string">Name</th>
					<?php foreach ($segments as $segment) {
						echo '<th data-sort="int">'.esc_html($segment).'</th>';
					} ?>
				</thead>
				<tbody>
					<?php foreach ($customers as $customer) { ?>
					<tr>
						<td data-sort-value="<?php echo esc_html($customer['name']); ?>">
							<a href="https://app.virtuoussoftware.com/Generosity/Contact/View/<?php echo $customer['id']; ?>" target="_blank"><?php echo esc_html($customer['name']); ?></a><br />
							<a href="<?php echo admin_url('admin.php?page='.self::$PREFIX.'&view=customer&customer='.urlencode($customer['email'])); ?>"><?php echo esc_html($customer['email']); ?></a>
						</td>
						<?php foreach ($segments as $segment) { ?>
							<td data-sort-value="<?php echo $customer[$segment]?$customer[$segment]:0; ?>">$<?php echo self::number_format($customer[$segment],2); ?></td>
						<?php } ?>
					</tr>
					<?php } ?>
				</tody>
				</table>
			<?php
			} else {
				$segments = GFAnalytics::campaign_gifts($id, $name, $report);
				?>
				<table class="widefat striped gfa_sort gfa_table">
					<thead><tr><th data-sort="string">Name</th><th data-sort="int">Total</th><th data-sort="int">Payments</th><th data-sort="int">Average</th></tr></thead>
					<tbody>
					<?php foreach ($segments as $segment) { ?>
					<tr>
						<td><?php echo $segment['name']; ?></td>
						<td data-sort-value="<?php echo $segment['total']; ?>">$<?php echo self::number_format($segment['total'],2); ?></td>
						<td data-sort-value="<?php echo $segment['count']; ?>"><?php echo self::number_format($segment['count']); ?></td>
						<td data-sort-value="<?php echo $segment['average']; ?>">$<?php echo self::number_format($segment['average'],2); ?></td>
					</tr>
					<?php }?>
					</tbody>
				</table>
				<?php
			}
		} elseif (count(GFStripeExtensions::get_campaigns()) > 0) {
			$gifts = GFAnalytics::campaign_summary();
			?>
			<table class="widefat striped gfa_table">
				<thead>
					<tr><th>Campaign</th><th>Last Month</th><th>This Month</th></tr>
				</thead>
				<tbody>
			<?php
			foreach ($gifts as $campaign => $value) {
					echo '<tr><td>'.$campaign.'</td><td>$'.self::number_format($value['previous']).'</td><td>$'.self::number_format($value['current']).'</td></tr>';
			} ?>
				</tbody>
			</table>
			<?php
		}
	}
	public static function analytics_customer() {
		?>
		<h1>Customer</h1>
		<?php
		$email = strtolower(UtilsLib::get('customer'));
		$customer = GFAnalytics::customer($email);

		//Merge to populate as many fields as we can
		$first = new stdClass();
		$first->email = $email;
		if ($customer && count($customer) > 0) {
			$object = new ReflectionObject($customer[0]);
			$properties = $object->getProperties();
			foreach($properties as $property) {
				$key = $property->getName();
				$first->$key = $customer[0]->$key;
			}
			foreach ($customer as $transaction) {
				$object = new ReflectionObject($transaction);
				$properties = $object->getProperties();
				foreach($properties as $property) {
					$key = $property->getName();
					if ($first->$key == '' || $first->$key == null) {
						$first->$key = $transaction->$key;
					}
				}
			}
			$first->name = GFAnalytics::customer_name($first);
		}

		//Virtuous
		$seach = null;
		$records = 50;
		if (GFStripeExtensions::get_option('virtuous-token')) {
			$search = GFStripeExtensions::virtuous('/Contact/Search',json_encode(array('search'=>$email)),'POST');
			$virtuous = $search && $search->list && count($search->list) > 0;
			if ($virtuous) {
				$summary = $search->list[0];
				$id = $summary->id;
				if ($summary->phone) {
					$first->phone = $summary->phone;
				}

				$contact = GFStripeExtensions::virtuous('/Contact/'.$id);
				$address = $contact->address;
				if ($address) {
					$first->address1 = $address->address1;
					$first->address2 = $address->address2;
					$first->city = $address->city;
					$first->state = $address->state;
					$first->zip = $address->postal;
					$first->country = $address->country;
				}
				if ($contact->name) {
					$first->name = $contact->name;
				}
				
				$tags = GFStripeExtensions::virtuous('/ContactTag/ByContact/'.$id);
				$giving = GFStripeExtensions::virtuous('/Gift/ByContact/'.$id,array(
					'sortBy' => 'GiftDate',
					'descending' => 'true',
					'take' => $records
				));
				$pledges = GFStripeExtensions::virtuous('/v2/Pledge/ByContact/'.$id,array(
					'sortBy' => 'CreatedDateTime',
					'descending' => 'true',
					'take' => $records
				));
			}
		}
		
		?>
		<table class="gfa_table"><tr>
			<td>
				<table class="gfa_address">
					<tr><th>Name</th><td><?php echo ($virtuous?'<a href="https://app.virtuoussoftware.com/Generosity/Contact/View/'.$id.'" target="_blank">':'').$first->name.($virtuous?'</a>':''); ?></td></tr>
					<tr><th>Email</th><td><a href="mailto:<?php echo $first->email; ?>"><?php echo $first->email; ?></a></td></tr>
					<tr><th>Phone</th><td><a href="tel:<?php echo (strpos($first->phone,'+') === 0 ? '' : '+1') . str_replace(' ', '', str_replace('-', '', $first->phone)); ?>"><?php echo $first->phone; ?></a></td></tr>
					<tr><th>Address</th><td><?php
						echo self::address_field($first->address1);
						echo self::address_field($first->address2);
						echo self::address_field($first->city);
						echo self::address_field($first->state.' '.$first->zip);
						echo self::address_field($first->country);
					?></td></tr>
					<?php
					if ($virtuous) {
						echo '<tr><th>Total</th><td>'.$contact->lifeToDateGiving.'</td></tr>';
						echo '<tr><th>Year to Date</th><td>'.$contact->yearToDateGiving.'</td></tr>';
					}
					?>
				</table>
			</td>
			<td>
				<h2>Pledges</h2>
				<?php if ($virtuous) {
					$pledges = $pledges->list;
					foreach ($pledges as $pledge) {
						if ($pledge->status != 'Cancelled') {
							echo '<a href="https://app.virtuoussoftware.com/Generosity/Pledge/View/'.$pledge->id.'" target="_blank">$'.self::number_format($pledge->amountPledged).' ('.substr($pledge->pledgeDate,0,10).')</a><br />';
						}
					}
				} ?>
			</td>
			<td>
				<h2>Virtuous Tags</h2>
				<?php if ($virtuous) {
					$list = $tags->list;
					foreach ($list as $tag) {
						echo $tag->name ."<br />\n";
					}
				} ?>
			</td>
			<td style="padding:0 10px;font-size: 14px;line-height: 20px;">
				<h2>Mailing Lists</h2>
				<?php
				$activities = null;
				if (GFStripeExtensions::get_option('getresponse-apikey') != '') {
					//TODO: Could get customer engagements for each list
					//https://apireference.getresponse.com/#operation/getContactById
					$campaigns = GFAnalytics::getresponse('/campaigns');
					$ids = array();
					foreach($campaigns as $campaign) {
						$ids[] = $campaign->campaignId;
					}
					$json = '{
						"subscribersType": [
							"subscribed"
						],
						"sectionLogicOperator": "or",
						"section": [
							{
								"campaignIdsList": '.json_encode($ids).',
								"subscriberCycle": [
									"receiving_autoresponder",
									"not_receiving_autoresponder"
								],
								"subscriptionDate": "all_time",
								"logicOperator": "and",
								"conditions": [
										{
											"conditionType": "email",
											"operatorType": "string_operator",
											"operator": "is",
											"value": "'.$email.'"
										}
									]
							}
						]
					}';
					$lists = GFAnalytics::getresponse('/search-contacts/contacts', $json, 'POST');
					$contactid = null;
					foreach ($lists as $list) {
						$contactid = $list->contactId;
						echo $list->campaign->name ."<br />\n";
					}
					if ($contactid) {
						$activities = GFAnalytics::getresponse('/contacts/'.$contactid.'/activities');
					}
				}
				?>
			</td>
		</tr></table>
		<?php
		if ($activities && count($activities) > 0) {
			$normalized = array();
			foreach ($activities as $activity) {
				$aid = $activity->resource->resourceId;
				if ($normalized[$aid]) {
					if ($activity->activity == 'send') {
						$normalized[$aid]['send'] == $normalized[$aid]['send'] + 1;
					}
					if ($activity->activity == 'open') {
						$normalized[$aid]['open'] == $normalized[$aid]['open'] + 1;
					}
					if ($activity->activity == 'click') {
						$normalized[$aid]['click'] == $normalized[$aid]['click'] + 1;
						$normalized[$aid]['link'] = $activity->clickTrack->url;
					}
				} else {
					$normalized[$aid] = array(
						'send' =>  1,
						'open' =>  $activity->activity == 'open' || $activity->activity == 'click' ? 1 : 0,
						'click' =>  $activity->activity == 'click' ? 1 : 0,
						'date' => substr($activity->createdOn, 0, 10),
						'subject' => $activity->subject,
						'link' => $activity->activity == 'click' ? $activity->clickTrack->url : null
					);
				}
			}
			echo '
			<h2>Recent Emails</h2>
			<table class="widefat striped">
			<thead><tr><th>Date</th><th>Title</th><th>Send</th><th>Open</th><th>Click</th></tr></thead>
			<tbody>
			';
			$format = 'j M Y';
			foreach ($normalized as $aid => $normal) {
				echo '<tr>
					<td><a target="_blank" href="https://'.(GFAnalytics::getresponse_site()).'/statistics/newsletters/'.$aid.'/summary">'.$normal['date'].'</a></td>
					<td>'.($normal['link']?'<a target="_blank" href="'.$normal['link'].'">'.$normal['subject'].'</a>':$normal['subject']).'</td>
					<td>'.self::number_format($normal['send']).'</td>
					<td>'.self::number_format($normal['open']).'</td>
					<td>'.self::number_format($normal['click']).'</td>
				</tr>';
			}
			echo '</tbody></table><br />';
		}
		
		?>
		<?php
		if ($first->phone && GFStripeExtensions::get_option('microsoft-clientid')) {
			$timezone = get_option('gmt_offset');
			echo '<h2>Recent Calls</h2>
			<table class="widefat striped gfa_virtuous gfa_sort">
				<thead><tr><td>Date</td><td>Time (GMT'.$timezone.')</td><td>Contact</td><td>Number</td><td>In/Out</td><td>Length</td></tr><thead>
				<tbody>';
			$phone = str_replace(')','',str_replace('(','',str_replace(' ','',str_replace('-','',$first->phone)))); //TODO: Replace +, replace leading 0?
			$calls = self::get_calls();
			foreach ($calls as $call) {
				$outbound = $call->callType == 'user_out';
				$number = $outbound ? $call->calleeNumber : $call->callerNumber;
				if (strpos($number, $phone) !== false) {
					//https://stackoverflow.com/questions/14849446/php-parse-date-in-iso-format
					//$datetime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $call->startDateTime);
					$datetime = DateTime::createFromFormat('Y-m-d\TH:i:s+', $call->startDateTime);
					$datetime->setTimezone(new DateTimeZone($timezone));
					$seconds = $call->duration;
					$hours = floor($seconds / 3600);
					$mins = floor($seconds / 60 % 60);
					$secs = floor($seconds % 60);
					echo '<tr><td>'.date_format($datetime, 'Y-m-d').'</td><td>'.date_format($datetime, 'g:ia').'</td><td><a href="mailto:'.$call->userPrincipalName.'">'.$call->userDisplayName.'</a></td><td><a href="tel:'.$number.'">'.$number.'</a></td><td>'.($outbound?'Outbound':'Inbound').'</td><td>'.sprintf('%02d:%02d:%02d', $hours, $mins, $secs).'</td></tr>';
				}
			}
			echo '</tbody></table>';
		}
		?>

		<h2>Gravity Forms Entries</h2>
		<?php self::customer_table($customer, false);
		if ($virtuous) {
		?>
		<br />
		<h2>Virtuous Payments</h2>
		<table class="widefat striped gfa_virtuous gfa_sort">
			<thead><tr>
				<th data-sort="int">Date</th>
				<th data-sort="int" class="gfa_align_right">Total</th>
				<th data-sort="string">Type</th>
			</tr></thead>
			<tbody>
			<?php
			$giving = $giving->list;
			foreach ($giving as $gift) {
				$amount = floatval(substr(str_replace(',','',$gift->amount),1));
				$date = strtotime($gift->giftDate);
				echo '<tr>
					<td class="gfa_nowrap" data-sort-value="'.$date.'"><a href="https://app.virtuoussoftware.com/Generosity/Gift/View/'.$gift->id.'" target="_blank">'.date("Y-m-d", $date).'</a></td>
					<td class="gfa_align_right" data-sort-value="'.$amount.'">'.$gift->amount.'</td>
					<td class="gfa_nowrap">'.$gift->giftType.'</td>
				</tr>';
			} ?>
			</tbody>
		</table>
		<?php
		}	
	}
	
	public static function link_customer($customer) {
		return self::link_name($customer->email, GFAnalytics::customer_name($customer));
	}
	public static function link_name($email = null, $name = null) {
		$adminurl = admin_url('admin.php?page='.self::$PREFIX);
		$name = $name != '' ? $name : ($email?$email:'(Customer)');
		if ($email && $email != '') {
			$name = '<a href="'.$adminurl.'&view=customer&customer='.urlencode($email).'">'.trim($name).'</a>';
		}
		return $name;
	}
	public static function city_state($city, $state) {
		return $city . ($state == '' || $state == null ? '' : ', '.$state);
	}
	public static function address_field($value) {
		return $value == '' || $value == null ? '' : $value . "<br />\n";
	}
	public static function select($list, $param) {
		$current = UtilsLib::get($param);
		$html = '<select data-param="'.$param.'" onchange="selectFilters();">';
		foreach ($list as $key => $name) {
			$html .= '<option value="'.$key.'"'.($key==$current?' selected="selected"':'').'>'.$name.'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	public static function get_calls() {
		$key = '/communications/callRecords/getPstnCalls(fromDateTime='.date("Y-m-d", strtotime("-1 months")).',toDateTime='.date("Y-m-d").')';
		$json = GFStripeExtensions::microsoft_graph($key, array(), 'GET', $key);
		return array_reverse($json->value);
	}
	public static function analytics_calls() {
		//Get calls
		$calls = self::get_calls();
		$prefix = '+1';
		$numbers = array();
		foreach ($calls as $call) {
			$outbound = $call->callType == 'user_out';
			$number = $outbound ? $call->calleeNumber : $call->callerNumber;
			if (strpos($number, $prefix) === 0) {
				$numbers[$number] = self::convert_number($number);
			}
		}
		if (count($numbers) > 0) {
			$json = '{"groups": [';
			foreach ($numbers as $number) {
				$json .= '{
					"conditions": [
						{
							"parameter": "Phone Number",
							"operator": "Is",
							"value": "'.$number.'"
						}
					]
				},';
			}
			$json .= ']}';
			$url = '/Contact/Query?take=1000';
			$contacts = GFStripeExtensions::virtuous($url,$json,'POST',$url.'&calls=true');
			$contacts = $contacts->list;
		}
		$timezone = get_option('gmt_offset');
		echo '<h2>Recent Calls</h2>
			<table class="widefat striped gfa_virtuous gfa_sort">
				<thead><tr><td>Date</td><td>Time (GMT'.$timezone.')</td><td>Contact</td><td>Number</td><td>Customer</td><td>In/Out</td><td>Length</td></tr><thead>
				<tbody>';
		$phone = str_replace(')','',str_replace('(','',str_replace(' ','',str_replace('-','',$first->phone)))); //TODO: Replace +, replace leading 0?
		$calls = self::get_calls();
		//print_r($contacts);
		foreach ($calls as $call) {
			$outbound = $call->callType == 'user_out';
			$number = $outbound ? $call->calleeNumber : $call->callerNumber;
			//$convert = self::convert_number($number);
			$virtuous = null;
			if ($contacts) {
				foreach ($contacts as $contact) {
					$convert = str_replace(' ','',str_replace('-','',$contact->phone));
					if (strpos($number, $convert) !== false) {
						$virtuous = $contact;
						break;
					}
				}
			}
			//https://stackoverflow.com/questions/14849446/php-parse-date-in-iso-format
			//$datetime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $call->startDateTime);
			$datetime = DateTime::createFromFormat('Y-m-d\TH:i:s+', $call->startDateTime);
			$datetime->setTimezone(new DateTimeZone($timezone));
			$seconds = $call->duration;
			$hours = floor($seconds / 3600);
			$mins = floor($seconds / 60 % 60);
			$secs = floor($seconds % 60);
			echo '<tr><td>'.date_format($datetime, 'Y-m-d').'</td><td>'.date_format($datetime, 'g:ia').'</td><td><a href="mailto:'.$call->userPrincipalName.'">'.$call->userDisplayName.'</a></td>';
			echo '<td><a href="+tel:'.$number.'">'.$number.'</a></td>';
			echo '<td>'.($virtuous ? '<a href="'.admin_url('admin.php?page='.self::$PREFIX.'&view=customer&customer='.urlencode($virtuous->email)).'">'.$virtuous->contactName.'</a>' : '').'</td>';
			echo '<td>'.($outbound?'Outbound':'Inbound').'</td><td>'.sprintf('%02d:%02d:%02d', $hours, $mins, $secs).'</td></tr>';
		}
		echo '</tbody></table>';
		
	}
	public static function convert_number($number) {
		$prefix = '+1';
		$number = str_replace($prefix, '', $number);
		return substr($number, 0, 3).'-'.substr($number, 3, 3).'-'.substr($number, 6);
	}
	public static function analytics_customers() {
		$customers = GFAnalytics::get_customers();
		$descriptions = array('' => 'Description');
		$unsorted = array();
		foreach ($customers as $customer) {
			$unsorted[$customer->description] = $customer->description;
		}
		ksort($unsorted);
		$descriptions = array_merge($descriptions, $unsorted);
		$customers = GFAnalytics::filter_description($customers);
		$status = array(
			'' => 'Status',
			'Yes' => 'New',
			'No' => 'Existing'
		);
		?>
		<h2 id="gfa_filters">Filters
		 | <?php echo self::select(GFAnalytics::dates(), 'period'); ?>
		 | <?php echo self::select(GFAnalytics::states(), 'state'); ?>
		 | <?php echo self::select(GFAnalytics::types(), 'type'); ?>
		<?php echo GFStripeExtensions::get_option('virtuous-token') ? ' | ' . self::select($status, 'status') : ''; ?>
		 | <?php echo self::select($descriptions, 'description'); ?>
		 | <button onclick="exportCSV();">Export .csv</button>
		 | <button onclick="recurringCSV();">Recurring .csv</button>
		</h2>
		<script>
		var gfa_customer_index = 0;
		var gfa_customers = [];
		function check_all_customers() {
			gfa_customer_index = 0;
			gfa_customers = [];
			var rows = jQuery('.gfa_customers tbody tr');
			for (var i=0; i<rows.length; i++) {
				var tr = jQuery(rows[i]);
				var a = tr.children('.gfa_check').children('a');
				gfa_customers.push({
					a: a,
					id: tr.attr('data-id'),
					email: tr.attr('data-email')
				});
			};
			check_callback();
		}
		function check_callback() {
			var i = gfa_customer_index++;
			console.log(i);
			if (i < gfa_customers.length) {
				var customer = gfa_customers[i];
				check_customer(customer['a'], customer['id'], customer['email'], check_callback);
			}
		}
		function check_customer(element, entry_id, email, next) {
			var a = jQuery(element);
			if (!next || a.html() == '(Check)') {
				//var td = a.parent();
				var url = '/wp-json/gf-stripe-extensions/v1/check_customer?apikey=' + analyticskey + '&entry_id=' + entry_id + '&email=' + encodeURIComponent(email);
				jQuery.ajax({
					url : url,
					type : 'GET',
					processData: false,  // tell jQuery not to process the data
					contentType: false,  // tell jQuery not to set contentType
					success : function(response) {
						if (response == '0' || response.error !== undefined) {
							console.log(response.error);
							error && error(response);
						} else {
							a.html(response);
							next && next();
						}
					},
					error: function(error) {
						console.log(error);
					}
				});
			} else {
				next && next();
			}
		}
		</script>
		<?php
		self::customer_table($customers);
	}
	public static function transaction_link($row) {
		$link = '';
		$id = '';
		if ($row->payment_method == 'paypal') {
			if ($row->transaction_id) {
				$id = $row->transaction_id;
			$link = 'https://www.paypal.com/activity/payment/'.$id;
			} elseif ($row->original_id) {
				$id = $row->original_id;
				//$link = 'https://www.paypal.com/billing/subscriptions/'.$id;
				$link = 'https://www.paypal.com/activities/?fromDate='.date('Y-m-d', strtotime('-1 year')).'&toDate='.date('Y-m-d').'&searchType=ANY&searchKeyword='.$id.'&transactiontype=ALL_TRANSACTIONS&archive=ACTIVE_TRANSACTIONS';
			}
		} else {
			$id = $row->transaction_id ? $row->transaction_id : $row->original_id;
			if ($id) {
				if (strpos($id, 'sub_') === 0) {
					$link = 'https://dashboard.stripe.com/subscriptions/'.$id;	
				} else {
					$link = 'https://dashboard.stripe.com/payments/'.$id;
				}
			}
		}
		return $link == '' ? '' : '<a href="'.$link.'" target="_blank">'.$id.'</a>';
	}
	public static function customer_table($results, $link = true) {
		$virtuous = GFStripeExtensions::get_option('virtuous-token');
		echo '
			<table class="widefat striped gfa_customers gfa_sort">
				<thead><tr>
					<th data-sort="int">Date</th>
					<th data-sort="int">Entry</th>
					<th data-sort="string">Customer</th>
					<th data-sort="string">Location</th>
					<th data-sort="int" class="gfa_align_right">Total</th>
					<th data-sort="int" class="gfa_align_right">Length</th>
					<!--<th data-sort="string" class="gfa_align_center">Recurring</th>-->
					<th class="gfa_align_right">Method</th>
					<th data-sort="string">Source</th>
					<th data-sort="string">URL</th>
					'.($link && $virtuous?'<th><a href="#" onclick="check_all_customers()">New?</a.</th>':'').'
					<th data-sort="int">Transaction</th>
				</tr></thead>
				<tbody>';
		$adminurl = admin_url('admin.php?page='.self::$PREFIX);
		$timezone = get_option('gmt_offset');
		foreach ($results as $result) {
			$rowdate = new DateTime('now', new DateTimeZone($timezone));
			$rowdate->setTimestamp(intval($result->created));
			echo '<tr data-id="'.$result->entry_id.'" data-email="'.$result->email.'">
				<td class="gfa_nowrap" data-sort-value="'.$result->last_payment.'"><a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$result->form_id.'&lid='.$result->entry_id).'" target="_blank">'.$rowdate->format("Y-m-d").'</a></td>
				<td class="gfa_nowrap" data-sort-value="'.$result->last_payment.'"><a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$result->form_id.'&lid='.$result->entry_id).'" target="_blank">'.$result->entry_id.'</a></td>
				<td class="gfa_nowrap">'.self::link_customer($result).'</td>
				<td class="gfa_nowrap">'.self::city_state($result->city, $result->state).'</td>
				<td class="gfa_align_right" data-sort-value="'.$result->amount.'">$'.self::number_format($result->amount, 2).'</td>
				<td class="gfa_align_right" data-sort-value="'.($result->recurring?$result->count:0).'">'.($result->count==0||!$result->recurring?'-':self::number_format($result->count)).'</td>
				<!--<td class="gfa_align_center">'.($result->recurring?'✓':'-').'</td>-->
				<td class="gfa_nowrap gfa_align_right">'.$result->payment_method.'</td>
				<td>'.($link?'<a href="#" onclick="descriptionClick(\''.esc_html(addslashes($result->description)).'\');">':'').$result->description.($link?'</a>':'').'</td>
				<td><a href="'.$result->source_url.'" target="_blank">'.$result->page_full.'</a></td>
				'.($link && $virtuous?'<td class="gfa_check"><a onclick="check_customer(this, '.$result->entry_id.', \''.$result->email.'\');">'.($result->new_customer==''?'(Check)':$result->new_customer).'</a></td>':'').'
				<td>'.self::transaction_link($result).'</td>
			</tr>';
		}
		echo '
				</tbody>
			</table>
		';
	}
	public static function estimate_recurring($filtered, $now, $start, $end) {
		$timezone = get_option('gmt_offset');
		$currentyear = $now < $end;
		$time = $currentyear ? $now : $end;
		$startofmonth = new DateTime('now', new DateTimeZone($timezone));
		$startofmonth->setTimestamp($time);
		if (!$currentyear) {
			$startofmonth->modify('-1 month');
		}
		$startofmonth = strtotime(date('Y-m-1 00:00:00', $startofmonth->getTimestamp()).' '.$timezone);
		$endofmonth = new DateTime('now', new DateTimeZone($timezone));
		$endofmonth->setTimestamp($time);
		if ($currentyear) {
			$endofmonth->modify('+1 month');
		}
		$endofmonth = strtotime(date('Y-m-1 00:00:00', $endofmonth->getTimestamp()).' '.$timezone);

		$estimate = array('count' => 0, 'total' => 0);
		foreach ($filtered as $row) {
			if ($row->recurring && $row->date >= $startofmonth && $row->date <$endofmonth) {
				$estimate['count'] = $estimate['count'] + 1;
				$estimate['total'] = $estimate['total'] + $row->amount;
			}
		}
		return $estimate;
	}
	public static function analytics_transactions() {
		$grouptotal = GFStripeExtensions::get_option('analytics-total');
		$groupvalue = GFStripeExtensions::get_option('analytics-value');
		$source = UtilsLib::get('source');
		$filter = UtilsLib::get('field');
		$filtervalue = UtilsLib::get('value');
		$filtervalue = $filtervalue == '(Unknown)' ? '' : $filtervalue;

		$full_access = current_user_can(GFStripeExtensions::get_role());
		$timezone = get_option('gmt_offset');
		$period = GFAnalytics::period();
		$startend = GFAnalytics::start_end();
		$start = $startend['start'];
		$end = $startend['end'];
		$now = $startend['now'];

		$sourcegroup = $grouptotal;
		$pagegroup = $grouptotal;
		$referergroup = $grouptotal;
		$compare = null;
		
		$month = 3600*24*31;
		$isyear = $period == 'year' || is_numeric($period);
		if (($end-$start) < 26*60*60) { //26 because of daylight savings
			$internal = 'hour';
		} elseif ($isyear) {
			$internal = 'month';
		} elseif ((($end-$start)/$month) > 5) {
			$internal = 'month';
		} elseif ((($end-$start)/$month) > 2) {
			$internal = 'week';
		} else {
			$internal = 'day';
		}
		if ($period != 'week') {
			$mid = new DateTimeZone($timezone);
			$comparestart = new DateTime('now', new DateTimeZone($timezone));
			$comparestart->setTimestamp($start);
			$comparestart->modify('-1 year');
			$comparestart = $comparestart->getTimestamp();
			$compareend = new DateTime('now', new DateTimeZone($timezone));
			$compareend->setTimestamp($end);
			$compareend->modify('-1 year');
			if ($period == 'year') {
				$compareend->modify('+1 month');
			}
			//if ($period == 'custom') {
				//TODO: Maybe enable this if custom == month, but probably don't need to as it's probably only an issue on leap years.
			//	$compareend = strtotime(date('Y-m-01 00:00:00', $compareend->getTimestamp()).' '.$timezone);
			//} else {
				$compareend = strtotime(date('Y-m-d 00:00:00', $compareend->getTimestamp()).' '.$timezone);
			//}
			$compare = self::get_transactions($comparestart, $compareend);
		}

		$transactions = self::get_transactions($start, $end);
		$filtered = self::filter($transactions, $filter, $filtervalue);
		$comparefiltered = $compare ? self::filter($compare, $filter, $filtervalue) : array();
		$history = self::history($filtered, $start, $end, $internal);
		$comparehistory = $compare ? self::history($comparefiltered, $comparestart, $compareend, $internal) : array();
		
		$monthlyestimate = self::estimate_recurring($filtered, $now, $start, $end); //TODO: We could eventually keep track of this for a month view too
		$compareestimate = $compare ? self::estimate_recurring($comparefiltered, $now, $comparestart, $compareend) : 0;
		if ($isyear) {
			$endofmonth = new DateTime('now', new DateTimeZone($timezone));
			if ($now < $end) {
				$endofmonth->modify('+1 month');
			} else {
				$endofmonth->setTimestamp($end);
			}
			$endofmonth = strtotime(date('Y-m-1 00:00:00', $endofmonth->getTimestamp()).' '.$timezone);
			$stripe = class_exists('GFStripe') ? GFStripe::get_instance() : null;
			foreach ($filtered as $row) {
				if ($row->recurring) {
					$project = new DateTime('now', new DateTimeZone($timezone));
					$project->setTimestamp($row->date);
					$project->modify('+1 month');
					$project = $project->getTimestamp(); //This isn't shifted by timezone because it's the acutally date of the payment
					for ($i=0; $i<count($history); $i++) {
						$month = $history[$i];
						if ($project > $now && $project >= $month['start'] && $project < $month['end'] && $project < $endofmonth) {
							if ($stripe) {
								$entry = GFAPI::get_entry($row->entry_id);
								$feed = $stripe->get_payment_feed($entry);
								if ($feed) {
									$length = $feed['meta']['billingCycle_length'];
									$unit = $feed['meta']['billingCycle_unit'];
								}
							}
							$length = $length ? $length : 1;
							$unit = $unit ? $unit : 'month';
							if ($unit == 'day') {
								$scale = 365;
							} else if ($unit == 'week') {
								$scale = 52;
							} else if ($unit == 'month') {
								$scale = 12;
							} else {
								$scale = 1;
							}
							//Estimate monthly amount
							$amount = ($scale * $row->amount) / ($length * 12);
							$history[$i]['totalpro'] = $month['totalpro'] + 1;
							$history[$i]['amountpro'] = $month['amountpro'] + $amount;
							$monthlyestimate['count'] = $monthlyestimate['count'] + 1;
							$monthlyestimate['total'] = $monthlyestimate['total'] + $amount;
						}
					}
				}
			}
		}

		$oneoff = self::get_oneoff($transactions);
		$newsub = self::get_newsubscriptions($transactions);
		$recurr = self::get_recurring($transactions);

		$periodpayments = count($filtered);
		$periodamount = 0;
		foreach ($filtered as $transaction) {
			$periodamount += $transaction->amount;
		}
		$comparepayments = count($comparefiltered);
		$compareamount = 0;
		foreach ($comparefiltered as $transaction) {
			$compareamount += $transaction->amount;
		}
		
		$subscriptionlength = self::subscription_length($transactions);
		?><?php
		echo "
			<div id=\"gf_analytics\">
			<script>
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			var history = chartData();
			var sourceone = chartData();
			var sourcenew = chartData();
			var sourcerec = chartData();
			var pageone = chartData();
			var pagenew = chartData();
			var pagerec = chartData();
			function chartData() {
				return {
					chart: null,
					payments: null,
					amount: null,
					average: null,
					legend: null,
					compare: null
				};
			}
			function init() {
				history.legend = [";
				foreach ($history as $value) {
					echo "{start: '".$value['startdate']."', end: '".$value['enddate']."'},";
				}
				echo "];
				history.compare = [";
				foreach ($comparehistory as $value) {
					echo "{start: '".$value['startdate']."', end: '".$value['enddate']."'},";
				}
				echo "];
				history.payments = google.visualization.arrayToDataTable([
					['Period', 'Recurring', 'Projected', 'New Subscriptions', 'One Time'".($compare?", 'Previous'":"")."],
					";
					for ($i=0; $i<count($history); $i++) {
						$value = $history[$i];
						$extra = $compare ? ', ' . ($comparehistory[$i]['totalrec'] + $comparehistory[$i]['totalnew'] + $comparehistory[$i]['totalone']) : '';
						echo "[\"".$value['key']."\", ".
							$value['totalrec'].", ".
							$value['totalpro'].", ".
							$value['totalnew'].", ".
							$value['totalone'].
							$extra."],";
					}
					echo "
				]);
				history.amount = google.visualization.arrayToDataTable([
					['Period', 'Recurring', 'Projected', 'New Subscriptions', 'One Time'".($compare?", 'Previous'":"")."],
					";
					for ($i=0; $i<count($history); $i++) {
						$value = $history[$i];
						$extra = $compare ?  ', ' . ($comparehistory[$i]['amountrec'] + $comparehistory[$i]['amountnew'] + $comparehistory[$i]['amountone']) : '';
						echo "[\"".$value['key']."\", ".
							$value['amountrec'].", ".
							$value['amountpro'].", ".
							$value['amountnew'].", ".
							$value['amountone'].
							$extra."],";
					}
					echo "
				]);
				history.average = google.visualization.arrayToDataTable([
					['Period', 'Recurring', 'Projected', 'New Subscriptions', 'One Time'".($compare?", 'Previous'":"")."],
					";
					for ($i=0; $i<count($history); $i++) {
						$value = $history[$i];
						$extra = $compare ?  ', ' . round(
							self::check_number($comparehistory[$i]['totalrec'] ? $comparehistory[$i]['amountrec']/$comparehistory[$i]['totalrec'] : 0) +
							self::check_number($comparehistory[$i]['totalnew'] ? $comparehistory[$i]['amountnew']/$comparehistory[$i]['totalnew'] : 0) +
							self::check_number($comparehistory[$i]['totalone'] ? $comparehistory[$i]['amountone']/$comparehistory[$i]['totalone'] : 0)
						,2) : '';
						echo "[\"".$value['key']."\", ".
							round(self::check_number($value['totalrec'] ? ($value['amountrec']+$value['amountpro'])/($value['totalrec']+$value['totalpro']) : 0),2).", ".
							"0, ".
							round(self::check_number($value['totalnew'] ? $value['amountnew']/$value['totalnew'] : 0),2).", ".
							round(self::check_number($value['totalone'] ? $value['amountone']/$value['totalone'] : 0),2).
							$extra."],";
					}
					echo "
				]);
				sourceone.payments = ".self::pie_data($oneoff,'description',$sourcegroup)."
				sourcenew.payments = ".self::pie_data($newsub,'description',$sourcegroup)."
				sourcerec.payments = ".self::pie_data($recurr,'description',$sourcegroup)."
				pageone.payments = ".self::pie_data($oneoff,'page',$pagegroup)."
				pagenew.payments = ".self::pie_data($newsub,'page',$pagegroup)."
				pagerec.payments = ".self::pie_data($recurr,'page',$pagegroup)."

				sourceone.amount = ".self::pie_data($oneoff,'description',$sourcegroup,'amount')."
				sourcenew.amount = ".self::pie_data($newsub,'description',$sourcegroup,'amount')."
				sourcerec.amount = ".self::pie_data($recurr,'description',$sourcegroup,'amount')."
				pageone.amount = ".self::pie_data($oneoff,'page',$pagegroup,'amount')."
				pagenew.amount = ".self::pie_data($newsub,'page',$pagegroup,'amount')."
				pagerec.amount = ".self::pie_data($recurr,'page',$pagegroup,'amount')."

				sourceone.average = ".self::pie_data($oneoff,'description',$sourcegroup,'average')."
				sourcenew.average = ".self::pie_data($newsub,'description',$sourcegroup,'average')."
				sourcerec.average = ".self::pie_data($recurr,'description',$sourcegroup,'average')."
				pageone.average = ".self::pie_data($oneoff,'page',$pagegroup,'average')."
				pagenew.average = ".self::pie_data($newsub,'page',$pagegroup,'average')."
				pagerec.average = ".self::pie_data($recurr,'page',$pagegroup,'average')."
			}
			function drawPayments() {
				drawHistory(history.payments);
				drawSource(sourceone.payments, sourcenew.payments, sourcerec.payments, '(Payments)');
				drawPage(pageone.payments, pagenew.payments, pagerec.payments, '(Payments)');
				drawReferrer(pageone.payments, pagenew.payments, pagerec.payments, '(Payments)');
			}
			function drawAmount() {
				drawHistory(history.amount);
				drawSource(sourceone.amount, sourcenew.amount, sourcerec.amount, '(Amount)');
				drawPage(pageone.amount, pagenew.amount, pagerec.amount, '(Amount)');
				drawReferrer(pageone.amount, pagenew.amount, pagerec.amount, '(Amount)');
			}
			function drawAverage() {
				drawHistory(history.average);
				drawSource(sourceone.average, sourcenew.average, sourcerec.average, '(Average)');
				drawPage(pageone.average, pagenew.average, pagerec.average, '(Average)');
				drawReferrer(pageone.average, pagenew.average, pagerec.average, '(Average)');
			}
			function drawChart() {
				init();
				drawPayments();
				drawOther();
			}
			function drawHistory(data) {
				var options = {
					width: '100%',
					height: '100%',
					legend: { position: 'top', maxLines: 1 },
					seriesType: 'bars',
					bar: { groupWidth: '75%' },
					series: {
						0: {color: '#2980B9'},
						1: {color: '#5499C7'},
						2: {color: '#16A085'},
						3: {color: '#F4D03F'},
						4: {color: '#808B96', type: 'line'}
					},
					isStacked: true
				};
				history.chart = new google.visualization.ComboChart(document.getElementById('gfa_chart_recurring'));
				history.chart.draw(data, options);
				google.visualization.events.addListener(history.chart, 'select', historyClick);
			}
			function historyClick(e) {
				var selection = history.chart.getSelection();
				var date = selection[0].column == 5 ? history.compare[selection[0].row] : history.legend[selection[0].row];
				var field = queryParams('field');
				var value = queryParams('value');
				openPeriod(analyticsurl + '&period=custom' + (value?'&value='+encodeURIComponent(value):'') + '&start=' + date.start + '&end=' + date.end  + (field?'&field='+encodeURIComponent(field):''));
			}
			function drawSource(dataone, datanew, datarec, suffix) {
				drawPie('Recurring', 'gfa_chart_source_rec', datarec, false, 'description');
				drawPie('New Subscriptions', 'gfa_chart_source_new', datanew, false, 'description');
				drawPie('One Time '+suffix, 'gfa_chart_source_one', dataone, false, 'description');
				
			}
			function drawPage(dataone, datanew, datarec, suffix) {
				drawPie('Recurring '+suffix, 'gfa_chart_page_rec', datarec, false, 'page');
				drawPie('New Subscriptions '+suffix, 'gfa_chart_page_new', datanew, false, 'page');
				drawPie('One Time '+suffix, 'gfa_chart_page_one', dataone, false, 'page');
			}
			function drawReferrer(dataone, datanew, datarec, suffix) {
				drawPie('Recurring '+suffix, 'gfa_chart_referrer_rec', datarec, false, 'referrer');
				drawPie('New Subscriptions '+suffix, 'gfa_chart_referrer_new', datanew, false, 'referrer');
				drawPie('One Time '+suffix, 'gfa_chart_referrer_one', dataone, false, 'referrer');
			}
			function drawOther() {
				drawType();
				drawActive();
				drawLengthSource();
				drawLengthPage()
			}
			function drawType() {
				".self::output_pie('Payment Method','gfa_chart_method',$transactions,'payment_method',0,'total',false,'payment_method')."
			}
			function drawActive() {
				".self::output_pie('Active vs. Cancelled','gfa_chart_active',$subscriptionlength,'payment_status',0,'total',false,'payment_status')."
			}
			function drawLengthSource() {
				".self::output_pie('Subscription Length By Source','gfa_chart_length_source',$subscriptionlength,'description',0,'count',true, 'description')."
			}
			function drawLengthPage() {
				".self::output_pie('Subscription Length by Page','gfa_chart_length_page',$subscriptionlength,'page',0,'count',true, 'page')."
			}
			function pieClick(field, value) {
				var period = queryParams('period');
				var start = queryParams('start');
				var end = queryParams('end');
				openPeriod(analyticsurl + (period?'&period='+period:'') + (start?'&start='+start:'') + (end?'&end='+end:'') + '&field='+encodeURIComponent(field)+'&value=' + encodeURIComponent(value));
			}
			function openPeriod(url) {
				if (gfa_ctrl_pressed) {
					window.open(url, '_blank');
				} else {
					location.href = url;
				}
			}
			function drawPie(title, id, info, value, filter) {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Source');
				data.addColumn('number', 'Payments');
				data.addRows(info);
				var options = {'title':title, 'width':'100%', 'height':'100%', pieSliceText: value?'value':'percentage'};
				var chart = new google.visualization.PieChart(document.getElementById(id));
				chart.draw(data, options);
				google.visualization.events.addListener(chart, 'select', function(e) {
					var selection = chart.getSelection();
					var filtervalue = info[selection[0].row][0];
					if (filter != '' && filtervalue != '(Other)') {
						pieClick(filter, filtervalue);
					}
				});
			}
			var gfa_ctrl_pressed = false;
			jQuery(document).keydown(function(event) {
				//console.log(event);
				if(event.which == '17' || event.which == '91' || event.which == '93') {
					gfa_ctrl_pressed = true;
					//console.log(gfa_ctrl_pressed);
				}
			});
			jQuery(document).keyup(function() {
				gfa_ctrl_pressed = false;
			});
			</script>";
		
		$image = plugin_dir_url(__FILE__).'/images/6by4.png';
		$format = 'j M Y';
		echo '<div>
			<table class="gfa_table gfa_table3 gfa_header_table"><tr>
				<td class="gfa_nowrap">
					<h2 id="gfa_filters">'.self::select(GFAnalytics::dates(), 'period').' | <a onclick="drawPayments()">Payments</a> | <a onclick="drawAmount()">Amount</a> | <a onclick="drawAverage()">Average</a></h2>
				</td>
				<td style="width:100%;"></td>
				<td>
					<table class="gfa_table" id="gfa_summary">
						<thead>
							<tr><th>'.($monthlyestimate['count']>0?'Recurring':'').'</th><th>'.($monthlyestimate['count']>0?'Payments':'').'</th><th>Total</th><th>Payments</th><th></th></tr>
						</thead>
						<tbody>
							<tr><td>'.($monthlyestimate['count']>0?'$'.self::number_format($monthlyestimate['total']):'').'</td><td>'.($monthlyestimate['count']>0?self::number_format($monthlyestimate['count']):'').'</td><td>$'.self::number_format($periodamount).'</td><td>'.self::number_format($periodpayments).'</td><td class="gfa_nowrap">('.date($format,$start).' → '.date($format,$end).')</td></tr>
							<tr><td>'.($compareestimate['count']>0?'$'.self::number_format($compareestimate['total']):'').'</td><td>'.($compareestimate['count']>0?self::number_format($compareestimate['count']):'').'</td><td>$'.self::number_format($compareamount).'</td><td>'.self::number_format($comparepayments).'</td><td class="gfa_nowrap">('.date($format,$comparestart).' → '.date($format,$compareend).')</td></tr>
						</tbody>
					</table>
				</td>
			</tr></table>
			<table class="gfa_table gfa_table2"><tr>
				<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_bar" id="gfa_chart_recurring"></div></div></div></td>
				<td><table class="widefat striped gfa_sort" id="gfa_history_table"><thead>
						<!--<tr class="gfa_left"><th></th><th colspan="3">Recurring</th><th colspan="3">New Subscriptions</th><th colspan="3">One Off</th></tr>-->
						<tr>
							<th data-sort="int">Period</th>
							<th data-sort="int">Recurring</th><th data-sort="int">Amount</th><th data-sort="int">Average</th>
							<th data-sort="int">New</th><th data-sort="int">Amount</th><th data-sort="int">Average</th>
							<th data-sort="int">One Off</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr>
					</thead>
					<tbody>';
					$history = array_reverse($history);
					$rec = array('total' => 0, 'amount' => 0);
					$new = array('total' => 0, 'amount' => 0);
					$one = array('total' => 0, 'amount' => 0);
					foreach ($history as $value) {
						echo '<tr><td data-sort-value="'.$value['start'],'"><a href="'.admin_url('admin.php?page='.self::$PREFIX.'&period=custom&start='.$value['startdate'].'&end='.$value['enddate']).'">'.$value['key'].'</a></td>
							<td data-sort-value="'.$value['totalrec'].'">'.self::number_format($value['totalrec']).'</td><td data-sort-value="'.$value['amountrec'].'">$'.self::number_format($value['amountrec']).'</td><td data-sort-value="'.self::check_number($value['totalrec'] ? $value['amountrec']/$value['totalrec'] : 0).'">$'.self::number_format($value['totalrec'] ? $value['amountrec']/$value['totalrec'] : 0,2).'</td>
							<td data-sort-value="'.$value['totalnew'].'">'.self::number_format($value['totalnew']).'</td><td data-sort-value="'.$value['amountnew'].'">$'.self::number_format($value['amountnew']).'</td><td data-sort-value="'.self::check_number($value['totalnew'] ? $value['amountnew']/$value['totalnew'] : 0).'">$'.self::number_format($value['totalnew'] ? $value['amountnew']/$value['totalnew'] : 0,2).'</td>
							<td data-sort-value="'.$value['totalone'].'">'.self::number_format($value['totalone']).'</td><td data-sort-value="'.$value['amountone'].'">$'.self::number_format($value['amountone']).'</td><td data-sort-value="'.self::check_number($value['totalone'] ? $value['amountone']/$value['totalone'] : 0).'">$'.self::number_format($value['totalone'] ? $value['amountone']/$value['totalone'] : 0,2).'</td>
						</tr>';
						$rec['total'] += $value['totalrec'];
						$new['total'] += $value['totalnew'];
						$one['total'] += $value['totalone'];
						$rec['amount'] += $value['amountrec'];
						$new['amount'] += $value['amountnew'];
						$one['amount'] += $value['amountone'];
					}
				echo '</tbody>
					<tfoot><tr>
						<th>$'.self::number_format($rec['amount'] + $new['amount'] + $one['amount']).'</th>
						<th>'.self::number_format($rec['total']).'</th>
						<th>$'.self::number_format($rec['amount']).'</th>
						<th>$'.self::number_format($rec['total'] ? $rec['amount']/$rec['total'] : 0,2).'</th>
						<th>'.self::number_format($new['total']).'</th>
						<th>$'.self::number_format($new['amount']).'</th>
						<th>$'.self::number_format($new['total'] ? $new['amount']/$new['total'] : 0,2).'</th>
						<th>'.self::number_format($one['total']).'</th>
						<th>$'.self::number_format($one['amount']).'</th>
						<th>$'.self::number_format($one['total'] ? $one['amount']/$one['total'] : 0,2).'</th>
					</tr></tfoot>
				</table></td>
			</tr></table></div>';
		
		echo '<div>
			<h2>By Source | <a onclick="drawPayments()">Payments</a> | <a onclick="drawAmount()">Amount</a> | <a onclick="drawAverage()">Average</a></h2>
			<table class="gfa_table gfa_table3">
				<tr>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_source_rec"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_source_new"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_source_one"></div></div></div></td>
				</tr>
				<tr>
					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($recurr,'description',$sourcegroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($newsub,'description',$sourcegroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($oneoff,'description',$sourcegroup).'</tbody>
					</table></td>
				</tr>
			</table>
			</div>';

		echo '<div>
			<h2>By Page | <a onclick="drawPayments()">Payments</a> | <a onclick="drawAmount()">Amount</a> | <a onclick="drawAverage()">Average</a></h2>
			<table class="gfa_table gfa_table3">
				<tr>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_page_rec"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_page_new"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_page_one"></div></div></div></td>
				</tr>
				<tr>
					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Page</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($recurr,'page',$pagegroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Page</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($newsub,'page',$pagegroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Page</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($oneoff,'page',$pagegroup).'</tbody>
					</table></td>
				</tr>
			</table>
			</div>';

		echo '<div>
			<h2>By Referrer | <a onclick="drawPayments()">Payments</a> | <a onclick="drawAmount()">Amount</a> | <a onclick="drawAverage()">Average</a></h2>
			<table class="gfa_table gfa_table3">
				<tr>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_referrer_rec"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_referrer_new"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_referrer_one"></div></div></div></td>
				</tr>
				<tr>
					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($recurr,'referrer',$referergroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($newsub,'referrer',$referergroup).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table gfa_sort">
					<thead><tr><th data-sort="string">Source</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr></thead>
					<tbody>'.self::output_table($oneoff,'referrer',$referergroup).'</tbody>
					</table></td>
				</tr>
			</table>
			</div>';
		
		echo '<div>
			<h2>Other Analytics</h2>
			<table class="gfa_table gfa_table3">
				<tr>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_method"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_length_source"></div></div></div></td>
					<td><div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_length_page"></div></div></div></td>
				</tr>
				<tr>
					<td><table class="widefat striped gfa_breadown_table">
					<thead>
						<tr><th data-sort="string">Page</th><th data-sort="int">Payments</th><th data-sort="int">Amount</th><th data-sort="int">Average</th></tr>
					</thead>
					<tbody>'.self::output_table($filtered,'payment_method',0).'</tbody>
					</table>
					<br />
					<div class="gfa_cell_wrap"><img src="'.$image.'" class="gfa_image" /><div class="gfa_chart_wrap"><div class="gfa_chart gfa_chart_pie" id="gfa_chart_active"></div></div></div>
					</td>

					<td><table class="widefat striped gfa_breadown_table">
					<thead>
						<tr class="gfa_left"><th></th><th></th><th colspan="3">Average</th></tr>
						<tr><th data-sort="string">Source</th><th data-sort="int">Subscribers</th><th data-sort="int">Length</th><th data-sort="int">Amount</th><th data-sort="int">Value</th></tr>
					</thead>
					<tbody>'.self::output_subscriptions($subscriptionlength,'description',0).'</tbody>
					</table></td>

					<td><table class="widefat striped gfa_breadown_table">
					<thead>
						<tr class="gfa_left"><th></th><th></th><th colspan="3">Average</th></tr>
						<tr><th data-sort="string">Page</th><th data-sort="int">Subscribers</th><th data-sort="int">Length</th><th data-sort="int">Amount</th><th data-sort="int">Value</th></tr>
					</thead>
					<tbody>'.self::output_subscriptions($subscriptionlength,'page',0).'</tbody>
					</table></td>
				</tr>
			</table>
			</div>';
		
		if (($period != 'year' && !is_numeric($period)) || $filter) {
			$adminurl = admin_url('admin.php?page='.self::$PREFIX);
			echo '<div>
			<h2>All Payments</h2>
				<table class="widefat striped gfa_sort" id="gfa_transaction_table">
				<thead><tr><th data-sort="int">Date</th><th>Entry</th>'.($full_access?'<th data-sort="string">Name</th>':'').'<th data-sort="int">Amount</th><th data-sort="string">Type</th><th data-sort="string">Method</th><th data-sort="string">Description</th><th data-sort="string">Page</th><th>Transaction</th></tr></thead>
				<tbody>';
				$timezone = get_option('gmt_offset');
				foreach ($filtered as $row) {
					if ($period != 'year' || $filter) {
						$rowdate = new DateTime('now', new DateTimeZone($timezone));
						$rowdate->setTimestamp(intval($row->date));
						if ($row->recurring && $row->first_payment) {
							$type = 'New Subscription';
						} elseif ($row->recurring) {
							$type = 'Recurring';
						} else {
							$type = 'One Off';
						}
						//transaction_id
						//subscription_id
						echo '<tr>
							<td class="gfa_nowrap" data-sort-value="'.$row->date.'">'.($full_access?'<a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$row->form_id.'&lid='.$row->entry_id).'" target="_blank">':'').$rowdate->format('Y-m-d').' at '.$rowdate->format("h:i").($full_access?'</a>':'').'</td>
							<td class="gfa_nowrap" data-sort-value="'.$row->date.'">'.($full_access?'<a href="'.admin_url('admin.php?page=gf_entries&view=entry&id='.$row->form_id.'&lid='.$row->entry_id).'" target="_blank">':'').$row->entry_id.($full_access?'</a>':'').'</td>
							'.($full_access?'<td>'.self::link_customer($row).'</td>':'').'
							<td class="gfa_align_right" data-sort-value="'.$row->amount.'">$'.self::number_format($row->amount, 2).'</td>
							<td class="gfa_nowrap">'.self::table_name($type, 'type').'</td>
							<td class="gfa_nowrap">'.self::table_name($row->payment_method, 'payment_method').'</td>
							<td><a href="'.admin_url('admin.php?page=gf_entries&id='.$row->form_id).'" target="_blank">'.$row->description.'</a></td>
							<td><a href="'.$row->page_full.'" target="_blank">'.$row->page_full.'</a></td>
							<td>'.self::transaction_link($row).'</td>
						</tr>';
					}
				}
				echo '</tbody></table>
			</div>';	
		}
		
		echo '</div>';
	}
}
