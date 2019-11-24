jQuery(document).ready(function($) {
    $("#myTable").tablesorter({});
});




$("#myTable").tablesorter({
    debug:true,
    widthFixed:true
}).tablesorterPager({
    size:3,
    container:$('#pager'),
    positionFixed:false,
    page:1,
    cssNext:'.page-link',
    cssPrev:'.page-link',
    cssFirst:'.page-link',
    cssLast:'.page-link',
});