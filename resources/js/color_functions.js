function hexToRgb(currColor, isAlpha = false) {
    let red = parseInt(currColor.substring(1, 3), 16);
    let green = parseInt(currColor.substring(3, 5), 16);
    let blue = parseInt(currColor.substring(5, 7), 16);

    if(isAlpha)
        return `rgb(${red},${green},${blue},1.0)`;
    else
        return `rgb(${red},${green},${blue})`;
}
function rgbToHex(r, g, b, isAlpha = false) {

    r = parseInt(r).toString(16);
    g = parseInt(g).toString(16);
    b = parseInt(b).toString(16);

    if (r.length === 1)
        r = "0" + r;
    if (g.length === 1)
        g = "0" + g;
    if (b.length === 1)
        b = "0" + b;

    if(isAlpha)
        return "#" + r + g + b + 'ff';
    else
        return "#" + r + g + b;
}
function rgbToHsl(r, g, b, isAlpha = false) {

    // Make r, g, and b fractions of 1
    r /= 255;
    g /= 255;
    b /= 255;

    // Find greatest and smallest channel values
    let c_min = Math.min(r,g,b),
        c_max = Math.max(r,g,b),
        delta = c_max - c_min,
        h,
        s,
        l;

    // Calculate hue
    // No difference
    if (delta === 0)
        h = 0;
    // Red is max
    else if (c_max === r)
        h = ((g - b) / delta) % 6;
    // Green is max
    else if (c_max === g)
        h = (b - r) / delta + 2;
    // Blue is max
    else
        h = (r - g) / delta + 4;

    h = Math.round(h * 60);

    // Make negative hues positive behind 360°
    if (h < 0)
        h += 360;

    // Calculate lightness
    l = (c_max + c_min) / 2;

    // Calculate saturation
    s = delta === 0 ? 0 : delta / (1 - Math.abs(2 * l - 1));

    // Multiply l and s by 100
    s = +(s * 100);
    l = +(l * 100);

    if(isAlpha)
        return "hsla(" + padLeadingZeros(h, 3) + "," + padLeadingZeros(Math.ceil(s), 3) + "%," + padLeadingZeros(Math.ceil(l), 3) + "%,1.0)";
    else
        return "hsl(" + padLeadingZeros(h, 3) + "," + padLeadingZeros(Math.ceil(s), 3) + "%," + padLeadingZeros(Math.ceil(l), 3) + "%)";
}
function rgbToRgb(r, g, b, isAlpha = false){
    if(isAlpha)
        return `rgba(${padLeadingZeros(Math.round(r), 3)},${padLeadingZeros(Math.round(g), 3)},${padLeadingZeros(Math.round(b), 3)},1.0)`;
    else
        return `rgb(${padLeadingZeros(Math.round(r), 3)},${padLeadingZeros(Math.round(g), 3)},${padLeadingZeros(Math.round(b), 3)})`;
}


window.hexToRgb = hexToRgb;
window.rgbToHex = rgbToHex;
window.rgbToHsl = rgbToHsl;
window.rgbToRgb = rgbToRgb;
