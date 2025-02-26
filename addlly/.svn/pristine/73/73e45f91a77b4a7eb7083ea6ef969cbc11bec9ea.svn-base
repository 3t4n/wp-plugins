<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="filters one-click-blog-writer">
    <div class="historyTopBar d-flex justify-content-between bg-white   align-items-center gap-x-3 flex-wrap ">
        <div class="d-flex justify-content-lg-between flex-wrap align-items-center searchBarLeft leftSearchBarH">
            <div class="buttonTab overflow-hidden">
                <button class="active" disabled="" data-id="all">All</button>
                <button data-id="archive">Archive</button>
            </div>
            <span class="line"></span>
            <div class="filterRedu rounded-pill overflow-hidden">
                <button class="unwrap-text active">
                    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/FilterLeft-lines.svg" alt="filterIcon">
                    <span class="unwrap-tooltip"><?php esc_html_e('Unwrap Text', 'addlly'); ?></span>
                </button>
                <button class="wrap-text">
                    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/Redo-filter-arrow.svg" alt="redoIcon">
                    <span class="wrap-tooltip"><?php esc_html_e('Wrap Text', 'addlly'); ?></span>
                </button>
            </div>
            <div class="genrateNewFilter">
                <div class="searchField position-relative">
                    <input type="search" placeholder="Type to search" id="search_keyword">
                    <div class="searchIcon position-absolute">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <span class="line"></span>
            <div>
                <div class="position-relative">
                    <button class="show-filters position-relative ps-2 d-flex align-items-center  gap-2 blogButton border-0" variant="warning">
                        <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/Filter-hr-lines.svg" alt="filter"> <?php esc_html_e('Filters', 'addlly'); ?>
                    </button>
                    <!-- ------- inner dropdwon ------------->
                    <div class="filterPopUpH filter-popup-dropdwon d-none">
                        <div class="popUpMain">
                            <div class="d-flex w-full justify-content-between align-items-center popUpHeader">
                                <h5 class="filterHeader">Filter</h5>
                                <span class="fw-bold cursor-pointer clearFilters">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144m224 0L144 368"></path>
                                    </svg>
                                    <?php esc_html_e('CLEAR ALL', 'addlly'); ?>
                                </span>
                            </div>
                            <div class="filterItemsBox d-flex ">
                                <div class="itemsFilter durationsFilter">
                                    <h6 class="filterHeader"><?php esc_html_e('Duration', 'addlly'); ?> <span class="blueButton  mx-1"><?php esc_html_e('0 selected', 'addlly'); ?></span> </h6>
                                    <div class="list-group">
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations0" type="checkbox" class="cursor-pointer" name="durations[]" value="all">
                                            </div>
                                            <div>
                                                <label for="durations0" class="text-black"><span><?php esc_html_e('All', 'addlly'); ?></span><span class="default-filter"> <?php esc_html_e('(Default)', 'addlly'); ?></span></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations1" type="checkbox" class="cursor-pointer" name="durations[]" value="today">
                                            </div>
                                            <div>
                                                <label for="durations1" class="text-black"><?php esc_html_e('Today', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations2" type="checkbox" class="cursor-pointer" name="durations[]" value="1">
                                            </div>
                                            <div>
                                                <label for="durations2" class="text-black"><?php esc_html_e('Yesterday', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations3" type="checkbox" class="cursor-pointer" name="durations[]" value="7">
                                            </div>
                                            <div>
                                                <label for="durations3" class="text-black"><?php esc_html_e('7 Day Ago', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations4" type="checkbox" class="cursor-pointer" name="durations[]" value="30">
                                            </div>
                                            <div>
                                                <label for="durations4" class="text-black"><?php esc_html_e('30 Day Ago', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="durations5" type="checkbox" class="cursor-pointer" name="durations[]" value="90">
                                            </div>
                                            <div>
                                                <label for="durations5" class="text-black"><?php esc_html_e('90 Day Ago', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemsFilter statusFilter">
                                    <h6 class="filterHeader"><?php esc_html_e('Status', 'addlly'); ?> <span class="blueButton  mx-1"><?php esc_html_e('0 selected', 'addlly'); ?></span> </h6>
                                    <div class="list-group">
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="status0" name="status[]" type="checkbox" class="cursor-pointer" value="all">
                                            </div>
                                            <div>
                                                <label for="status0" class="text-black"><span><?php esc_html_e('All', 'addlly'); ?></span><span class="default-filter"> <?php esc_html_e('(Default)', 'addlly'); ?></span></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="status1" name="status[]" type="checkbox" class="cursor-pointer" value="completed">
                                            </div>
                                            <div>
                                                <label for="status1" class="text-black">
                                                    <span>
                                                        <svg stroke="currentColor" fill="#84CC16" stroke-width="0" viewBox="0 0 24 24" class="text-success" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px;">
                                                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"></path>
                                                        </svg>
                                                        <?php esc_html_e('Done', 'addlly'); ?>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="status2" name="status[]" type="checkbox" class="cursor-pointer" value="pending">
                                            </div>
                                            <div>
                                                <label for="status2" class="text-black">
                                                    <span>
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-warning" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"></path>
                                                        </svg>
                                                        <?php esc_html_e('In progress', 'addlly'); ?>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="status3" name="status[]" type="checkbox" class="cursor-pointer" value="error">
                                            </div>
                                            <div>
                                                <label for="status3" class="text-black"><span>
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-danger" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"></path>
                                                        </svg>
                                                        <?php esc_html_e('Error', 'addlly'); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemsFilter AIModelsFilter searchBlockArea pe-2">
                                    <h6 class="filterHeader"><?php esc_html_e('AI Model', 'addlly'); ?> <span class="blueButton  mx-1"><?php esc_html_e('0 selected', 'addlly'); ?></span> </h6>
                                    <div class="m-0 list-group">
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="AIModels0" name="AIModels[]" type="checkbox" class="cursor-pointer" value="all">
                                            </div>
                                            <div>
                                                <label for="AIModels0" class="text-black"><span><?php esc_html_e('All', 'addlly'); ?></span><span class="default-filter"> <?php esc_html_e('(Default)', 'addlly'); ?></span></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="AIModels1" name="AIModels[]" type="checkbox" class="cursor-pointer" value="GPT 4">
                                            </div>
                                            <div>
                                                <label for="AIModels1" class="text-black"><?php esc_html_e('GPT 4', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="AIModels2" name="AIModels[]" type="checkbox" class="cursor-pointer" value="Claude">
                                            </div>
                                            <div>
                                                <label for="AIModels2" class="text-black"><?php esc_html_e('Claude', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="AIModels3" name="AIModels[]" type="checkbox" class="cursor-pointer" value="GPT 3.5">
                                            </div>
                                            <div>
                                                <label for="AIModels3" class="text-black"><?php esc_html_e('GPT 3.5', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                        <div class="itemsListsPoints d-flex align-items-center gap-2">
                                            <div xs="2">
                                                <input id="AIModels4" name="AIModels[]" type="checkbox" class="cursor-pointer" value="GPT 4 Omni">
                                            </div>
                                            <div>
                                                <label for="AIModels4" class="text-black"><?php esc_html_e('GPT 4 Omni', 'addlly'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                            
                    <!-- ------- End inner dropdwon ------------->                            
                </div>
            </div>
        </div>
        <div class="filterGenrate d-flex justify-content-between gap-3">
            <div class="buttonsBlock d-flex align-items-center justify-content-between gap-3"></div>
        </div>
    </div>
</div>