var currentTab = "#inventaire";
function fLoadDescSpell(b, a) {
    oAjax = new Ajax();
    oAjax.AddParameter("s", a);
    oAjax.AddParameter("c", b);
    oAjax.Get("/requests/encyclopedia_fspell", function(c) {
        YAHOO.util.Dom.addClass("sb-container", "shadowLogin");
        Shadowbox.open({content: c[0],player: "html",height: 389,width: 567,options: {animate: false,displayNav: false,enableKeys: false,onClose: function() {
                    YAHOO.util.Dom.removeClass("sb-container", "shadowLogin")
                }}})
    })
}
function fLoadDescItem(a, b) {
    oMinisElementsList = document.getElementsByName("inventory_mini_item");
    for (i = 0; i < oMinisElementsList.length; i++) {
        oMinisElementsList.item(i).className = ""
    }
    a.className = "selected";
    oElementsList = document.getElementsByName("inventory_item");
    for (i = 0; i < oElementsList.length; i++) {
        if (oElementsList.item(i).id == "inventory_item_" + b) {
            oElementsList.item(i).style.display = "block"
        } else {
            oElementsList.item(i).style.display = "none"
        }
    }
}
function BtnCheckbox(a) {
    if (a.className == "btncheckbox off") {
        a.className = a.className = "btncheckbox";
        YAHOO.util.Dom.get("b_" + a.name).value = "0"
    } else {
        a.className = a.className = "btncheckbox off";
        YAHOO.util.Dom.get("b_" + a.name).value = "1"
    }
}
var readyToRender = false;
function goRender() {
    readyToRender = true;
    if (currentTab == "#inventaire") {
        renderTheBig()
    }
}
function renderMe() {
    if (readyToRender && currentTab == "#inventaire") {
        renderTheBig()
    }
}
function renderTheBig() {
    document.getElementById("inventory_avatar_container").render()
}
function getMovieName(a) {
    return (navigator.appName.indexOf("Microsoft") != -1) ? window[a] : document[a]
}
function radio_check(a) {
    YAHOO.util.Dom.get("img_check1").className = "uncheckradio";
    YAHOO.util.Dom.get("radiochar").checked = false;
    YAHOO.util.Dom.get("img_check2").className = "uncheckradio";
    YAHOO.util.Dom.get("radioguild").checked = false;
    YAHOO.util.Dom.get("img_check3").className = "uncheckradio";
    YAHOO.util.Dom.get("radiojob").checked = false;
    YAHOO.util.Dom.get("charname").style.display = "none";
    YAHOO.util.Dom.get("guildname").style.display = "none";
    YAHOO.util.Dom.get("jobname").style.display = "none";
    if (a.id == "img_check3") {
        YAHOO.util.Dom.get("jobname").style.display = "block"
    } else {
        if (a.id == "img_check2") {
            YAHOO.util.Dom.get("guildname").style.display = "block"
        } else {
            YAHOO.util.Dom.get("charname").style.display = "block"
        }
    }
    a.className = "checkradio";
    getNextNode(a).checked = true
}
function ShowErrorVersion(a) {
    YAHOO.util.Dom.addClass("sb-container", "shadowLogin");
    Shadowbox.open({content: "test",player: "html",height: 389,width: 567,options: {animate: true,displayNav: true,enableKeys: false,onClose: function() {
                YAHOO.util.Dom.removeClass("sb-container", "shadowLogin")
            }}})
}
function ShowGuildName() {
}
function ShowChardName() {
    YAHOO.util.Dom.get("charname").style.display = "block";
    YAHOO.util.Dom.get("guildname").style.display = "none"
}
function OpenLadder(a, b) {
    var c = new Ajax();
    c.CreateLoading();
    GetRatingDetails(a, b)
}
var D = YAHOO.util.Dom, E = YAHOO.util.Event, L = YAHOO.util.Lang;
YAHOO.namespace("ankama");
YAHOO.ankama.Dofus = function() {
};
YAHOO.ankama.Dofus.global = {};
function ChangeCharacterTcg(b, d, a, c, e) {
    illus = document.getElementsByName("illu_perso");
    facebooklink = document.getElementsByName("facebook_set");
    for (i = 0; i < illus.length; i++) {
        illus[i].innerHTML = '<object width="300" height="320" type="application/x-shockwave-flash" data="http://staticns.ankama.' + d + '/dofus/www/swf/pages_persos/DofusPersos.swf" id="inventory_avatar_try" style="visibility: visible;"><param name="allowscriptaccess" value="always"><param name="flashvars" value="align=TL&amp;look=' + b + '&amp;render=direct"><param name="wmode" value="transparent"><param name="enablejs" value="true"><param name="menu" value="false"></object>';
        YAHOO.util.Dom.get("entity_form").value = b;
        YAHOO.util.Dom.get("sex_form").value = c;
        YAHOO.util.Dom.get("breed_form").value = a;
        YAHOO.util.Dom.get("id_form").value = e
    }
}
var sDomain = window.location.host;
sDomain = sDomain.split(".");
sDomain.shift();
sDomain = sDomain.join(".");
// document.domain = sDomain;
document.domain = '127.0.0.1';
YAHOO.ankama.Dofus.global.loadTinyMce = function(a) {
    tinyMCE.init({theme: "advanced",mode: "exact",elements: a,plugins: "ankama_bbcode,emotions,inlinepopups",theme_advanced_buttons1: "bold,italic,underline",theme_advanced_buttons2: "",theme_advanced_buttons3: "",theme_advanced_toolbar_location: "top",theme_advanced_toolbar_align: "center",theme_advanced_styles: "Code=codeStyle;Quote=quoteStyle",entity_encoding: "numeric",add_unload_trigger: false,remove_linebreaks: false,inline_styles: false,convert_fonts_to_spans: false})
};
function changeform(a) {
    if (YAHOO.util.Dom.hasClass(a.parentNode, "formover")) {
        YAHOO.util.Dom.removeClass(a.parentNode, "formover")
    } else {
        YAHOO.util.Dom.addClass(a.parentNode, "formover")
    }
}
function resize(c, g) {
    var a = c.value;
    var h = new RegExp("\n|\r");
    var b = a.split(h);
    var f = 1;
    for (var d = 0; d < b.length; d++) {
        f += 1
    }
    c.rows = f;
    if (f > 3) {
        c.style.height = "auto"
    }
}
function checkform() {
    if (YAHOO.util.Dom.get("chst").value.length >= 140) {
        YAHOO.util.Dom.get("valid_statut").disabled = true;
        YAHOO.util.Dom.get("valid_statut").className = "btn disabled"
    } else {
        YAHOO.util.Dom.get("valid_statut").disabled = false;
        YAHOO.util.Dom.get("valid_statut").className = "btn"
    }
}
;