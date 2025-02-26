.tickercontainer {
    width: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
    height: <?php echo $data['scroll-height']; ?>px;
}

.tickercontainer .mask {

    /* that serves as a mask. so you get a sort of padding both left and right */
    position: relative;
    overflow: hidden;
    padding: <?php echo $data['scroll-padding']['padding-top']; ?> 0px <?php echo $data['scroll-padding']['padding-bottom']; ?> 0px !important;
    margin: 0px <?php echo $data['scroll-padding']['padding-right']; ?> 0px <?php echo $data['scroll-padding']['padding-left']; ?> ;
   }

ul.newsticker {
    position: relative;
    left: 100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
}

ul.newsticker li {
    float: left;
    margin-left: <?php echo $data['scroll-gap']; ?>px;
    font-size: <?php echo $data['scroll-text-size']; ?>px;
    font-weight: bold;
}

ul.newsticker li:before {
    content: "»";
    margin-right: 10px;

}

.at_scroll_area {
    color: white;
    width: 100%;
    height: <?php echo $data['scroll-height']; ?>px;
    overflow: hidden;
    white-space: nowrap;
}

.at_scroll_content {
    left: 100%;    
    height: <?php echo $data['scroll-height']; ?>px;
    position: relative;
}

.at_scroll_title {
    background: <?php echo $data['title-bg']; ?>;
    height: <?php echo $data['scroll-height']; ?>px;
    color: <?php echo $data['title-text-color']; ?>;
    font-size: <?php echo $data['title-text-size']; ?>px;
    font-weight: bold;
    float: left;
    padding: <?php echo $data['title-padding']['padding-top']; ?> <?php echo $data['title-padding']['padding-right']; ?> <?php echo $data['title-padding']['padding-bottom']; ?> <?php echo $data['title-padding']['padding-left']; ?> !important;
}

.at_scroll_div_content {
    overflow: hidden;
    background: <?php echo $data['scroll-color']; ?>;
}

.at_scroll_div_content a {
    color: <?php echo $data['scroll-text-color']; ?>;
}

.at_scroll_title_right-arrow {
    display: inline-block;
    position: relative;
    background: <?php echo $data['title-bg']; ?>;
}

.at_scroll_title_right-arrow:after {
    content: '';
    display: block;
    position: absolute;
    left: 100%;
    top: 50%;
    margin-top: -10px;
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid <?php echo $data['title-bg']; ?>;
}