<section id="pivotpress">
    <div class="containe-fluidr">
        <div class="pivotpress-filters row">
            <div class="col-sm-12 col-md-4">
                <form>
                    <div class="form-group">
                        <label for="filterByStatus">Story Status</label>
                        <select class="form-control" id="filterByStatus">
                            <option value="state-all">All</option>
                            <option value="state-unscheduled">Unscheduled</option>
                            <option value="state-unstarted">Unstarted</option>
                            <option value="state-planned">Planned</option>
                            <option value="state-started">Started</option>
                            <option value="state-finished">Finished</option>
                            <option value="state-delivered">Delivered</option>
                            <option value="state-rejected">Rejected</option>
                            <option value="state-accepted">Accepted</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filterByLabel">Label</label>
                        <select class="form-control" id="filterByLabel">
                            <option value="any">Any</option>
                            <?php
                                $labels = pivotpress_get_labels();

                                foreach($labels as $label){
                                    print('<option value="' . $label->name . '"">' . $label->name . '</option>');
                                }
                            ?>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary"  id="filterSubmit">Filter</button>
                    <button type="button" class="btn btn-default" id="clearFiltersSubmit">Clear</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-8">

                    <?php
                        $stories = pivotpress_get_stories();

                        foreach($stories as $story){
                            include('pivotpress-story.php');
                        }
                    ?>

            </div>
        </div>
    </div>
</section>

