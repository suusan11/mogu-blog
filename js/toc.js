jQuery(function() {
    var idcount = 1;
    var toc = '';
    var currentlevel = 0;
    jQuery(".article__main h2, .article__main h3", this).each(function() {
        this.id = "toc-" + idcount;
        idcount++;
        var level = 0;
        if (this.nodeName.toLowerCase() === "h2") {
            level = 1;
        } else if (this.nodeName.toLowerCase() === "h3") {
            level = 2;
        }
        while (currentlevel < level) {
            toc += "<ol>";
            currentlevel++;
        }
        while (currentlevel > level) {
            toc += "</ol>";
            currentlevel--;
        }
        toc += '<li><a href="#' + this.id + '">' + jQuery(this).html() + "</a></li>\n";
    });
    while (currentlevel > 0) {
        toc += "</ol>";
        currentlevel--;
    }
    if (jQuery(".article__main h2")[0]) {
        jQuery("#toc").html('<div class="mokuji">CONTENTS</div>'+ toc);
    }
});