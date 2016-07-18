
dojo.registerModulePath("headflow.core.base", "http://localhost/jom5/libraries/headflow/core/widget/base/js");

dojo.require("dojox.layout.FloatingPane");
dojo.require("dijit.form.Button");
dojo.require("dojo.dnd.Source");
dojo.require("dojo.parser");
//dojo.require("dojo.store.JsonRest");
dojo.require("headflow.core.base.Image");




dojo.addOnLoad(function(){

    headFlowWidgets = [
            {name: "Image",
             image: "component/layoutmanager/view/images/image.png",
             description: "Image or photo",
             type:["widget"],
             xtype: { tag:  "img",
                      props: {
                        src:  HeadFlowBaseURL + "component/layoutmanager/view/images/select.png",
                        title: "Select your content"
                      }
                    }
            },
            {name: "Flash",
             image: "component/layoutmanager/view/images/swf.png",
             description: "Flash file",
             type:["widget"],
             xtype: { html:  '<object width="480" height="390"><param name="movie" value="http://www.youtube.com/v/bmbJrhcP0A8?fs=1&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/bmbJrhcP0A8?fs=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="390"></embed></object>',
                      props: {}
                    }
            },
            {name: "Slider",    
             image: "component/layoutmanager/view/images/slider.jpg",
             description: "Smashing Slider",
             type:["widget"],
             xtype:{ type: "headflow.core.base.Image",
                     props: {label: "Edit"}
                   }
            },
    ];

   var HeadFlowLayoutManager ={

        dialog : null,

        editorButton : new dijit.form.Button({
            label: "Edit",
            onClick: function(){
                HeadFlowLayoutManager.createDialog();
                HeadFlowLayoutManager.dialog.startup();
            }
        }, "progButtonNode"),

        // create the dialog:
        createDialog : function(){
           HeadFlowLayoutManager.dialog  = new dojox.layout.FloatingPane({
                    title: "Widgets",
                    resizable: true,
                    dockable: true,
                    style: "position:absolute;top:100px;right:200px;width:200px;height:400px;",
                    id: "headflowFloatingPane"
                }, dojo.byId("headflowFloatingPane"));
        },

        widgetNodeCreator : function(item, hint){
            
            var imgDiv = document.createElement("div");
            var img = document.createElement("img");

            img.src = HeadFlowBaseURL + (item.image || "images/blank.gif");
            dojo.addClass(imgDiv, "headFlowWidgetIcon");
            dojo.addClass(imgDiv, "dojoDndItem");
            imgDiv.appendChild(img);


            if(item.description && hint != "avatar"){
               // todo: add title and stuff
            }
    
            return {node: imgDiv, data: item, type: item.type};

        },

        expandedWidgetNodeCreator : function(item, hint){
            if(hint == 'avatar'){
                return HeadFlowLayoutManager.widgetNodeCreator(item, hint);
            }else{
                var node = HeadFlowLayoutManager.create(item.xtype);
                
                return {node: node, data: item, type: item.type};
            }
        },

        create : function(json){
          if("tag" in json || "html" in json){
            // this is a node definition
            return HeadFlowLayoutManager.createNode(json);
          }
          // otherwise it is a dijit definition
          return HeadFlowLayoutManager.createDijit(json);
        },

        createNode : function (json){
            /**
             * Creates a new node from some json
             * Expects  Something like
             * {
                  tag:  "input",
                  props: {
                    type:  "text",
                    value: 42
                  }
                }
             */
            if(!json.tag && !json.html){
                throw new Error("tag and html is missing!");
            }

            if(!json.html){
                return dojo.create(json.tag, json.props);
            }else{
                var div = dojo.create('div');
                dojo.place(json.html,div);
                return div;
            }
        },

        createDijit : function (json){
            /**
             * Creates a Dijit expects some json like
             * {
                      type: "DropDownSelect",
                      props: {
                            options: [
                              { label: 'foo', value: 'foo', selected: true },
                              { label: 'bar', value: 'bar' }
                            ]
                      }
                }
             *
             */
              if(!json.type){
                throw new Error("type is missing!");
              }
              var cls = dojo.getObject(json.type, false, dijit.form);
              if(!cls){
                // we couldn't find the type in dijit.form
                // dojox widget? custom widget? let's try the global scope
                cls = dojo.getObject(json.type, false);
              }
              if(!cls){
                throw new Error("cannot find your widget type!");
              }
                var div = dojo.create('div');
                var div2 = dojo.create('div',null,div);
                var dij = new cls(json.props,div2);
                return div;
        },

        buildWidgetList : function(/* DOMNode|String	node or node's id to build the source*/node,data){
            var dndObj = new dojo.dnd.Source(node, {copyOnly:true, selfAccept:false, creator: HeadFlowLayoutManager.widgetNodeCreator});
            dndObj.insertNodes(false, data);
            return dndObj;
        },
        
        createWidgetDropTargets : function(selector){
            dojo.query(selector).forEach(function(node){
               new dojo.dnd.Source(node, {isSource:true,accept:["widget"], creator: HeadFlowLayoutManager.expandedWidgetNodeCreator});

            });
        },

        init : function(){
          //  store = new dojo.store.JsonRest({target:"http://localhost/jom5/administrator/index2.php?option=com_headflow&task=LayoutManager_getWidgets&format=raw&id="});
           // store.query().forEach(function(item){
           //   console.log(item);
           // });
            HeadFlowLayoutManager.buildWidgetList("headFlowWidgetList", headFlowWidgets);
            HeadFlowLayoutManager.createWidgetDropTargets('.headFlowWidgetContainer');
        }

    };
   
    dojo.parser.parse();
    HeadFlowLayoutManager.init();
});

