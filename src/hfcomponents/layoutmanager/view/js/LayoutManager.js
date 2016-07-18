//define("headflowlm/LayoutManager", ["dojo","dijit","dojox", "dijit/form/Button","dojox/layout/FloatingPane"], function(dojo,dijit,dojox) {

dojo.provide("headflowlm.LayoutManager");
dojo.require("dojox.layout.FloatingPane"); 
dojo.require("dijit.form.Button");

dojo.declare("headflowlm.LayoutManager", null, {
	constructor: function(/*headflowlm.LayoutManagert*/ options){
		// summary:
		//		This is a basic store for RESTful communicating with a server through JSON
		//		formatted data.
		// options:
		//		This provides any configuration information that will be mixed into the store
		dojo.mixin(this, options);
	},
        dialog : null,

        editorButton : null,
        
        init: function(){
            this.editorButton = new dijit.form.Button({
                label: "Edit"
            }, "progButtonNode");
            dojo.connect(this.editorButton, "onClick",this,"show");
        },

        show: function(){
            this.dialog = new dojox.layout.FloatingPane({
                    title: "Widgets",
                    resizable: true,
                    dockable: true,
                    style: "position:absolute;top:100px;right:200px;width:200px;height:400px;",
                    id: "pFloatingPane"
                }, dojo.byId("pFloatingPane"));
        }


});

//return headflowlm.LayoutManager;
//});