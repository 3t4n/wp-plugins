(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	const category = {
		categoryList: [],
		unsyncCatId: '',
		syncCount : 0,

		syncCategory: function () {



			let id = $(this).attr('id');
			category.unsyncCatId = id;
			let parent_id = $(this).data('parent');
			let typeId = $(".catDynamic_" + id).attr('data-sortdindex');
			let taxonomytypeslug = $(this).attr('data-taxonomytypeslug');

			var wp_domain = $(this).attr('data-wp_domain');
			var project_slug = $(this).attr('data-project_slug');
			var current_user = $(this).attr('data-current_user');

			if (typeof gtag === 'function') {
				gtag('event', 'sortd_action', {
					'sortd_page_title': 'Category Screen',
					'sortd_feature': 'Sync/UnSync Category',
					'sortd_domain': wp_domain,
					'sortd_project_slug': project_slug,
					'sortd_user': current_user
				});
			}

			category.taxonomytypeslug = taxonomytypeslug
			// console.log(taxonomytypeslug);return false;
			let flag = false;
			if ($(this).is(":checked")) {
				flag = true;
				typeId = 0;
			}



			let after_cat_id = null;

			let siteUrl = $("#siteurl").val();


			if (flag == false) {

				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					data: { 'id': id, 'action': 'get_all_heirarchy_cat_children', 'taxonomytypeslug': taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
					success: function (result) {
						let response = JSON.parse(result);
						console.log("1", response);
						$(".img" + id).hide();
						//console.log(response.length);return false;
						if (response.length == 0) {



							$.ajax({
								url: sortd_ajax_obj_category.ajax_url,
								data: { 'id': id, 'action': 'sortd_sync_unsync_category', 'flag': false, 'typeId': typeId, 'sortd_nonce': sortd_ajax_obj_category.nonce },
								type: 'post',
								success: function (result) {

									let response = JSON.parse(result);


									console.log("3");
									if (response.response.error && response.response.error.errorCode == 503) {
										$(".taxSyncUnsyncNotice").html(response.response.error.message);
										$(".taxSyncUnsyncNotice").show();
										setTimeout(function () {
											$('.taxSyncUnsyncNotice').fadeOut(500);
										}, 3000);
									} else {

										$("#catSpan_" + id).hide();

										//$(".succmsg").hide();
										$(".img" + id).hide();
										$('.sortcheckclass' + id).attr('checked', false);

										console.log(response, "child");

										$(".succmsg img" + id).hide();
										$(".thtick,.succmsg" + id).hide();

									}

								}
							});
							return false;
						} else {



							$.each(response, function (i, j) {

								$('.sortcheckclass' + j).attr("disabled", true);

								$(".thtick,.succmsg" + id).hide();




							});


							$.ajax({
								url: sortd_ajax_obj_category.ajax_url,
								data: { 'id': response, 'action': 'check_for_synced', 'flag': false, 'typeId': typeId, 'sortd_nonce': sortd_ajax_obj_category.nonce },
								type: 'post',
								success: function (result) {

									let response = JSON.parse(result);


									$(".img" + id).hide();
									if (response == false) {
										$.ajax({
											url: sortd_ajax_obj_category.ajax_url,
											data: { 'id': id, 'action': 'sortd_sync_unsync_category', 'flag': false, 'typeId': typeId, 'sortd_nonce': sortd_ajax_obj_category.nonce },
											type: 'post',
											success: function (result) {

												$('.sortcheckclass' + id).attr('checked', false);
												$(".img" + id).hide();
											}
										});
									}
									if (response == true) {

										$("#mi-modal").modal('show');

										$(document).click(function (e) {
											if ($(e.target).is('#mi-modal')) {
												$(".sortcheckclass" + id).prop('checked', true);
												$('.sortCatCheck[data-parent="' + id + '"]').attr("disabled", false);
											}

										});

										$("#modal-btn-no").click(function () {
											$(".sortcheckclass" + id).prop('checked', true);
											$('.sortCatCheck[data-parent="' + id + '"]').attr("disabled", false);

										});
									}

								}
							});
							return false;
							//$("#mi-modal").modal('show');
						}
					}

				});



			} else {
				var parent;
				var catid;
				var sync_flag;
				$('.table tbody tr').each((index, tr) => {
					parent = $(tr).data('parent');
					catid = $(tr).data('cat_id');
					sync_flag = $(tr).data('sync_flag');
					if (parent == parent_id) {

						if (catid == id) {
							return false;
						} else if (sync_flag == "1") {

							after_cat_id = catid;
						}
					}


				});


				let urlString = location.href;
				let url = new URL(urlString);
				var urlParams = url.searchParams;


				if (urlParams.has('taxonomy') == true) {

					console.log(id);
					//	$('.sortcheckclass'+id).attr('data-sync_flag','1');
					parent = $('.sortcheckclass' + id).data('parent');
					catid = $('.sortcheckclass' + id).data('cat_id');
					sync_flag = $('.sortcheckclass' + id).data('sync_flag');

					if (parent == parent_id) {

						// if(catid == id){

						// 	return false;
						// } else 
						if (sync_flag == "1") {

							after_cat_id = catid;
						}


					}

				}


				var data = { 'id': catid, 'action': 'sortd_sync_unsync_category', 'flag': flag, 'typeId': typeId, 'parent_id': parent, 'after_cat_id': after_cat_id, 'taxonomytypeslug': taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce };

				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					data: data, //{'id':id,'action':'sortd_sync_unsync_category','flag' : flag,'typeId':typeId,'sortd_nonce' : sortd_ajax_obj_category.nonce},
					type: 'post',
					success: function (result) {
						let response = JSON.parse(result);
						if ((response.flag == "true" || response.flag == true)) {

							if (response.response.status == false && (response.response.error.errorCode != 408 || response.response.error.errorCode != 503) && (response.response.error.errorCode == 1004 || response.response.error.errorCode == 1005)) {
								location.href = siteUrl + "/wp-admin/admin.php?page=sortd-manage-settings&section=sortd_credential_settings";
							} else if (response.response.status == false && (response.response.error.errorCode == 408 || response.response.error.errorCode == 503)) {
								// $('.content-section').prepend(`<div class="notice notice-error is-dismissible"><p>`+response.response.error.message+`</p><span class="closeicon" aria-hidden="true">&times;</span></div>`);
								// $(".notice-error").delay(2000).fadeOut(500);
								$(".taxSyncUnsyncNotice").html(response.response.error.message);
								$(".taxSyncUnsyncNotice").show();
								setTimeout(function () {
									$('.taxSyncUnsyncNotice').fadeOut(500);
								}, 3000);
							} else {

								console.log($(".img" + id), "sadas")
								$(".catDynamic_" + id).attr('data-sortdindex', response.response.data._id);
								$("#catSpan_" + id).show();
								$(".thtick,.succmsg" + id).show();
								$(".img" + id).show();
								$("#tr-" + id).attr('data-sync_flag', '1');

								$('.sortcheckclass' + id).attr('data-sync_flag', '1');
								$('.sortcheckclass' + id).attr('checked', true);



								$.ajax({

									url: sortd_ajax_obj_category.ajax_url,
									data: { 'id': id, 'action': 'get_cat_children', 'taxonomy_slug': taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
									type: 'post',
									success: function (result) {
										let response = JSON.parse(result);

										$.each(response, function (i, j) {

											$('.sortcheckclass' + j.term_id).attr("disabled", false);


										});
									}
								});
							}

						} else if (response.response.error.errorCode == 503) {
							console.log("");

						}
					}

				});
			}

			return false;

		},


		catArray: [],

		loadDefaults: function () {
			let url_string = location.href;
			let url = new URL(url_string);
			let action = url.searchParams.get("action");
			let taxonomy_slug = url.searchParams.get("taxonomy");


			if (action == 'reorder') {
				category.showReorderRenameCategoryView();



			} else if (action == 'sync') {
				category.showSyncCategoryView();
			}


			var urlParams = url.searchParams;

			if (urlParams.has('taxonomy') == true && !(action)) {


				category.syncDataOnCategoryTaxonomy(taxonomy_slug);

			}

			if (urlParams.has('taxonomy') == true && urlParams.get('taxonomy') !== 'web_story_category') {



				category.syncDataOnCategoryTaxonomySearch(taxonomy_slug);

			} else if (urlParams.has('taxonomy') == true && urlParams.get('taxonomy') == 'web_story_category') {

				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					data: { 'action': 'list_web_cats', 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
					success: function (result) {
						let response = JSON.parse(result);
						//console.log(response);return false;
						$(".tags tr").find('input[name="webcatcheckname"]').each(function () {
							let id = $(this).attr('id');

							$.each(response.data.categories, function (i, j) {

								if (j.cat_guid == id) {
									$("#" + id).attr('checked', true);
								}
								/* else {
										$("#"+id).attr('checked',false);
								}*/
							});


						});
					}
				});
			}

			//category.getSyncedTaxonomiesTypesList();
		},


		categoryUnsyncAllChildren: function () {
			$.ajax({
				url: sortd_ajax_obj_category.ajax_url,
				data: { 'id': category.unsyncCatId, 'action': 'sortd_sync_unsync_category', 'flag': false, 'typeId': '', 'sortd_nonce': sortd_ajax_obj_category.nonce },
				type: 'post',
				success: function (result) {
					let response = JSON.parse(result);
					if (response.flag === "false" || response.flag === false) {

						if (response.response.status == false && response.response.error.errorCode != 408 && (response.response.error.errorCode == 1004 || response.response.error.errorCode == 1005)) {
							// console.log("asdadasdas");return false;
							location.href = siteUrl + "/wp-admin/admin.php?page=sortd-manage-settings&section=sortd_credential_settings";
						} else if (response.response.status == false && (response.response.error.errorCode == 408 || response.response.error.errorCode == 503)) {

							// $('.content-section').prepend(`<div class="notice notice-error is-dismissible"><p>`+response.response.error.message+`</p><span class="closeicon" aria-hidden="true">&times;</span></div>`);
							// $(".notice-error").delay(2000).fadeOut(500);
							$(".taxSyncUnsyncNotice").html(response.response.error.message);
							$(".taxSyncUnsyncNotice").show();
							setTimeout(function () {
								$('.taxSyncUnsyncNotice').fadeOut(500);
							}, 3000);
						} else {



							$("#catSpan_" + category.unsyncCatId).hide();
							$("#tr-" + category.unsyncCatId).attr('data-sync_flag', '0')
							$.each(response.response.data.cat_guid, function (i, l) {


								$('.table tbody tr').each((index, tr) => {
									$(tr).children('td').each((index, td) => {
										$(".catSyncHead_" + l).hide();
										$(".sortcheckclass" + l).prop("checked", false);
										$(".img" + l).hide();
									});

								});


							});
							$(".img" + category.unsyncCatId).hide();

							$.ajax({
								url: sortd_ajax_obj_category.ajax_url,
								data: { 'id': category.unsyncCatId, 'action': 'get_all_heirarchy_cat_children', 'taxonomytypeslug': category.taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
								type: 'post',
								success: function (result) {
									let response = JSON.parse(result);

									//console.log(response);return false;


									if (response.length == 0) {
										return false;
									} else {
										$.each(response, function (i, j) {

											$('.sortcheckclass' + j).attr("disabled", true);


											$.ajax({
												url: sortd_ajax_obj_category.ajax_url,
												data: { 'id': j, 'action': 'sortd_sync_unsync_category', 'flag': false, 'typeId': '', 'sortd_nonce': sortd_ajax_obj_category.nonce },
												type: 'post',
												success: function (result) {
													console.log(result, '2')
													$(".tags tr").find('input[name="catsortdcheckbox"]').each(function () {


														$(".sortcheckclass" + j).prop("checked", false);
														$(".img" + j).hide();
													});

													$('.table tbody tr').each((index, tr) => {

														$(tr).children('td').each((index, td) => {
															$(".catSyncHead_" + j).hide();
															$(".sortcheckclass" + j).prop("checked", false);
															$("#catSpan_" + j).hide();
															$(".img" + j).hide();
														});

													});

												}
											});
										});
										//$("#mi-modal").modal('show');
									}



								}
							});
							return false;


						}

					}
				}
			});
		},

		syncDataOnCategoryTaxonomy: function (taxonomy_slug) {



			$.ajax({
				url: sortd_ajax_obj_category.ajax_url,
				data: { 'action': 'get_categories', 'taxonomy_slug': taxonomy_slug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
				type: 'post',
				async: false,
				success: function (result) {
					let response = JSON.parse(result);



					category.catArray = response.categories.data.taxonomies;


					$.each(category.catArray, function (i, j) {



						$(".tags tr").find('input[name="catsortdcheckbox"]').each(function () {
							let ids = $(this).attr('id');
							$(this).prop("disabled", true);
							let data_parent = $(this).attr('data-parent');

							if (data_parent == 0) {
								$(this).prop("disabled", false);
							}
							if (j.cat_guid == ids) {

								console.log("yes")
								$("#" + ids).prop("checked", true)
								$("#" + ids).attr("disabled", false)



								$.ajax({
									url: sortd_ajax_obj_category.ajax_url,
									data: { 'id': ids, 'action': 'get_cat_children', 'taxonomy_slug': taxonomy_slug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
									type: 'post',
									success: function (result) {
										let response = JSON.parse(result);
										console.log("5");
										console.log(response, "ddddd");

										$.each(response, function (i, j) {

											$(".tags tr").find('input[name="catsortdcheckbox"]').each(function () {

												$('.sortcheckclass' + j.term_id).attr("disabled", false);

												var decimalInt = parseInt($(this).attr('id'));

												//console.log(j.term_id, $(this).attr('id'));
												if (j.term_id === decimalInt) {
													// $("#"+j.term_id).prop("checked",true);

												}


											});

										});
									}
								});
							} else {
								//$("#"+ids).prop("checked",false)
							}
						});
					});

				}
			});

			category.catArray = [];

		},

		syncDataOnCategoryTaxonomySearch: function (taxonomy_slug) {

			let search_arr = [];

			var eg = $(".tags tr").find('id');
			var check = $(".tags tr").find('input[name="catsortdcheckbox"]');
			check.each(function () {
				var cat_id = $(this).attr('id');
				search_arr.push(cat_id);

			})

			// console.log(search_arr);

			search_arr.forEach(function (cat) {
				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					type: 'POST',
					data: { 'category': cat, 'taxonomy_slug': taxonomy_slug, 'action': 'check_parent_cat_sync', 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
					success: function (response) {
						var res = JSON.parse(response);
						// console.log(res);
						if (response == 1) {
							// console.log("wewwewewewewewweww");
							$(".sortcheckclass" + cat).prop("disabled", false);
						} else {
							$(".sortcheckclass" + cat).prop("disabled", true);
						}

					},
					error: function (xhr, status, error) {
						console.log(error);
					}
				});
			});

		},

		syncWebCat: function () {

			let id = $(this).attr('id');
			//category.unsyncCatId=id;
			let flag = false;
			if ($(this).is(":checked")) {
				flag = true;
			}


			if (flag == true) {

				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					data: { 'id': id, 'action': 'sync_web_cat', 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
					success: function (result) {
						let response = JSON.parse(result);

						if (response.status == true) {
							$("#" + id).attr("checked", true);
							$(".img" + id).show();
						} else {
							console.log(response.error);
						}

						//console.log(response);



					}
				});

			} else if (flag == false) {
				$.ajax({
					url: sortd_ajax_obj_category.ajax_url,
					data: { 'id': id, 'action': 'unsync_web_cat', 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
					success: function (result) {
						let response = JSON.parse(result);
						//console.log(response);return false;

						if (response.status == true) {
							$("#" + id).attr("checked", false);
							$(".img" + id).hide();
							$("#catwbflag_" + id).show();
							setTimeout(function () {
								$("#catwbflag_" + id).fadeOut();
							}, 2000);
						} else {
							console.log(response.error);
						}


					}
				});

			}

		},
	

		bulkSyncCategory: async function () {
		
            let CheckedLength = $('[name="delete_tags[]"]:checked').length;

            if (CheckedLength == 0) {
				
                $(".bulk_validation_category").show();
                return false;
            }
           
            var wp_domain = $(this).attr('data-wp_domain');
            var project_slug = $(this).attr('data-project_slug');
            var current_user = $(this).attr('data-current_user');

			if (typeof gtag === 'function') {
                gtag('event', 'sortd_action', {
                    'sortd_page_title': 'Category Screen',
                    'sortd_feature': 'Bulk Sync',
                    'sortd_domain': wp_domain,
                    'sortd_project_slug': project_slug,
                    'sortd_user': current_user
                });
            }

            let catToSync = []
            $('input[name="delete_tags[]"]:checked').each(async function () {
                catToSync.push(this.value)
                $(".bulk_validation_category").hide();

            });
			
            // AJAX call to check the flag of the category in the database
            const filtered_arr = await $.ajax({
                url: sortd_ajax_obj_category.ajax_url,
                data: {
                    'action': 'filter_category_array',
                    'sortd_nonce': sortd_ajax_obj_category.nonce,
                    'cat_to_sync': catToSync
                },
                type: 'post'
            });
         
            catToSync = JSON.parse(filtered_arr);
		

          
            for (const catGuid of catToSync) {
                const respo = await category.bulkCountPostSync(catGuid);
            }

            //update

            $.ajax({

                url: sortd_ajax_obj_category.ajax_url,
                data: {
                    'action': 'update_bulk_category_flag',
                    'post_count_1': category.syncCount,
                    'sortd_nonce': sortd_ajax_obj_category.nonce
                },
                type: 'post',
                success: function (result) {

                    $(".bulkactionloadercat").hide();
                    location.reload();

                }

            });

        },
		bulkCountPostSync: async function (catGuid) {
            const response = await category.bulkSyncCall(catGuid);
            return response;
        },

		bulkSyncCall: function (value) {

			
            return new Promise((resolve, reject) => {
				let urlParams = new URLSearchParams(window.location.search);
				let taxonomytypeslug = urlParams.get('taxonomy');
				
                $.ajax({

                    url: sortd_ajax_obj_category.ajax_url,
                    data: {
                        'action': 'sync_categories_in_bulk',
                        'page': 0,
                        'post_count': category.syncCount,
                        'catids': value,
						'flag':true,
						'after_cat_id':'',
						'taxonomytypeslug':taxonomytypeslug,
                        'sortd_nonce': sortd_ajax_obj_category.nonce
                    },
                    type: 'post',
                    success: function (result) {
						

                        $(".bulkactionloadercat").show();
                        
                        let response = JSON.parse(result);
                        
                        if (response.response.status == "true" || response.response.status == true) {
                            
                            category.syncCount++;
                           

                            $.ajax({
                                url: sortd_ajax_obj_category.ajax_url,
                                data: {
                                    'action': 'sortd_update_bulk_count',
                                    'post_count_1': category.syncCount,
                                   
                                    'post_id': value,
                                    'sortd_nonce': sortd_ajax_obj_category.nonce
                                },
                                type: 'post',
                                success: function (result) {
                               
                                }
                            });

                        } else {

                        }


                        return resolve(category.syncCount);

                    }

                });

            });
        },

		bulkUnsyncCategory: function () {
            let unsyncCount = 0;
            let unrequestCount = 0;

            let CheckedLengthUnsync = $('[name="delete_tags[]"]:checked').length;
            let nonce = $("#nonce_input").val(); // Retrieve the nonce from the hidden input.

         
            if (CheckedLengthUnsync == 0) {
                $(".bulk_validation_unsync_category").show();
                return false;
            }

            var wp_domain = $(this).attr('data-wp_domain');
            var project_slug = $(this).attr('data-project_slug');
            var current_user = $(this).attr('data-current_user');
			if (typeof gtag === 'function') {
                gtag('event', 'sortd_action', {
                    'sortd_page_title': 'Category Screen',
                    'sortd_feature': 'Bulk Unsync',
                    'sortd_domain': wp_domain,
                    'sortd_project_slug': project_slug,
                    'sortd_user': current_user
                });
            }

            

            $('input[name="delete_tags[]"]:checked').each(function () {
                $(".bulk_validation_unsync_category").hide();
				let urlParams = new URLSearchParams(window.location.search);
				var taxonomytypeslug = urlParams.get('taxonomy');
				
				$.ajax({
					
					url: sortd_ajax_obj_category.ajax_url,
					data: { 'id': this.value, 'action': 'get_all_heirarchy_cat_children', 'taxonomytypeslug': taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
					type: 'post',
                    success: function (result) {
						var res = JSON.parse(result);
						$.each(res,function(i,j){
							$('input[name="delete_tags[]"][id="cb-select-'+j+'"]').prop('checked',true);
						});
						
					}
				});

				


                $.ajax({

                    url: sortd_ajax_obj_category.ajax_url,
                    data: {
                        'action': 'unsync_categories_in_bulk',
                        'page': 0,
                        'post_count': unsyncCount,
                        'catids': this.value,
                        'sortd_nonce': sortd_ajax_obj_category.nonce,
                        '_wpnonce': nonce
                    },
                    type: 'post',
                    success: function (result) {

					
                        $(".bulkactionloaderunysnccat").show();
                        let response = JSON.parse(result);

                        unrequestCount++;
                        if (response.response.status == "true" || response.response.status == true) {

                            unsyncCount++;

                         
                            $.ajax({
                                url: sortd_ajax_obj_category.ajax_url,
                                data: {
                                    'action': 'update_bulk_unsync_count_cat',
                                    'post_count_unsync': unsyncCount,
                                    'sortd_nonce': sortd_ajax_obj_category.nonce
                                },
                                type: 'post',
                                success: function (result) {
                                   
                                }
                            });

                        } else {

                            $(".bulkactionloaderunysnccat").hide();
                        }

                        if (CheckedLengthUnsync == unrequestCount) {

                            $.ajax({

                                url: sortd_ajax_obj_article.ajax_url,
                                data: {
                                    'action': 'sortd_update_bulk_unsync_flag_cat',
                                    'post_count_unsync': unsyncCount,
                                    'sortd_nonce': sortd_ajax_obj_category.nonce
                                },
                                type: 'post',
                                success: function (result) {

                                    $(".bulkactionloaderunysnccat").hide();
                                    location.reload();

                                }

                            });
                        }
                    }

                });

            });

        },


	}

	$("#modal-btn-si").click(category.categoryUnsyncAllChildren);

	$(document).on('change', '.categorysync', category.syncCategory);
	$(document).on('click', '.bulksynccat', category.bulkSyncCategory);
	
    $(".bulkunsynccat").on('click', category.bulkUnsyncCategory);

	$(document).on('change', '.webcatsync', category.syncWebCat);

	$(document).ready(category.loadDefaults);

	$(document).on('change','input[name="delete_tags[]"]', function () {
		var articleData = [];
		$('input[name="delete_tags[]"]:checked').each(async function () {
			articleData.push(this.value)
		
		});

		let urlParams = new URLSearchParams(window.location.search);
		var taxonomytypeslug = urlParams.get('taxonomy');
		
		
	
		if ($(this).is(':checked')) {
			var parent_flag = false;
			$.ajax({
				url: sortd_ajax_obj_category.ajax_url,
				data: {
					'action': 'sortd_check_for_parent',
					'cat_id':$(this).val(),
					'taxonomytypeslug':taxonomytypeslug,
					'sortd_nonce': sortd_ajax_obj_category.nonce
				},
				type: 'post',
				success: function (result) {
					var response = JSON.parse(result);
					if(response.parent !== 0){
						console.log("a");
					parent_flag = $('input[name="delete_tags[]"][id="cb-select-'+response.parent+'"]').is(':checked');
					}
					
					if(response.response_flag == 0 && response.parent !== 0){
						
						if(parent_flag == true){
							console.log("ab");
							$(".bulksynccat").prop('disabled',false);
						$(".bulksynccat").css('background-color','blue');
						} else {
							console.log("ac");
							$(".bulksynccat").prop('disabled',true);
							$(".bulksynccat").css('background-color','grey');
						}
						
					} else {
						if(response.response_flag == 1 && response.parent !== 0){
							if (parent_flag == true){
								console.log("ad");
								$(".bulksynccat").prop('disabled',false);
								$(".bulksynccat").css('background-color','blue');
							} else {
								console.log("e");
								$(".bulksynccat").prop('disabled',true);
								$(".bulksynccat").css('background-color','grey');
							}
						} else if(response.response_flag == 1 && response.parent == 0){
							console.log("f");
							$(".bulksynccat").prop('disabled',false);
							$(".bulksynccat").css('background-color','blue');
						} else {
							console.log("g");
							$(".bulksynccat").prop('disabled',true);
							$(".bulksynccat").css('background-color','grey');
						}
						
					}
					

				}
			});
		  // Add logic for the checked state here
		} else {


			$.ajax({
				url: sortd_ajax_obj_category.ajax_url,
				data: {
					'action': 'sortd_check_for_parent',
					'cat_id':$(this).val(),
					'taxonomytypeslug':taxonomytypeslug,
					'sortd_nonce': sortd_ajax_obj_category.nonce
				},
				type: 'post',
				success: function (result) {
					var response = JSON.parse(result);
					if ($('input[name="delete_tags[]"][id="cb-select-'+response.parent+'"]').is(':checked')) {
						console.log("h");
						$(".bulksynccat").prop('disabled',false);
						$(".bulksynccat").css('background-color','blue');
					
							$.each(response.child_cat , function(i,j){
							
								if ($('input[name="delete_tags[]"][id="cb-select-'+j.term_id+'"]').is(':checked')){
									console.log("Sdsdsd");
									$(".bulksynccat").prop('disabled',true);
									$(".bulksynccat").css('background-color','grey');
								
								} else {
									console.log("sa");
									$(".bulksynccat").prop('disabled',false);
									$(".bulksynccat").css('background-color','blue');
								}
	
								
							});
					} else  {
						

						$.each(response.child_cat , function(i,j){
							
							if ($('input[name="delete_tags[]"][id="cb-select-'+j.term_id+'"]').is(':checked')){
								console.log("ai");
								$(".bulksynccat").prop('disabled',true);
								$(".bulksynccat").css('background-color','grey');
							
							} else {
								console.log("aj");
								$(".bulksynccat").prop('disabled',false);
								$(".bulksynccat").css('background-color','blue');
							}

							
						});

						if(response.parent !== 0 && !($(this).is(':checked')) && !($('input[name="delete_tags[]"][id="cb-select-'+response.parent+'"]').is(':checked'))){
							console.log("ak");
								$(".bulksynccat").prop('disabled',true);
						$(".bulksynccat").css('background-color','grey');
						}
					}

				}
			});

			return false;
			
		}

		$(articleData).each(async function (i,j) {
			
			$.ajax({
					
			url: sortd_ajax_obj_category.ajax_url,
			data: { 'id': j, 'action': 'get_parent', 'taxonomytypeslug': taxonomytypeslug, 'sortd_nonce': sortd_ajax_obj_category.nonce },
			type: 'post',
				success: function (result) {
					var res = JSON.parse(result);
					if(res !== 0 && !$('input[name="delete_tags[]"][id="cb-select-'+res+'"]').is(':checked') && $('input[name="delete_tags[]"][id="cb-select-'+j+'"]').is(':checked')){
						console.log("al");
						$(".bulksynccat").prop('disabled',true);
						$(".bulksynccat").css('background-color','grey');
					} else {
						console.log("m");
					}
					
					
				}
			});
		
		});

		
	});
	$(".cancelRedorder").click(function () {
		location.href = location.href;
	});

	$(".closeiconsynccat").on('click', function () {
        $(".bulksortdactioncatsync").hide();
    });

    $(".closeiconunsynccat").on('click', function () {
        $(".bulkactionunsynccat").hide();
    });

	var modalConfirm = function (callback) {



		$("#modal-btn-si").on("click", function () {

			callback(true);
			$("#mi-modal").modal('hide');
		});

		$("#modal-btn-no").on("click", function () {
			callback(false);
			$("#mi-modal").modal('hide');
		});
	};


	modalConfirm(function (confirm) {
		if (confirm) {

		} else {

		}
	});


	$(document).on('click', '.row-actions .editinline', function () {

		var row = $(this).closest('tr'); // Get the row containing the quick edit form
		// console.log(row[0]);
		var categoryId = $(row[0]).attr('id'); // Get the category ID
		// console.log(categoryId);

		$.ajax({
			url: sortd_ajax_obj_category.ajax_url,
			data: {
				'action': 'refresh_custom_column',
				'sortd_nonce': sortd_ajax_obj_category.nonce,
				'categoryId': categoryId
			},

			type: 'post',
			success: function (result) {


				var response = JSON.parse(result);
				var status = response['status'];
				var cat = response['value'];
				console.log(cat);
				if (status == 1) {
					// console.log("HURRAY");
					$(document).ajaxSuccess(function (event, xhr, settings) {
						if (settings.data && settings.data.indexOf('action=inline-save') !== -1) {
							// Quick edit category save action detected
							// Perform your desired action here

							$('.sortcheckclass' + cat).attr('checked', true);
							$('.sortcheckclass' + cat).attr('disabled', false);
						}
					})

				}


			}
		})


	});


})(jQuery);