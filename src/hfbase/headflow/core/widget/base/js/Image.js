dojo.provide("headflow.core.base.Image");

dojo.require("dijit._Widget");
dojo.require("dojox.dtl._DomTemplated");

dojo.declare("headflow.core.base.Image",
             [dijit._Widget, dojox.dtl._DomTemplated],{

        templateString: dojo.cache("headflow.core.base", "templates/Image.html"),
        imagePath: dojo.moduleUrl("headflow.core.base", "themes/standard/images/blank.png"),
        title:"Image Title",
        altText:"Alt Text",

	attributeMap:
        dojo.delegate(dijit._Widget.prototype.attributeMap, {
                    imagePath : {
                            node: "imageNode",
                            type: "attribute",
                            attribute: "src"
                    },
                    title : {
                            node: "imageNode",
                            type: "attribute",
                            attribute: "title"
                    },
                    altText: {
                            node: "imageNode",
                            type: "attribute",
                            attribute: "alt"
                    }
            }),

     _onClick: function( /*Event*/ e) {
        var dialog = new dijit.TooltipDialog({
            content: '<label for="name">Name:</label> <input dojoType="dijit.form.TextBox" id="name" name="name"><br>' + '<label for="hobby">Hobby:</label> <input dojoType="dijit.form.TextBox" id="hobby" name="hobby"><br>' + '<button dojoType="dijit.form.Button" type="submit">Save</button>'
        });

      return this.onClick(e);
    },

    onClick: { // nothing here: the extension point!

    }

});

