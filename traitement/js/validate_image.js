
var memeSize = 250;

var canvas = document.getElementById('memecanvas');
ctx = canvas.getContext('2d');


// Set the text style to that to which we are accustomed



canvas.width = memeSize;
canvas.height = memeSize;

//  Grab the nodes
var img = document.getElementById('start-image');
var topText = document.getElementById('top-text');
var bottomText = document.getElementById('bottom-text');

// When the image has loaded...
img.onload = function() {
    drawMeme()
}

topText.addEventListener('keydown', drawMeme)
topText.addEventListener('keyup', drawMeme)
topText.addEventListener('change', drawMeme)

bottomText.addEventListener('keydown', drawMeme)
bottomText.addEventListener('keyup', drawMeme)
bottomText.addEventListener('change', drawMeme)

function drawMeme() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.drawImage(img, 0, 0, memeSize, memeSize);

    ctx.lineWidth  = 4;
    ctx.font = '10pt sans-serif';
    ctx.strokeStyle = 'black';
    ctx.fillStyle = 'white';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'top';

    var text1 = document.getElementById('top-text').value;
    text1 = text1.toUpperCase();
    x = memeSize / 2;
    y = 0;

    wrapText(ctx, text1, x, y, 300, 28, false);

    ctx.textBaseline = 'bottom';
    var text2 = document.getElementById('bottom-text').value;
    text2 = text2.toUpperCase();
    y = memeSize;

    wrapText(ctx, text2, x, y, 300, 28, true);

}

function wrapText(context, text, x, y, maxWidth, lineHeight, fromBottom) {

    var pushMethod = (fromBottom)?'unshift':'push';

    lineHeight = (fromBottom)?-lineHeight:lineHeight;

    var lines = [];
    var y = y;
    var line = '';
    var words = text.split(' ');

    for (var n = 0; n < words.length; n++) {
        var testLine = line + ' ' + words[n];
        var metrics = context.measureText(testLine);
        var testWidth = metrics.width;

        if (testWidth > maxWidth) {
            lines[pushMethod](line);
            line = words[n] + ' ';
        } else {
            line = testLine;
        }
    }
    lines[pushMethod](line);

    for (var k in lines) {
        context.strokeText(lines[k], x, y + lineHeight * k);
        context.fillText(lines[k], x, y + lineHeight * k);
    }

}

/*Recuperer une image a partir de l'appareil et l'afficher au niveau du canevas*/

var imageImporter = document.getElementById('imageImporter');
imageImporter.addEventListener('change', loadImage, false);

function loadImage(e) {
    var reader = new FileReader();
    reader.onload = function(event){
        img.width = memeSize;
        img.height = memeSize;
        img = new Image();
        img.onload = function(){
            ctx.drawImage(img,0,0);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    return false;
}



/*Telecharger l'image Memes*/
// recuperer le name du boutton
var download = document.getElementById('img-download');
download.addEventListener('click', prepareDownload, false);
function prepareDownload() {
    var data = canvas.toDataURL();
    download.href = data;
}

//enregistrer l'image dans un repertoire


/*
scale = document.getElementById('scale');
scale.addEventListener('change', doTransform, false);

rotate = document.getElementById('rotate');
rotate.addEventListener('change', doTransform, false);

function doTransform() {
    ctx.save();

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Translate to center so transformations will apply around this point
    ctx.translate(canvas.width/2, canvas.height/2);

    // Perform scale
    var val = document.getElementById('scale').value;
    ctx.scale(val, val);

    // Perform rotation
    val = document.getElementById('rotate').value;
    ctx.rotate(val*Math.PI/180);

    // Reverse the earlier translation
    ctx.translate(-canvas.width/2, -canvas.height/2);

    // Finally, draw the image
    ctx.drawImage(img, x, y);

    ctx.restore();
}
*/
/*
var fileInput = document.getElementById('fileInput');
fileInput.addEventListener('change', imageLoader(), false);

function imageLoader() {
    var reader = new FileReader();
    reader.onload = function(event) {
        img = new Image();
        img.onload = function(){
            ctx.drawImage(img,0,0);
        }
        img.src = reader.result;
    }
    reader.readAsDataURL(fileInput.files[0]);
}
*/
