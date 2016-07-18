
dojo.registerModulePath("headflowlm", "../../../../component/layoutmanager/view/js");

dojo.require("headflowlm.LayoutManager");
dojo.require("dojox.layout.FloatingPane");
dojo.require("dojo.dnd.Source");
dojo.require("dojo.parser");

dojo.addOnLoad(function(){

    var headflowLayoutManager = new headflowlm.LayoutManager();
    headflowLayoutManager.init();

    dojo.parser.parse();
});




