jQuery(document).ready(function () {
    var table = jQuery('#ranktable').DataTable();

    adjustRowHeightToDiff(table, 12);

    fireEventsWhenOrdered(table);

});

function fireEventsWhenOrdered(table) {
    jQuery('#ranktable').on("order.dt", function () {
        resetRowHeight(table);
        var colIdx = getCurrSortColIdx(table);
        adjustRowHeightToDiff(table, colIdx);
    });
}

function resetRowHeight(table) {
    table.rows().every(function (index) {
        jQuery(this.node()).height(73);
    });
}

function getCurrSortColIdx(table) {
    var currOrder = table.order();
    var currColIdx = currOrder[0][0];
    //console.log('Column index currently sorted:' + currColIdx);//for testing
    return currColIdx;
}

function adjustRowHeightToDiff(table, colIdx) {
    var prevCellVal;

    table.rows({order: 'applied'})
        .nodes()
        .each(function (row) {
            var currRow = $(row);
            var targetCell = currRow.find('.sorting_1');
            var targetCellVal = targetCell.text();

            if(prevCellVal){
                var gap = Math.abs(targetCellVal - prevCellVal);

                currRow.height(currRow.height() * (1 + gap * 0.2));//changed the rule to 1point => 20% standard row height
            }

            prevCellVal = targetCellVal;
        });
}