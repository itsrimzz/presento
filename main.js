var document;
freedom.on("update­text", function(text) {
var result = text.toUpperCase();
document = result;
freedom.emit("display­text", result);
});