function makeSort() {
    var selectedSort = $("#selectSort");
    var selectedIndex = selectedSort.selectedIndex;
    var selectedValue = selectedSort[selectedIndex].value;
    console.log(selectedValue);
    {
        $.ajax({
            type: 'GET',
            url: '?sort=' + selectedValue,
            success: window.location.href = window.location.href + '?sort=' + selectedValue,
            error: function () {
                console.log( 'error');
            }
        });
    }
}
