/* Main javascript */
/*$(document).ready(function () {
    $('img#img').imgAreaSelect({
        handles: true,
        onSelectEnd: someFunction
    });

    //$('#bee').imgAreaSelect({ aspectRatio: '4:3', handles: true });
    //$('#duck').imgAreaSelect({ x1: 120, y1: 90, x2: 280, y2: 210 });
    //$('#ladybug_ant').imgAreaSelect({ maxWidth: 200, maxHeight: 150, handles: true });
});*/

function preview(img, selection) {
    var scaleX = 100 / (selection.width || 1);
    var scaleY = 100 / (selection.height || 1);

    $('#preview').css({
        width: Math.round(scaleX * 400) + 'px',
        height: Math.round(scaleY * 300) + 'px',
        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
    });
}

$(document).ready(function () {
    $('#resize .img').imgAreaSelect({ aspectRatio: '1:1', minWidth: 200, minHeight: 200, onSelectChange: preview });
});
