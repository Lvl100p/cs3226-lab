jQuery(document).ready(function () {
    var table = jQuery('#ranktable').DataTable({
        "paging": false
    });

    //highlightSumRow(table)

    adjustRowHeightToDiff(table);

    fireEventsWhenOrdered(table);

    //highlightHighestOfCol(table);
});

function highlightHighestOfCol(table){//JS implementation of highlighting max values in a column, seems outdated
    table.columns().every(function(colIndex) {
        if(colIndex <3){
            return;
        }

        var highest = table.column(colIndex).data().sort().reverse().filter(function (item, pos, arr) {
            // remove duplicates
            return !pos || item != arr[pos - 1];
        })[0];

        table.rows().every(function (rowIndex) {
            var currCell = table.cell({
                row: rowIndex,
                column: colIndex
            }).node();

            if(jQuery(currCell).text() == highest) {
                jQuery(currCell).addClass("highest-of-column");
            }
        });
    });
}

function fireEventsWhenOrdered(table){
    jQuery('#ranktable').on("order.dt", function(){
        resetRowHeight(table);
	var colIdx = getCurrSortColIdx(table);
        adjustRowHeightToDiff(table,colIdx);
    });
}

function resetRowHeight(table){
    table.rows().every(function(index){
        jQuery(this.node()).height(55.1166);
    });
}

function getCurrSortColIdx(table){
    var currOrder = table.order();
    var currColIdx = currOrder[0][0];
    console.log('Column index currently sorted:' + currColIdx);//for testing
    return currColIdx;
}

function adjustRowHeightToDiff(table,colIdx){

    var prevSumCell;
    table.rows().every(function(rowIdx, tableLoop, rowLoop){
        if(rowIdx != 0 && colIdx>=3){
            var currSumCell = table.cell({
                row: rowIdx,
                column: colIdx,
            }).node();

            var gap = Math.abs(jQuery(currSumCell).text() - jQuery(prevSumCell).text());
            var currRowHeight = jQuery(this.node()).height();

            jQuery(this.node()).height(currRowHeight*(1+gap*0.2));//changed the rule to 1point => 20% standard row height
        }

        prevSumCell = table.cell({
            row: rowIdx,
            column: colIdx,
        }).node();

    });
}

function highlightSumRow(table){//JS implementation of highlighting rows with highest sum, seems outdated
    var sums = table.column(11).data().sort().reverse().filter(function(item, pos, arr){
        // remove duplicates
        return !pos || item != arr[pos -1];
    });

    var highestSum = sums[0];
    var secondSum = sums[1];
    var thirdSum = sums[2];
    var lowestSum = sums[sums.length-1];

    table.rows().every(function (rowIdx, tableLoop, rowLoop) {
        var currRow = jQuery(table.row(rowIdx).node());

        var sumCell = table.cell({
            row: rowIdx,
            column: 11
        }).node();

        switch (jQuery(sumCell).text()){
            case highestSum:
                currRow.addClass("highest-sum");
                break;
            case secondSum:
                currRow.addClass("second-sum");
                break;
            case thirdSum:
                currRow.addClass("third-sum");
                break;
            case lowestSum:
                currRow.addClass("lowest-sum");
                break;
        }
    });
}
